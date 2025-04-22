<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    protected $model;
    public function __construct(User $user){
        $this->model=$user;


    }
   public function createUser(Request $request){
    $data=  $request->validate([
        "name"=>"required",
        "email"=>"required|email",
        "password"=>"required|min:4|max:8"
    ],
    [
        "name.required"=>"plese fill your name",
        "email.required"=>"Fill your Email",
        "email.email"=>"Correct Your Email",
    ]);
    try {
       $res= $this->model->create($request->except("_token"));
       if($res){
        return response()->json([
            "message"=>"user created",
            "status"=>201
        ],201);
       }else {
        return response()->json([
            "message"=>"user Not created",
            "status"=>500
        ],500);
       }
    } catch (\Throwable $th) {
        return response()->json([
            "message"=>$th->getMessage(),
            "status"=>$th->getCode()
        ],$th->getCode());
    }
   }

   public function deleteUser($id){
  $res=$this->model->findOrFail($id);
  $res->delete();
return redirect()->route("dashboard");
   }

   public function updateUser(Request $request,$id){
    $res=$this->model->findOrFail($id);
   if($res){
    try {
       $data= $res->update([
            'name'=>$request->name,
            'email'=>$request->email
        ]);

        if($data){
            return response()->json([
                "message"=>"user Updated",
                "status"=>200
            ],200);
        }

    } catch (\Throwable $th) {
       return response()->json([
        "message"=>$th->getMessage(),
        "status"=>$th->getCode(),
       ],$th->getCode());
    }
   }
   }
}
