<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ConfixCompany;
use App\Models\BranCompany;
use App\Models\Noti;
use App\Repositories\DepartmentRepository;
use App\Repositories\PositionRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{

    public function __construct(private DepartmentRepository $departmentRepo, private PositionRepository $positionRepo)
    {
        //
    }

    public function info(Request $request)
    {
        $company = ConfixCompany::OrderBy('id', 'desc')->paginate(5);
        return view('admin.company.info', compact('company'));
    }

    public function branchs(){
        $bran = BranCompany::OrderBy('id', 'desc')->paginate(5);
        return view('admin.company.branchs', compact('bran'));
    }

    public function structure(Request $request)
    {
        $orgDepartments = $this->departmentRepo->formatVueSelect('name');
        $departments = $this->departmentRepo->getAll();
        return view('admin.company.structure', compact('orgDepartments', 'departments'));
    }

    public function updateDepartment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'positions' => 'required',
        ], [
            'id.required' => 'Phòng ban không tồn tại',
            'name.required' => 'Tên phòng ban không được để trống',
            'positions.required' => 'Vui lòng thêm vị trí cho phòng ban',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error_code' => 'validate_failed',
                'messages' => array($validator->messages()->first())
            ], 442);
        }
        try {
            DB::beginTransaction();
            $department = $this->departmentRepo->find($request->id);
            $department->name = $request->name;
            $department->save();
            $this->positionRepo->createAndUpdateCustom($request->positions, $department->id);
            DB::commit();
            return response()->json([
                'message' => "Cập nhật phòng ban thành công !"
            ], 200);
        } catch (\Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            \Log::error($message);
            DB::rollBack();
            Noti::telegramLog('Update Department', $message);
            return response()->json([
                'error_code' => 'exception_error',
                'message' => $e->getMessage()
            ], 442);
        }
    }

    public function createDepartment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'positions' => 'required',
        ], [
            'id.required' => 'Phòng ban không tồn tại',
            'name.required' => 'Tên phòng ban không được để trống',
            'positions.required' => 'Vui lòng thêm vị trí cho phòng ban',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error_code' => 'validate_failed',
                'messages' => array($validator->messages()->first())
            ], 442);
        }
        try {
            DB::beginTransaction();
            $options = [
                'name' => $request->name,
                'description' => ''
            ];
            if ($request->parent_id) {
                $options['parent_id'] = $request->parent_id;
            }
            $department = $this->departmentRepo->create($options);
            $this->positionRepo->createAndUpdateCustom($request->positions, $department->id);
            DB::commit();
            return response()->json([
                'message' => "Thêm mới phòng ban thành công !"
            ], 200);
        } catch (\Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            \Log::error($message);
            DB::rollBack();
            Noti::telegramLog('Create Department', $message);
            return response()->json([
                'error_code' => 'exception_error',
                'message' => $e->getMessage()
            ], 442);
        }
    }

    public function worker(Request $request)
    {

        $carbon= Carbon::now();
        // $carbon= Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $carbon = Carbon::now()->daysInMonth;
        return view('admin.company.worker',compact('carbon'));
    }

    public function updateCompanyForm($id){
        $company = ConfixCompany::find($id);
        return view('admin.company.updatecompany', compact('company'));
    }

    public function updateCompany(Request $request, $id){
        $company = ConfixCompany::find($id);
        $company -> fill($request->all());
        $company -> save();
        return redirect('company/info');
    }

    public function addBranchForm(){
        $bran = BranCompany::all();
        return view('admin.company.addbranch', compact('bran'));
    }

    public function addBranch(Request $request){
        $bran = new BranCompany();
        $bran ->fill($request->all());
        $bran -> save();
        return redirect()->route('setting.branch.list')->with('message.success', "Thêm chi nhánh thành công !");
    }

    public function updateBranchForm($id){
        $bran = BranCompany::find($id);
        return view('admin.company.updatebranch', compact('bran'));
    }

    public function updateBranch(Request $request, $id){
        $bran = BranCompany::find($id);
        $bran -> fill($request->all());
        $bran -> save();
        return redirect()->route('setting.branch.list')->with('message.success', "Cập nhật chi nhánh " . $bran->code_branch . " thành công!");
    }
}
?>
