<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
USE App\Models\file;
class ImageCrudController extends Controller
{
    //
    public function imgView(){
        return view ('admin.adminlogo');
    }


    public function imgUpload(Request $request){
        // $title  = $request->title_name;
        // return $title;
        // return ($request->all());
        // $request->validate([
        //    'title_name' => 'required',
        //    'file_path' => 'required|mimes:png,jpg,jpeg',
        //  ]);
        // $request->validate([
        //     'file' => 'required|file|mimes:jpg,png,jpeg|max:2048',
        // ]);
        $filename = time() . '.' . $request->file->extension();
        $request->file->move(public_path('file'), $filename);
        $storeData = ['name' => $request->title_name,'file_path' => $filename];
        file::create($storeData);
        return response()->json([
            'message' => 'Image uploaded successfully.',
           'image' => 'file/' . $filename
        ], 200);
        return redirect()->back();

    }

}
