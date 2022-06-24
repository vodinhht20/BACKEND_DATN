<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ConfixCompany;
use App\Models\BranCompany;
use App\Models\Structure;


class CompanyController extends Controller
{
    public function info(Request $request)
    {
        $company = ConfixCompany::OrderBy('id', 'asc')->paginate(5);
        return view('admin.company.info', compact('company'));
    }

    public function branchs(){
        $bran = BranCompany::OrderBy('id', 'asc')->paginate(5);
        return view('admin.company.branchs', compact('bran'));
    }

    public function structure(Request $request)
    {
        $departments = Structure::OrderBy('id', 'asc')->paginate(5);
        return view('admin.company.structure', compact('departments'));
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
        return redirect('company/branchs');
    }

    public function delete($id){
        BranCompany::find($id)->delete();
        return redirect('company/branchs');
    }

    public function updateBranchForm($id){
        $bran = BranCompany::find($id);
        return view('admin.company.updatebranch', compact('bran'));
    }

    public function updateBranch(Request $request, $id){
        $bran = BranCompany::find($id);
        $bran -> fill($request->all());
        $bran -> save();
        return redirect('company/branchs');
    }
}
?>
