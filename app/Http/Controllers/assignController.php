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
        return response()->redirectTo("dashboard");
    }
   }

   public function data(){
    $res= DepartmentAssigns::with(['user', 'department'])->get();
    return response()->json(
        ["data"=>$res],200
    );

    
   }
   public function delete($id){
    $data=$this->model->findOrFail($id);
    
    if($data){
        $data->delete();
        return response()->json(["data"=>"deleted"]);
    }
   }
}
