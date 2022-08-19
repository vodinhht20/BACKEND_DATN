<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Company;
use App\Models\Branch;
use App\Models\Noti;
use App\Repositories\DepartmentRepository;
use App\Repositories\PositionRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{

    public function __construct(private DepartmentRepository $departmentRepo, private PositionRepository $positionRepo)
    {
        //
    }

    public function info(Request $request)
    {
        $company = Company::orderBy('id', 'desc')->paginate(10);
        return view('admin.company.info', compact('company'));
    }

    public function index(){
        $branch = Branch::orderBy('id', 'desc')->paginate(5);
        return view('admin.company.branchs', compact('branch'));
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
            'position_leader' => 'required',
        ], [
            'id.required' => 'Phòng ban không tồn tại',
            'name.required' => 'Tên phòng ban không được để trống',
            'positions.required' => 'Vui lòng thêm vị trí cho phòng ban',
            'position_leader.required' => 'Vui lòng lựa chọn leader',
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
            $this->positionRepo->createAndUpdateCustom($request->positions, $request->position_leader, $department->id);
            $orgDepartments = $this->departmentRepo->formatVueSelect('name');

            DB::commit();
            return response()->json([
                'message' => "Cập nhật phòng ban thành công !",
                'data' => $orgDepartments
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
            'position_leader' => 'required',
        ], [
            'id.required' => 'Phòng ban không tồn tại',
            'name.required' => 'Tên phòng ban không được để trống',
            'positions.required' => 'Vui lòng thêm vị trí cho phòng ban',
            'position_leader.required' => 'Vui lòng lựa chọn leader'
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
            $this->positionRepo->createAndUpdateCustom($request->positions, $request->position_leader, $department->id);
            $orgDepartments = $this->departmentRepo->formatVueSelect('name');
            DB::commit();
            return response()->json([
                'message' => "Thêm mới phòng ban thành công !",
                'data' => $orgDepartments
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

    public function removeDepartment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ], [
            'id.required' => 'Phòng ban không tồn tại',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error_code' => 'validate_failed',
                'messages' => array($validator->messages()->first())
            ], 442);
        }

        try {
            DB::beginTransaction();
            $result = $this->departmentRepo->removeDepartmentAndPosition($request->id);
            if ($result) {
                $orgDepartments = $this->departmentRepo->formatVueSelect('name');
                DB::commit();
                return response()->json([
                    'message' => "Xóa phòng ban thành công !",
                    'data' => $orgDepartments
                ], 200);
            }
            DB::rollBack();
            return response()->json([
                'error_code' => 'remove_failed',
                'message' => 'Xóa phòng ban thất bại !'
            ], 442);
        } catch (\Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            Log::error($message);
            DB::rollBack();
            Noti::telegramLog('Create Department', $message);
            return response()->json([
                'error_code' => 'exception_error',
                'message' => $e->getMessage()
            ], 442);
        }

        return response()->json([
            'error_code' => 'remove_faild',
            'message' => 'Xóa phòng ban thất bại'
        ], 442);
    }

    public function worker(Request $request)
    {

        $carbon= Carbon::now();
        // $carbon= Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $carbon = Carbon::now()->daysInMonth;
        return view('admin.company.worker',compact('carbon'));
    }

    public function updateCompanyForm($id){
        $company = Company::find($id);
        return view('admin.company.updatecompany', compact('company'));
    }

    public function updateCompany(Request $request, $id){
        $company = Company::find($id);
        $company -> fill($request->all());
        $company -> save();
        return redirect()->route('setting.company.info')->with("message.success", "Cập nhật thông tin công ty thành công !");
    }

    public function addBranchForm(){
        $bran = Branch::all();
        return view('admin.company.addbranch', compact('bran'));
    }

    public function addBranch(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'hotline' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'radius' => 'required|numeric|min:100|max:1000',
        ], [
            'name.required' => 'Tên chi nhánh không được để  trống !',
            'address.required' => 'Địa chỉ chi nhánh không được để  trống !',
            'hotline.required' => 'Hotline không được để trống !',
            'longitude.required' => 'Kinh độ không được để trống !',
            'latitude.required' => 'Vĩ độ không đươc để trống !',
            'radius.required' => 'Bán kinh không được để trống !',
            'radius.min' => 'Bán kinh phải lớn 100 m !',
            'radius.max' => 'Bán kinh phải nhỏ hơn 1000 m !',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }
        try {
            $branchCode = $this->makeBranchCode();
            $brand = new Branch();
            $brand->fill([...$request->all(), "branch_code" => $branchCode]);
            $brand->save();
            return redirect()->route('setting.branch.list')->with('message.success', "Thêm chi nhánh thành công !");
        } catch (\Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            Log::error($message);
            Noti::telegramLog('Create Branch', $message);
            return redirect()->back()->with('message.error', "Không thể tạo mới chi nhánh vào lúc này. Vui lòng thử lại")->withInput();
        }
    }

    public function updateBranchForm($id){
        $branch = Branch::find($id);
        return view('admin.company.updatebranch', compact('branch'));
    }

    public function updateBranch(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'hotline' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'radius' => 'required|numeric|min:100|max:1000',
        ], [
            'name.required' => 'Tên chi nhánh không được để  trống !',
            'address.required' => 'Địa chỉ chi nhánh không được để  trống !',
            'hotline.required' => 'Hotline không được để trống !',
            'longitude.required' => 'Kinh độ không được để trống !',
            'latitude.required' => 'Vĩ độ không đươc để trống !',
            'radius.required' => 'Bán kinh không được để trống !',
            'radius.min' => 'Bán kinh phải lớn 100 m !',
            'radius.max' => 'Bán kinh phải nhỏ hơn 1000 m !',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }
        $brand = Branch::find($id);
        if (!$brand) {
            return redirect()->back()->with('message.error', 'Không tìm thấy chi nhánh này !')->withInput();
        }
        try {
            $brand->fill($request->all());
            $brand->save();
            return redirect()->route('setting.branch.list')->with('message.success', "Cập nhật chi nhánh " . $brand->branch_code . " thành công!");
        } catch (\Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            Log::error($message);
            Noti::telegramLog('Update Branch', $message);
            return redirect()->back()->with('message.error', "Không thể cập nhật chi nhánh vào lúc này. Vui lòng thử lại")->withInput();
        }
    }

    public function makeBranchCode($prefix = "CMB", $suffixes = ""): string
    {
        $maxIdBranch = Branch::max('id');
        $branchCode = $prefix . $maxIdBranch . $suffixes;
        $banchExist = Branch::where("branch_code", $branchCode)->first();
        if ($banchExist) {
            return $this->makeBranchCode($prefix, rand(1, 9));
        }
        return $branchCode;
    }
}
?>
