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

    public function nestView()
    {
        $options = [
            'with' => 'approvers.employee'
        ];

        $singleTypes = $this->singleTypeRepo->getPublicSingleType($options);
        return view('admin.application.viewnest', compact('singleTypes'));
    }
}
