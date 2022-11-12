<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userControllerAdmin extends Controller
{
    private $user;
    public function __construct(User $users)
    {
        $this->user = $users;
    }
    public function index(){
        $users = $this->user->paginate(3);
        return view('admin.users.index',compact('users'));
    }
    public function create_user(){

        return view('admin.users.addUser');
    }
    public function store_user(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:tb_user',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        $user = new User([
            'name'=>$request->name,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
        ]);
        $user->save();
        return redirect()->route('user');
    }
   
    public function edit($user_id)
    {
        $user = $this->user->find($user_id);

        return view('admin.users.edituser',compact('user'));

    }

    public function update($user_id, Request $request)
    {
        $this->user->find($user_id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),          
        ]);
        return redirect()->route('user');

    }

    public function delete($user_id)
    {
        $this->user->find($user_id)->delete();
        return redirect()->route('user');
    }
}
