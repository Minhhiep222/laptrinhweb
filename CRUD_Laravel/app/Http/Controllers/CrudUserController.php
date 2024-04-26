<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * CRUD User controller
 */
class CrudUserController extends Controller
{

    /**
     * Login page
     */
    public function login()
    {
        return view('auth.login');
    }

    public function authUser(Request $request) {

        //kiểm tra email, password không được bỏ trống
        $request->validate(['email'=>'required',
        'password'=>'required']);
        //credentials thông tin xác thực: 
        // $user_id = $request->get('id');
        // $user = User::find($user_id);
        // if(Auth::check()){
        //     //  $userTotal = User::all();
        //     $users = DB::table('users');
        //     return view('auth.list', ['users' => $users]);
        // }

        // for ($users as $user) {
        //     $request->POST('email') = $user->email
        //     $request->POST('password') = $user->password
        // } 

        //only : chỉ lấy giá trị được chỉ định
        $credentials = $request->only('email', 'password');
        //
            return redirect()->intended('list')->withSuccess('Sign in');
    }

    /**
     * Registration page
     */
    public function createUser()
    {
        return view('auth.create');
    }

    /**
     * User submit form register
     */
    public function postUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
            'img' => 'required',
        ]);

        $data = $request->all();
        $check = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'img' => $data['img']
        ]);

        return redirect("login");
    }

    /**
     * View user detail page
     */
    public function readUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('auth.read', ['user' => $user]);
    }

    /**
     * Delete user by id
     */
    public function deleteUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::destroy($user_id);

        return redirect("list")->withSuccess('You have signed-in');
    }

    /**
     * Form update user page
     */
    public function updateUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('auth.update', ['user' => $user]);
    }

    /**
     * Submit form update user
     */
    public function postUpdateUser(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,id,'.$input['id'],
            'password' => 'required|min:6',
        ]);

       $user = User::find($input['id']);
       $user->name = $input['name'];
       $user->email = $input['email'];
       $user->password = $input['password'];
       $user->phone = $input['phone'];
       $user->img = $input['img'];
       $user->save();

        return redirect("list")->withSuccess('You have signed-in');
    }

    /**
     * List of users
     */
    public function listUser()
    {
        //kiem tra co dang nhap hay chua
        if(Auth::check()){
            //  $userTotal = User::all();
            $userTotal = User::count();
            $users = DB::table('users')->paginate(3);
            $pages = ceil($userTotal/3);
            return view('auth.list', ['users' => $users,"pages" => $pages]);

            //users la so thanh phan trong 1 trang -> no se tu dinh nghia duoc trang nao minh dang chon 
            //su dung $users->previousPageUrl() de quay lai
            // su dung $users->nextPageUrl() de sang trang tiep theo 
            //range de lam tron , vi du tong co 8 thanh phan va duoc chia thanh 3 trang , 8/3 con 2.3 no se lam tron thanh 3 va trang thu 3 se co it thanh phan hon
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Sign out
     */
    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}