<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\http\Request;


class AuthController extends Controller
{
	public function getSignUp()
	{
		return view('auth.signup');
	}
	public function postSignUp(Request $request)
	{	
		$this->validate($request, [
				'email' => 'required|unique:users|email|max:255',
				'username' => 'required|unique:users|alpha_dash|max:20',
				'password' => 'required|min:6',
			]);

		User::create([
			'email' => $request->input('email'),
			'username' => $request->input('username'),
			'password' => bcrypt($request->input('password')),
			]);

		return redirect()->route('home')
		->with('info', 'Your account is created. You can now sign in!
			');
	}

	public function getSignin()
	{
		return view('auth.signin');
	}

	public function postSignin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required',
			'password'=> 'required',

		]);

		if(!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))){
			return redirect()->back()->with('info', 'Could not sign you in with those credentials');
		}

		return redirect()->route('home')->with('info', 'You are signed in!');
	}

	public function getSignOut()
	{
		Auth::logout();

		return redirect()->route('home');
	}
}