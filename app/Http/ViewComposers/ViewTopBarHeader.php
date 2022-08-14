<?php

namespace App\Http\ViewComposers;
use App\Repositories\EmployeeRepository;
use App\Repositories\NotifycationRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;

class ViewTopBarHeader
{
    public function __construct(
        private EmployeeRepository $employeeRepo,
        private NotifycationRepository $notifycationRepo
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
        // Lấy ra danh sách nhân viên có quyền admin
        $employeeOptions = [
            'status' => config('employee.status.active'),
            'role' => ['admin', 'human_resource', 'leader'],
        ];
        if (Auth::check()) {
            $employeeOptions['not_in_id'] = array(Auth::user()->id);
        }
        $employeeData = [];
        $logAsEmployees = $this->employeeRepo->query($employeeOptions)->get();
        foreach ($logAsEmployees as $employee) {
            $employeeData[] = [
                'fullname' => $employee->fullname,
                'employee_code' => $employee->employee_code,
                'login_key' => Crypt::encrypt($employee->id),
            ];
        }

        // Lấy ra danh sách thông báo của người đấy
        $notiOptions = [
            "domain" => config('notification.domain.BE'),
            "type" => config('notification.type.personal')
        ];
        $notification_headers = $this->notifycationRepo->getNotifyByEmployee(Auth::user(), $notiOptions)->toArray();
        $view->with(compact('employeeData', 'notification_headers'));
    }
}
