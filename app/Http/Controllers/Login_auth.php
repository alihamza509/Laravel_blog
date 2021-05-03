<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class Login_auth extends Controller
{
    function login_submit(Request $request){
    	$email=$request->input('email');
        $pass=$request->input('password');
        $con=DB::table('users')->where('email',$email)->where('password',$pass)->get();
        if(isset($con[0]->id)){
         if($con[0]->status==1){
            $request->session()->put('s_id',$con[0]->id);
            $request->session()->put('name',$con[0]->name);
            return redirect('admin');
         }else{
            $request->session()->flash('msg','YOU ARE DEACTIVATED');
            return redirect('admin/login');
         }


        }else{
            $request->session()->flash('msg','Please enter valid Details');
            return redirect('admin/login');
        }
    }
}
