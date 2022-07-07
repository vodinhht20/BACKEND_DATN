<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\SingleTypeRepository;
use Illuminate\Http\Request;

class SingleWordController extends Controller
{
    public function __construct(private SingleTypeRepository $singleTypeRepo)
    {
        $this->singleTypeRepo = $singleTypeRepo;
    }

    public function getListSingleType(){
        $singleType = $this->singleTypeRepo->getPublicSingleType();
        return response()->json([
            "status" => "200",
            "payload" => $singleType,
        ]);
    }

    public function GetApprover($id){
        $approver = $this->singleTypeRepo->getInforEmployeeById($id);
        return response()->json([
            "status" => "200",
            "payload" => $approver,
        ]);
    }
}
