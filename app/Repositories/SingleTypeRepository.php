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

    public function getInforEmployeeById($id){
        $approvers = $this->model->find($id)->approvers;
        $dataApprovers = [];
        foreach ($approvers as $approver){
            $dataApprovers[] = 
            [
                'fullname' => $approver->employee->fullname, 
                'avatar' => $approver->employee->avatar,
                'position' => $approver->employee->position->name
            ];
        };
        return $dataApprovers;
    }
}
