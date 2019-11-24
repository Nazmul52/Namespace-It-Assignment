<?php

namespace App\Http\Controllers;

use App\AppliedJob;
use App\Employeer;
use App\JobInfo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function __construct() {
		$this->middleware('auth:employeer');
	}
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {
	$appliedJobs = AppliedJob::join('job_infos', 'job_infos.id', '=', 'applied_jobs.job_info_id')->where('employeer_id', Auth::user()->id)->join('users', 'users.id', '=', 'applied_jobs.user_id')->get();
		return view('employeer.dashboard', compact('appliedJobs'));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('employeer.job_info');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$request->validate([
			'job_title' => 'required|string|min:3',
			'job_description' => 'required|string|min:10|max:250',
			'salary' => 'required|numeric|min:5',
			'location' => 'required|string|min:3',
			'country' => 'required|string|min:3',

		]);

		$job_info = new JobInfo();

		$job_info->job_title = $request->job_title;
		$job_info->job_description = $request->job_description;
		$job_info->salary = $request->salary;
		$job_info->location = $request->location;
		$job_info->country = $request->country;
		$job_info->employeer_id = Auth::user()->id;

		$job_info->save();

		return redirect()->back()->with('message', 'Successfully save your job information.');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Employeer  $employeer
	 * @return \Illuminate\Http\Response
	 */
	public function dashboard(Request $request) {

		$appliedJobs = AppliedJob::join('job_infos', 'job_infos.id', '=', 'applied_jobs.job_info_id')->where('employeer_id', Auth::user()->id)->join('users', 'users.id', '=', 'applied_jobs.user_id')->get();

		return view('employeer.dashboard', compact('appliedJobs'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Employeer  $employeer
	 * @return \Illuminate\Http\Response
	 */
	public function getCandidateInfo(Request $request) {

		$employee = User::where('id', $request->id)->first();
		return view('employeer.candidate_info', compact('employee'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Employeer  $employeer
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Employeer $employeer) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Employeer  $employeer
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Employeer $employeer) {
		//
	}
}
