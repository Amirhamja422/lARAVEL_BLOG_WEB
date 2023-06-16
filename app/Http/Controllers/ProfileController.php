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
                    $actionBtn = "<a href='javascript:void(0)' class='edit btn btn-success btn-sm' onclick='editData($data->user_id)'>Edit</a>&nbsp;";
                    #Delete Button
                    $actionBtn .= "<a href='javascript:void(0)' class='delete btn btn-danger btn-sm' onclick='deleteData($data->user_id)'>Delete</a>";

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
               //  return redirect()->back();

        }
        return view('admin.profile.test');

    }

}