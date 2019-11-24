<?php

namespace App\Http\Controllers\Employeer;

use App\Employeer;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Register Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles the registration of new users as well as their
		    | validation and creation. By default this controller uses a trait to
		    | provide this functionality without requiring any additional code.
		    |
	*/

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = 'employeer/home';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest:employeer');
	}
	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, [
			'first_name' => ['required', 'string', 'max:255'],
			'last_name' => ['required', 'string', 'max:255'],
			'business_name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:employeers'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);
	}

	public function register(Request $request) {
		// return $request->all();
		$this->validator($request->all())->validate();

		$user = $this->create($request->all());

		$this->guard()->login($user);

		return $this->registered($request, $user)
		?: redirect($this->redirectPath());
	}
	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\User
	 */
	protected function create(array $data) {
		return Employeer::create([
			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
			'business_name' => $data['business_name'],
			'email' => $data['email'],
			'password' => Hash::make($data['password']),
		]);
	}

	public function showRegistrationForm() {
		return view('employeer.register');
	}

	protected function guard() {
		return Auth::guard('employeer');
	}

	protected function registered(Request $request, $user) {
		//
	}
}
