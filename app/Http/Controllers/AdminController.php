<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public $model;
    public function __construct() {
        $this->model=new admin();
    }
    public function createAdmin(SignUpRequest $request){
       $validation= $request->validated();

        
       if ($request->hasFile('image')) {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $fileName = time().'_' . uniqid().'.' . $extension;
        $image->move(public_path('images'), $fileName);
        $url = asset('images/' . $fileName);
        $validation['image'] = $url;
    }
       if($validation){
        try {
          $res=  $this->model->create($validation);
          if($res){
            return response()->json([
                "message"=>"admin created",
                "status"=>201
            ],201);
          }
        } catch (\Throwable $th) {
            dd($th->getMessage());
            
        }
       }

    }
}
