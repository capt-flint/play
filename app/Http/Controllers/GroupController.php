<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Show all groups
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $groups = Group::all();

        return view('group.index', compact('groups'));
    }

    /**
     * Show group
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $group = Group::find($id);
        return view('group.view', ['group' => $group]);
    }

    /**
     * Edit group
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $group = Group::find($id);
        return view('group.edit', ['group' => $group]);
    }

    /**
     * Update group
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {

        $id = (int)$request->input('id');
        $group = Group::find($id);
        $group->update($request->all());

        return redirect('groups');
    }

    /**
     * Join group
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function joinGroup(Request $request)
    {
        $validator = $this->validate($request, ['id' => 'required|int']);
        $group = Group::find($request->id);
        $group->users()->attach(Auth::id(), ['status' => 0]);
        return redirect()->back();
    }
}
