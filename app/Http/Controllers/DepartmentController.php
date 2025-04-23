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
    return response()->redirectTo("dashboard");
    }

    public function deleteDepartment($id){
        $data=$this->model->findOrFail($id);
        $data->delete();
        return response()->json([
            "message"=>"deleted",
            "status"=>200
        ],200);
    }
}
