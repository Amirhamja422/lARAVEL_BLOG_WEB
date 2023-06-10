<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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



     
    public function branView(){
      $brandViews = DB::table('brand');
      // dd($brandViews);
      return DataTables::query($brandViews)->toJson();

      // return view('admin.brand',compact('brandViews'));
       }
  

     public function delete($id){
        DB::table('test')->where('id',$id)->delete();
        return redirect()->back()->with('message', 'Your registration was successfully deleted');
    
      } 



      public function edit($id){
        $data['test'] = DB::table('test')->where('id',$id)->first();
        //dd($data);
        return view('admin.edit',$data);
         }
    
      public function update(Request $request , $id){
            $data['class_name'] = $request->name;
            $data['email'] = $request->email;
            DB::table('test')->where('id',$id)->update($data);
          return redirect()->route('admin.category')->with('message', 'Your registration was successfully updated');
    
      }


    }

