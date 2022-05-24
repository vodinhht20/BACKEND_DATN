<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class CompanyController extends Controller
{
    public function info(Request $request)
    {
        return view('admin.company.info');
    }

    public function updatecompany(){
        return view('admin.company.updatecompany');
    }

    public function addbranch(){
        return view('admin.company.addbranch');
    }

    public function updatebranch(){
        return view('admin.company.updatebranch');
    }
}
?>
