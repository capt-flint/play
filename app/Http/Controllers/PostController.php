<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //@todo delete this
        $this->validate($request, ['text' => 'required']);

        $post = Auth::user()->posts()->create($request->all());

        if ($request['group_id']) {
            $group = Group::find($request['group_id']);

            $group->posts()->attach($post);

            $group->save();
        }

        return back();
    }
}
