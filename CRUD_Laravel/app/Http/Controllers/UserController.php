<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_profile;
use App\Models\user_favorite;
use App\Models\favorities;
use App\Models\User;
use App\Models\posts;
use Illuminate\Support\Facades\Pagination;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        // dd($user);
        return view('auth.list', [
            'users'  => $users,
        ]);
    }
    //method delete
    public function delete($id) {
        $user_favorite = user_favorite::with('favorite')->where('user_id', $id)->get();
        $user = User::find($id);
        if($user_favorite == null) {
            $user->delete();
            return redirect()->route('auth.list')->with("Xoa thanh cong");
        } else {
            return redirect()->route('auth.list')->with("Khong the xoa");
        }
    }

    public function showPost($id) {
        $posts = posts::with('post')->where('user_id', $id) -> get();

        return view('auth.posts', [
            'posts' => $posts
        ]);
    }

    public function showFavorite($id) {
        $favorities = user_favorite::with('favorities')->where('user_id', $id) -> get();

        return view('auth.favorities', [
            'favorities' => $favorities,
        ]);
    }

}
