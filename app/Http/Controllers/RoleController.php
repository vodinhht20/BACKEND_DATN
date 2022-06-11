<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeeRepository;
use App\Repositories\RoleRepositoryInterface;
use Illuminate\Http\Request;
use Validator;

class RoleController extends Controller
{

    public function __construct(private RoleRepositoryInterface $roleRepo, private EmployeeRepository $employeeRepo)
    {
        //
    }
    public function index() {
        $roles = $this->roleRepo->getAll()->load('getUser');
        $employees = $this->employeeRepo->getAll();
        return view('admin.role.index', compact('roles', 'employees'));
    }

    public function addRole(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role_name.*' => 'required',
            'model_id' => 'required',
        ], [
            'role_name.required' => 'Vui lòng lựa chọn role',
            'model_id.required' => 'Vui lòng lựa chọn thành viên',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "messages" => $validator->messages()->first()
            ], 404);
        }
        $optionRoles = $request->role_name;
        $modelId = $request->model_id;
        $result = $this->employeeRepo->changeRole($optionRoles, $modelId);
        if (!$result) {
            return response()->json([
                "messages" => 'Không thể thiết lập role cho user này'
            ], 404);
        }
        $roles = $this->roleRepo->getAll()->load('getUser');
        $viewData = view('admin.role._partials.base-role', compact('roles'))->render();
        return response()->json([
            'success' => true,
            'data' => $viewData,
        ]);
    }

    public function getRole(Request $request)
    {
        $roleByUser = $this->employeeRepo->getRoleByUser($request->model_id);
        return response()->json([
            'success' => true,
            'model_id' => $request->model_id,
            'roles' => $roleByUser->toArray()
        ]);
    }
}
