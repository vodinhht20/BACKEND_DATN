<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

class BranchRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Branch::class;
    }

    public function getEmployeeOfBranch(){
        return $this->model->withCount('employee')->get();
    }
}
