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
     * @param Group $group
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Group $group)
    {
        return view('group.view', ['group' => $group]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('group.create');
    }

    /**
     * Save group
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'image' => 'image|mimes:jpeg,bmp,png']);

        $group = new Group();
        $group->name = $request->name;
        $group->description = $request->description;
        $group->image = $request->image->store('photos');

        $group->save();

        return redirect('groups');
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
        $this->validate($request, ['id' => 'required|int']);
        $group = Group::find($request->id);
        $group->users()->attach(Auth::id(), ['status' => 0]);
        return redirect()->back();
    }
}
