<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class SingleTypeRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\SingleType::class;
    }

    public function getPublicSingleType(){
        $singleType = $this->model->OrderBy('id', 'desc')
        ->where('status', config('singletype.status.public'))
        ->get();
        return $singleType;
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
            $dataApprovers[] = 
            [
                'fullname' => $manager->fullname, 
                'avatar' => $manager->avatar,
                'position' => $manager->position->name,
                'required_leader' => 1
            ];

            foreach ($approvers as $approver){
                if ($approver->employee->id != $manager->id) {
                    $dataApprovers[] = 
                    [
                        'fullname' => $approver->employee->fullname, 
                        'avatar' => $approver->employee->avatar,
                        'position' => $approver->employee->position->name
                    ];
                }
            };
        }else{
            foreach ($approvers as $approver){
                $dataApprovers[] = 
                [
                    'fullname' => $approver->employee->fullname, 
                    'avatar' => $approver->employee->avatar,
                    'position' => $approver->employee->position->name
                ];
            };
        }

        return $dataApprovers;
    }
}
