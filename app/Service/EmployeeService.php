<?php
namespace App\Service;

use App\Repositories\EmployeeRepository;
use Carbon\Carbon;
use DateTimeZone;

class EmployeeService {
    function __construct(private EmployeeRepository $employeeRepo)
    {
        //
    }

    public function makeEmployeeCode(): string
    {
        $employeeRepo = $this->employeeRepo->getMaxId() + 1;
        return "CM-$employeeRepo";
    }

}