<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Employee::class;
    }

    public function getWifiIPByEmployeeId($employeeId)
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

    public function register($arrData = []){
        $employee = new $this->model;
        $employee->fullname = $arrData['fullname'];
        $employee->email = $arrData['email'];
        $employee->password= bcrypt($arrData['password']);
        $employee->employee_code = $arrData['employee_code'];
        $employee->branch_id = $arrData['branch_id'];
        $employee->position_id = $arrData['position_id'];
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
        if (isset($arrData['note'])) {
            $employee->note = $arrData['note'];
        }
        $employee->save();
        return $employee;
    }

    public function updateTokenVerifyEmail ($arrData = []) {
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

    public function getAllUserByPublic($take = 10)
    {
        return $this->model->where('status', 1)->whereNotIn('id', [Auth::user()->id])->orderBy('updated_at', 'desc')->paginate($take);
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

    public function changePasssword($newPass, $id){
        $employee = $this->model->find($id);
        if ($employee) {
            $employee->password= bcrypt($newPass);
            $employee->save();
            return $employee;
        }
        return false;
    }

    public function blockUser($id)
    {
        $employee = $this->model->find($id);
        if ($employee) {
            $employee->status = 0;
            $employee->save();
            return $employee;
        }
    }

    public function unBlockUser($id)
    {
        $employee = $this->model->find($id);
        if ($employee) {
            $employee->status = 1;
            $employee->save();
            return $employee;
        }
    }

    public function getUserBlock($take = 10)
    {
        return $this->model->where('status', 0)->orderBy('updated_at', 'desc')->paginate($take);
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
}
