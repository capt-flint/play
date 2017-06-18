<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LRedis;

class MessageController extends Controller
{
    public function sendMessage()
    {

        $redis = LRedis::connection();
        $data = ['message' => Request::input('message'), 'user' => Request::input('user')];
        $redis->publish('message', json_encode($data));
        return response()->json([]);
    }
}
