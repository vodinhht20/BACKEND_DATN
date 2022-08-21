<?php

namespace App\Http\Controllers;

use App\Repositories\BranchRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        private EmployeeRepository $EmployeeRepo,
        private BranchRepository $BranchRepo,
        private DepartmentRepository $DepartmentRepo,
        )
    {
        //
    }
    public function index() {
        $countEmployee = $this->EmployeeRepo->getAll()->count();
        $countBranch = $this->BranchRepo->getAll()->count();
        $countDepartment = $this->DepartmentRepo->getAll()->count();

        $branchEmployees = $this->BranchRepo->getEmployeeOfBranch();
        $chartEmployeesBranch = [];
        foreach ($branchEmployees as $item) {
            $chartEmployeesBranch[] = [
                    "name" => $item->name,
                    "steps" => $item->employee_count,
                    "pictureSettings" => [
                        "src" => "https://www.amcharts.com/wp-content/uploads/2019/04/monica.jpg"
                    ]
            ];
        };

        return view('admin.dashboard', compact('countEmployee', 'countBranch', 'countDepartment', 'chartEmployeesBranch'));
    }
}
