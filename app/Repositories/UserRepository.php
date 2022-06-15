<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function register($arrData = []){
        $user = new $this->model;
        $user->name = $arrData['fullname'];
        $user->email = $arrData['email'];
        $user->password= bcrypt($arrData['password']);
        if (isset($arrData['avatar'])) {
            $user->avatar = $arrData['avatar'];
        }
        if (isset($arrData['email_verified_at'])) {
            $user->email_verified_at = $arrData['email_verified_at'];
        }
        if (isset($arrData['phone'])) {
            $user->phone = $arrData['phone'];
        }
        if (isset($arrData['birth_day'])) {
            $user->birth_day = $arrData['birth_day'];
        }
        if (isset($arrData['type_avatar'])) {
            $user->type_avatar = $arrData['type_avatar'];
        }
        $user->save();
        return $user;
    }

    public function updateTokenVerifyEmail ($arrData = []) {
        $user = $this->find($arrData['id']);
        $user->email_confirm_token = $arrData['email_confirm_token'];
        $user->save();
    }

    public function getUserByEmail($email)
    {
        $user = $this->model->where('email', $email)->first();
        if ($user) {
            return $user;
        }
        return false;
    }

    public function getAllUserByPublic($take = 10)
    {
        return $this->model->where('status', 1)->whereNotIn('id', [Auth::user()->id])->orderBy('updated_at', 'desc')->paginate($take);
    }

    public function confirmEmail($id)
    {
        $user = $this->model->find($id);
        if ($user) {
            $user->email_verified_at = now();
            $user->save();
            return $user;
        }
        return false;
    }

    public function changePasssword($newPass, $id){
        $user = $this->model->find($id);
        if ($user) {
            $user->password= bcrypt($newPass);
            $user->save();
            return $user;
        }
        return false;
    }

    public function blockUser($id)
    {
        $user = $this->model->find($id);
        if ($user) {
            $user->status = 0;
            $user->save();
            return $user;
        }
    }

    public function unBlockUser($id)
    {
        $user = $this->model->find($id);
        if ($user) {
            $user->status = 1;
            $user->save();
            return $user;
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
        $user = $this->model->find($modelId);
        if (!$user) {
            return false;
        }
        $user->syncRoles($roles);
        return $user;
    }

    public function checkPassword($email, $password)
    {
        $user = $this->getUserByEmail($email);
        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }
        return false;
    }
}
