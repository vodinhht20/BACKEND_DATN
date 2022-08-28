<?php

namespace App\Repositories;

use App\Models\Branch;
use App\Models\Employee;
use App\Models\Request;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Employee::class;
    }

    public function getWifiIPByEmployeeId($employeeId): array
    {
        $employee = $this->model
            ->with(['branch', 'branch.network'])
            ->find($employeeId);
        if ($employee) {
            $networks = $employee->branch->network->pluck('wifi_ip');
            return $networks->toArray();
        }

        return [];
    }

    public function register($arrData = [])
    {
        $employee = new $this->model;
        $employee->fullname = $arrData['fullname'];
        $employee->email = $arrData['email'];
        $employee->password = bcrypt($arrData['password']);
        $employee->employee_code = $arrData['employee_code'];
        $employee->branch_id = $arrData['branch_id'];
        $employee->position_id = $arrData['position_id'];
        $employee->personal_email = $arrData['personal_email'];
        $employee->address = $arrData['address'];
        $employee->gender = $arrData['gender'];

        if (isset($arrData['avatar'])) {
            $employee->avatar = $arrData['avatar'];
        }
        if (isset($arrData['email_verified_at'])) {
            $employee->email_verified_at = $arrData['email_verified_at'];
        }
        if (isset($arrData['phone'])) {
            $employee->phone = $arrData['phone'];
        }
        if (isset($arrData['birth_day'])) {
            $employee->birth_day = $arrData['birth_day'];
        }
        if (isset($arrData['type_avatar'])) {
            $employee->type_avatar = $arrData['type_avatar'];
        }
        if (isset($arrData['status'])) {
            $employee->status = $arrData['status'];
        }
        if (isset($arrData['is_checked'])) {
            $employee->is_checked = $arrData['is_checked'];
        }
        if (isset($arrData['note'])) {
            $employee->note = $arrData['note'];
        }
        $employee->save();
        return $employee;
    }

    public function updateTokenVerifyEmail($arrData = [])
    {
        $employee = $this->find($arrData['id']);
        $employee->email_confirm_token = $arrData['email_confirm_token'];
        $employee->save();
    }

    public function getUserByEmail($email)
    {
        $employee = $this->model->where('email', $email)->first();
        if ($employee) {
            return $employee;
        }
        return false;
    }

    public function confirmEmail($id)
    {
        $employee = $this->model->find($id);
        if ($employee) {
            $employee->email_verified_at = now();
            $employee->save();
            return $employee;
        }
        return false;
    }

    public function changePasssword($newPass, $id)
    {
        $employee = $this->model->find($id);
        if ($employee) {
            $employee->password = bcrypt($newPass);
            $employee->save();
            return $employee;
        }
        return false;
    }

    public function changeStatus($status, $id)
    {
        $employee = $this->model->find($id);
        if ($employee) {
            $employee->status = $status;
            $employee->save();
            return $employee;
        }
        return false;
    }

    public function blockUser($id)
    {
        $employee = $this->model->find($id);
        if ($employee) {
            $employee->status = config('employee.status.block');
            $employee->save();
            return $employee;
        }
    }

    public function unBlockUser($id)
    {
        $employee = $this->model->find($id);
        if ($employee) {
            $employee->status = config('employee.status.active');
            $employee->save();
            return $employee;
        }
    }

    public function getUserBlock($take = 10)
    {
        return $this->model
            ->where('status', config('employee.status.block'))
            ->orderBy('updated_at', 'desc')
            ->with('position')
            ->paginate($take);
    }

    public function getRoleByUser($id)
    {
        return $this->model->find($id)->roles->pluck('name');
    }

    public function changeRole($roles = [], $modelId)
    {
        $employee = $this->model->find($modelId);
        if (!$employee) {
            return false;
        }
        $employee->syncRoles($roles);
        return $employee;
    }

    public function checkPassword($email, $password)
    {
        $employee = $this->getUserByEmail($email);
        if ($employee && Hash::check($password, $employee->password)) {
            return $employee;
        }
        return false;
    }

    public function getMaxId(): int
    {
        return $this->model->max('id');
    }

    public function findBranch($idBranch){
        $branch = Branch::where('id', $idBranch)->select('id', 'name', 'address')->first();
        return $branch;
    }

    public function query($options = [])
    {
        $employee = $this->model->query();

        if (isset($options['with'])) {
            $employee->with($options['with']);
        }

        if (isset($options['id'])) {
            $employee->where('id', $options['employee_id']);
        }

        if (isset($options['ids'])) {
            $employee->whereIn('id', $options['ids']);
        }

        if (isset($options['role'])) {
            $employee->whereHas("roles", function($q) use($options) {
                $q->whereIn("name", $options['role']);
            })->get();
        }

        if (isset($options['status']) && $options['status'] != '' && !is_array($options['status'])) {
            $employee->where('status', $options['status']);
        }

        if (isset($options['status']) && is_array($options['status'])) {
            $employee->whereIn('status', $options['status']);
        }

        if (isset($options['position_id']) && $options['position_id'] != '' ) {
            $employee->where('position_id', $options['position_id']);
        }

        if (isset($options['position_ids']) && is_array($options['position_ids']) && count($options['position_ids']) > 0) {
            $employee->whereIn('position_id', $options['position_ids']);
        }

        if (isset($options['gender']) && $options['gender'] != '' ) {
            $employee->where('gender', $options['gender']);
        }

        if (isset($options['employee_codes'])) {
            $employee->whereIn('employee_code', $options['employee_codes']);
        }

        if (isset($options['branch_id']) && $options['branch_id'] != '' ) {
            $employee->where('branch_id', $options['branch_id']);
        }

        if (isset($options['not_in_id']) && count($options['not_in_id'])) {
            $employee->whereNotIn('id', $options['not_in_id']);
        }

        if (isset($options['keyword'])) {
            $keyword = trim($options['keyword']);
            $employee->where(function($query) use ($keyword){
                $query->where('fullname', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('email', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('phone', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('employee_code', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('personal_email', 'LIKE', '%' . $keyword . '%');
            });
        }
        $employee->orderBy('id', 'desc');
        return $employee;
    }

    public function paginate($options = [], $take = 10)
    {
        return $this->query($options)->paginate($take);
    }

    /**
     * Lấy ra danh sách nhân viên thuộc chi nhánh đấy
     *
     * @param string|integer $employeeId
     * @return Collection
     */
    public function getEmployeeOfBranch($employeeId): Collection
    {
        $employees = collect();
        $employee = $this->model->find($employeeId);
        if ($employee) {
            $branchId = $employee->branch_id;
            $employees = $this->query(['branch_id' => $branchId])->get();
        }
        return $employees;
    }

    /**
     * Hàm lấy ra danh sách nhân viên thuộc những phòng ban đấy
     *
     * @param array $departmentIds
     * @return Collection
     */
    public function getEmployeeByDepartmentIds(array $departmentIds): Collection
    {
        $employees = $this->model->whereHas('position', function ($positionQuery) use ($departmentIds) {
            $positionQuery->whereHas('department', function ($departmentQuery) use ($departmentIds) {
                // $departmentQuery->whereIn('id', $departmentIds);
            });
        })->get();
        return $employees;
    }

    /**
     * Hàm lấy ra danh sách nhân viên mới trong tháng
     *
     * @param Employee $employee
     * @return void
     */
    public function getMemberOnboard(Employee $employee)
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $employees = $this->model
            ->select('id', 'avatar', 'fullname', 'position_id', 'type_avatar')
            ->where("branch_id", $employee->branch_id)
            ->with(["position" => function($query) {
                $query->select('id', 'name');
            }])
            ->where("status", config('employee.status.active'))
            ->where("created_at", ">=", $startOfMonth)
            ->get();

        $employees->map(function ($employee) {
            $employee->avatar = $employee->getAvatar();
            return $employee;
        });
        return $employees->toArray();
    }

    public function getHappyBirthDay(Employee $employee)
    {
        $currentDate = Carbon::now()->format("m-d");
        $currentDateTime = Carbon::now()->endOfDay();
        $employees = $this->model
            ->select('id', 'avatar', 'fullname', 'position_id', 'type_avatar', 'birth_day')
            ->where("branch_id", $employee->branch_id)
            ->with(["position" => function($query) {
                $query->select('id', 'name');
            }])
            ->where("status", config('employee.status.active'))
            ->whereRaw('DATE_FORMAT(birth_day, "%m-%d") = "' . $currentDate . '"')
            ->get();

        $employees->map(function ($employee) use ($currentDateTime) {
            $birthDay = Carbon::createFromFormat("Y-m-d", $employee->birth_day)->startOfDay();
            $employee->age = $birthDay->diffInYears($currentDateTime);
            $employee->avatar = $employee->getAvatar();
            return $employee;
        });
        return $employees->toArray();
    }

    /**
     *
     * @param array $data
     * @return int
     */
    public function insertMutiple(array $data)
    {
        return $this->model->insert($data);
    }
}
