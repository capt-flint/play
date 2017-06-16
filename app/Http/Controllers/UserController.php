<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('user.index', ['user' => $user]);
    }

    public function addFriend(Request $request)
    {
        $validator = $this->validate($request, ['friend' => 'required|int']);
        $friend = new Friend();
        $friend->user_1 = Auth::id();
        $friend->user_2 = $request->friend;
        $friend->status = false;
        $friend->save();

        return redirect()->back();
    }
}
