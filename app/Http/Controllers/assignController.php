<?php

namespace App\Http\Controllers;

use App\Models\DepartmentAssigns;
use App\Models\User;
use Illuminate\Http\Request;

class assignController extends Controller
{
    public $model;
   public function __construct(DepartmentAssigns $departmentAssigns){
        $this->model=$departmentAssigns;
   }
   public function assign(Request $request){
    $res=$this->model->create($request->except("_token"));
    if($res){
        return response()->json([
            "message"=>"added",
            "status"=>201
        ],201);
    }
   }

   public function data(){
    $res= DepartmentAssigns::with(['user', 'department'])->get();
    return response()->json(
        ["data"=>$res],200
    );

    
   }
}
