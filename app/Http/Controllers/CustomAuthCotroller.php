<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use App\Models\Admin;
use Hash;
use Session;
class CustomAuthCotroller extends Controller
{
    public function registration(){
        return view('auth.register');
    }

    public function login(){
        return view('auth.login');
    }

    public function regCreate(Request $request){
        $request->validate([
         'name'=>'required',
         'email'=>'required|email|unique:admins',
         'password'=>'required|min:5|max:5'
        ]);

        $user = new Admin;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res =$user->save();
        if($res){
          return back()->with('success','You Have Registered Successfully'); 
        }else{
            return back()->with('fail','something wrong'); 
   
        }



    }


    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:5|max:12'
           ]); 

        $user = Admin::Where('email', '=', $request->email)->first(); 
        // $testy = $user->id;
     
        if($user){ 
         if(Hash::check($request->password, $user->password)){
          $request->Session()->put('loginId', $user->id);
        //    return redirect('layouts.app');
        return view('layouts.app');

         }else{
            return back()->with('fail','Your password is not valid');  

         }   

        }else{
            return back()->with('fail','Your email is not registered'); 

        }
    }


    public function logout(){
        // if(Session::has('loginId')){
        //     Session::pull('loginId');
          return redirect('login');
        // }

    }


}
