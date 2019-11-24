<?php

namespace App\Http\Controllers;

use App\AppliedJob;
use App\JobInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		// $this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {

		$job_infos = JobInfo::all();
		return view('home_page', compact('job_infos'));
	}

	public function getJobDetails(Request $request, $id) {
		$appliedJob = '';
		if (Auth::user()) {
			$appliedJob = AppliedJob::where('user_id', Auth::user()->id)->where('job_info_id', $id)->first();
		}

		$job_info = JobInfo::where('job_infos.id', $id)->join('employeers', 'employeers.id', '=', 'job_infos.employeer_id')->select('job_infos.*', 'employeers.business_name')->first();

		return view('job_details', compact('job_info', 'appliedJob'));
	}
}
