<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index() {

        return view ('admin.pages.users.index',[
            'prefixname' => 'Admin',
            'title' => 'User List',
            'page_title' => 'User List',
            'users' => User::all(),
        ]);
    }
    public function create(){
        if(Auth::user()->hasRole(['Admin'])) {
            return view('admin.pages.users.create', [
                'prefixname' => 'Admin',
                'title' => 'User Create',
                'page_title' => 'User Create',
                'roles' => Role::all()
            ]);
        }
        else{
            abort(401, 'Unauthorized Error');
        }
    }

    public function store(Request $request){

        $rules = [
            'name' => 'required',
            'username' => ['required','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => 'required',
        ];
        $this->validate($request, $rules);

        $user = new User();
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');;
        $user->phone = $request->get('phone');
        $user->password = bcrypt($request->get('password'));

        if ($user->save()) {
            $user->assignRole($request->get('role'));
            return redirect()->route('user.create')->with('success', 'Data Added successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function edit(){
       return "Under Constration page";
    }
    public function destroy(){
        return "Under Constration page";
    }
}
