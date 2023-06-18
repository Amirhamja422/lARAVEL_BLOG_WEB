<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use DataTables;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }




    public function index(){
        return view('admin.profile.test');
    }




    public function profileView(Request $request)
    {
        if ($request->ajax()) {
         $data = DB::table('vicidial_users')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    #Edit Button 
                    $actionBtn = "<a href='javascript:void(0)' class='edit btn btn-success btn-sm update_user_form' data-toggle='modal' data-target='#editModal' data-id='$data->user_id'
                    data-user='$data->user'
                    data-pass='$data->pass'
                    data-fname='$data->full_name'
                    data-group='$data->user_group'
                    data-login='$data->phone_login'
                    data-pp='$data->phone_pass'
                    ><i class='fa fa-edit'></i></a>&nbsp;";
                    #Delete Button
                    $actionBtn .= "<a href='javascript:void(0)' class='delete btn btn-danger btn-sm delete_user'
                    data-id='$data->user_id'
                    ><i class='fas fa-trash'></i></a>&nbsp;";

                    if($data->status=='1'){
                        $actionBtn .= "<a href='javascript:void(0)' class='btn btn-warning btn-sm user_deactivate'
                        data-id='$data->user_id'
                        ><center><i class='fa fa-check text-success'></i></center></a>";
                    }else{
                        $actionBtn .= "<a href='javascript:void(0)' class='btn btn-primary btn-sm user_active'
                        data-id='$data->user_id'
                        ><center>
                        <i class='fa fa-minus-circle white'></i>
                      </center></a>";  
                    }


                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
               //  return redirect()->back();

        }
        return view('admin.profile.test');

    }


    public function deleteUser(Request $request)
    {
        // dd($request);
      DB::table('vicidial_users')->where('user_id', $request['dlt_id'])->delete();
      return response()->json([
        'status' => 'success',
      ]);
    }
  
  

    public function createUser(Request $request){
        // dd($request->all());
        $data['user'] = $request->username;
        $data['pass'] = $request->password;
        $data['full_name'] = $request->full_name;
        $data['user_group'] = $request->user_group;
        $data['phone_login'] = $request->phone_login;
        $data['phone_pass'] = $request->phone_pass;
        DB::table('vicidial_users')->insert($data);
        return response()->json([
          'status' => 'success',
        ]);
      }


    public function userDeactive(Request $request){
        $data['user_id'] = $request->user_deactivate_id;
        $data['status'] = '0';
        DB::table('vicidial_users')->where('user_id', $request->user_deactivate_id)->update($data);
        return response()->json([
          'status' => 'success',
        ]);

    }  

    public function userActive(Request $request){
        $data['user_id'] = $request->user_activate_id;
        $data['status'] = '1';
        DB::table('vicidial_users')->where('user_id', $request->user_activate_id)->update($data);
        return response()->json([
          'status' => 'success',
        ]);

    }  
    

}