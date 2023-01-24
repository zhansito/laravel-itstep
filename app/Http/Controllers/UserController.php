<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('pages.user.login');
    }

    public function auth(Request $request)
    {
        //return Hash::make($request->password);


        $credentials = $request->validate([
            'email'     => 'email|required|min:4|max:75',
            'password'  => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            $user = User::findOrFail(auth()->user()->id);
            $user->lastvisit_at = date('Y-m-d H:i:s');
            $user->save();

            return redirect()->intended('user/dashboard');
        }

        return back()->withErrors([
            'email' => 'User\'s data not correct',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function dashboard()
    {
        $users = User::all();

        return view('pages.user.dashboard', compact('users'));
    }

    public function get_user(int $id = 0){
        
        // input
        // logic

        $user = User::find($id);

        return view('pages.user.show', compact('user'));
    }
}
