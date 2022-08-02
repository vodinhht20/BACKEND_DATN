<?php
namespace App\Repositories;

use App\Models\Employee;
use App\Models\Noti;
use App\Models\Request;
use App\Models\RequestApproveHistories;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EmployeeLeavePermissionRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\EmployeeLeavePermission::class;
    }

    public function enforcementRequest(Request $request)
    {
        $employeeLeavePermission = new $this->model;
        $employeeLeavePermission->date_from = $request->requestDetail->quit_work_from_at;
        $employeeLeavePermission->data_to = $request->requestDetail->quit_work_to_at;
        $employeeLeavePermission->employee_id = $request->employee_id;
        return $employeeLeavePermission->save();
    }
}
