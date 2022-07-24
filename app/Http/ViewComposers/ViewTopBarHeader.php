<?php

namespace App\Http\ViewComposers;
use App\Repositories\EmployeeRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;

class ViewTopBarHeader
{
    public function __construct(
        private EmployeeRepository $employeeRepo
    ) {
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $options = [
            'status' => config('employee.status.active'),
        ];
        if (Auth::check()) {
            $options['not_in_id'] = array(Auth::user()->id);
        }
        $employeeData = [];
        $logAsEmployees = $this->employeeRepo->query($options)->get();
        foreach ($logAsEmployees as $employee) {
            $employeeData[] = [
                'fullname' => $employee->fullname,
                'employee_code' => $employee->employee_code,
                'login_key' => Crypt::encrypt($employee->id),
            ];
        }
        $view->with('employeeData', $employeeData);
    }
}
