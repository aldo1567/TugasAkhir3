<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    //
    public function index(){
        $admins = User::where('role','admin')->get();
        $users = User::where('role','user')->get();
        return view('pages.admin.user.index',compact('admins','users'));
    }
    public function store(Request $request){
        $duplicate=User::where('name',$request['name'])->where('email',$request['email'])->first();
        if($duplicate){
            Alert::info('Duplicate','Data Already Exist');
            return redirect()->route('user.index');
        }
        User::create([
            'name'=> $request['name'],
            'email' => $request['email'],
            'role' => 'admin',
            'gender'=> $request['gender'],
            'age'=>$request['age'],
            'phone_number'=>$request['phone_number'],
            'password' =>$request['password'],
        ]);
        Alert::success('Success','Data Successfully Added');
        return redirect()->route('user.index');
    }
    public function destroy(User $id){
        $id->delete();
        Alert::error('Remove','Data Successfully Removed');
        return redirect()->route('user.index');
    }
}
