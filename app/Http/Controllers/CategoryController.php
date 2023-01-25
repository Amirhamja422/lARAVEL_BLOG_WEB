<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
   function index(){
        return view('layouts.app');
      }

 

     public function create(){
       return view('admin.create');
     }



     // for insert
    public function store(Request $request){
    $data['class_name'] = $request->name;
    $data['email'] = $request->email;
    DB::table('test')->insert($data);
    return redirect()->back()->witH('message', 'Your registration was successful');
    }

    public function tests(){
    $clsview = DB :: table('test')->get();
    // dd($clsview);
    //echo "ok";
    return view('admin.category',compact('clsview'));
     }


    }

