<?php

namespace App\Http\Controllers;

use App\Repositories\SingleTypeRepository;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function __construct(private SingleTypeRepository $singleTypeRepo)
    {
        //
    }

    public function index()
    {
        return view('admin.application.view');
    }
    public function detail()
    {
        return view('admin.application.detail');
    }
    public function nestView()
    {
        $options = [
            'with' => 'approvers.employee'
        ];

        $singleTypes = $this->singleTypeRepo->getPublicSingleType($options);
        return view('admin.application.viewnest', compact('singleTypes'));
    }
    public function policy()
    {
        return view('admin.application.policy');
    }
    public function procedure()
    {
        return view('admin.application.procedure');
    }


}
