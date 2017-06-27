<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    /**
     * Only quest
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Form login
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View\
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(Request $request)
    {
        $this->validate($request, ['email' => 'required|string', 'password' => 'required|string']);

        if(!auth()->attempt(request(['email', 'password'])))
        {
            return redirect()->back();
        }

        return redirect('profile');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        auth()->logout();

        return redirect()->home();
    }
}
