<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public $model;
    public function __construct(Department $department){
        $this->model=$department;

    }
    public function addDepartment(Request $request){
    $res=  $this->model->create($request->except("_token"));
    print_r($res);
    }
}
