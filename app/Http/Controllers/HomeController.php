<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the user editor.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getEditor()
    {
        return view('edit');
    }

    /**
     * Update user data.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(UserUpdateRequest $request)
    {
        $user = User::findOrFail(Auth::id());

        $filtered = collect($request->all())
            ->filter(function ($value) {
                return null !== $value;
            })->toArray();

        if (isset($filtered['password']))
            $filtered['password'] = Hash::make($filtered['password']);
        $user->update($filtered);

        Auth::setUser($user);

        return Redirect::to('/home');
    }

    public function delete(Request $request)
    {
        $user = User::find(Auth::id());
        $user->delete();
        return Redirect::to('/home');
    }
}
