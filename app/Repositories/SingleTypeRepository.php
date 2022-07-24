<?php

namespace App\Repositories;

use App\Models\Approver;
use App\Models\SingleType;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Collection;

class SingleTypeRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\SingleType::class;
    }

    /**
     *
     * @param array $options
     * @return Builder
     */
    public function query(array $options = []): Builder
    {
        $singleType = $this->model->query();

        if (isset($options['status'])) {
            $singleType->where('status', $options['status']);
        }

        if (isset($options['id'])) {
            $singleType->where('id', $options['id']);
        }

        $singleType->orderBy('id', 'desc');

        return $singleType;
    }

    /**
     *
     * @param array $options
     * @return Collection
     */
    public function getPublicSingleType(array $options = []): Collection
    {
        $options['status'] = config('singletype.status.public');
        return $this->query($options)->get();
    }

    public function getPublicSingleTypeOne($id)
    {
        $singleType = $this->model->where('id', $id)
        ->where('status', config('singletype.status.public'))
        ->first();
        return $singleType;
    }

    public function getInforEmployeeById($employee, $id){
        $approvers = $this->model->find($id)->approvers;
        $dataApprovers = [];

        if ($this->model->find($id)->required_leader) {
            $manager = $employee->branch->employee->where('position_id', 1)->first();
            $dataApprovers[] = [
                'fullname' => $manager->fullname,
                'avatar' => $manager->avatar,
                'position' => $manager->position->name,
                'required_leader' => 1
            ];

            foreach ($approvers as $approver){
                if ($approver->employee->id != $manager->id) {
                    $dataApprovers[] = [
                        'fullname' => $approver->employee->fullname,
                        'avatar' => $approver->employee->avatar,
                        'position' => $approver->employee->position->name
                    ];
                }
            };
        } else {
            foreach ($approvers as $approver){
                $dataApprovers[] = [
                    'fullname' => $approver->employee->fullname,
                    'avatar' => $approver->employee->avatar,
                    'position' => $approver->employee->position->name
                ];
            };
        }

        return $dataApprovers;
    }

    /**
     *
     * @param array $data
     * @return SingleType
     */
    public function createWithApprover(array $data): SingleType
    {
        $singleType = $this->create($data);
        $dataApprovers = [];
        foreach ($data['employee_id'] as $employeeId){
            $dataApprovers[] = [
                'single_type_id' => $singleType->id,
                'employee_id' => $employeeId,
            ];
        }
        Approver::insert($dataApprovers);
        return $singleType->load('approvers');
    }

    /**
     * Hàm thay đổi trạng thái loại đơn
     *
     * @param string|int $id
     * @param string|int $status
     * @return boolean
     */
    public function changeStatus($id, $status): bool
    {
        $singleType = $this->model->find($id);
        if ($singleType) {
            $singleType->status = $status;
            return $singleType->save();
        }
        return false;
    }
}
