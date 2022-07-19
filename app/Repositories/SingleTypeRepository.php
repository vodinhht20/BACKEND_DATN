<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
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
     * @return Collection
     */
    public function getPublicSingleType(array $options): Collection
    {
        $singleType = $this->model->query()
            ->where('status', config('singletype.status.public'))
            ->orderBy('id', 'desc');

        if ($options['with']) {
            $singleType->with($options['with']);
        }

        return $singleType->get();
    }

    public function getPublicSingleTypeOne($id){
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
}
