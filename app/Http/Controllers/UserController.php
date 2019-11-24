<?php

namespace App\Http\Controllers;

use App\AppliedJob;
use App\Skill;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function profile() {
		$skills = Skill::where('user_id', Auth::user()->id)->get();
		return view('profile', compact('skills'));
	}

	public function uploadPicture(Request $request) {

		if ($request->profile_picture) {
			$file = $request->profile_picture;
			$file->move(public_path() . '/user_picture', $file->getClientOriginalName());

			$image_name = $file->getClientOriginalName();
			$data['profile_picture'] = $image_name;
			DB::table('users')
				->where('id', Auth::user()->id)
				->update($data);


		}

		return back()->with('status', 'Successfully upload your profile picture.');

	}

	public function uploadCv(Request $request) {

		if ($request->cv) {
			$file = $request->cv;
			$file->move(public_path() . '/user_cv', $file->getClientOriginalName());

			$image_name = $file->getClientOriginalName();
			$data['cv'] = $image_name;
			DB::table('users')
				->where('id', Auth::user()->id)
				->update($data);

		}

		return back()->with('message', 'Successfully upload your cv.');

	}

	public function addUserSkill(Request $request) {

		$skill = new Skill();

		$skill->skill = $request->skill;

		$skill->user_id = Auth::user()->id;

		$skill->save();
		if ($skill) {
			return json_encode("Success");
		} else {
			return json_encode("Error");

		}
	}

	public function destroy(Request $request) {
		$skill = Skill::where('id', $request->id)->delete();
		if ($skill) {
			return json_encode('Success');
		} else {
			return json_encode('Error');
		}
	}

	public function applyJob(Request $request, $id) {
		if (!Auth::user()->cv) {

			return redirect()->route('profile')->with('message', 'Please upload first your cv.');
		} else {

			$appliedJob = new AppliedJob();

			$appliedJob->user_id = Auth::user()->id;
			$appliedJob->job_info_id = $id;
			$appliedJob->apply_status = 1;

			$appliedJob->save();

			return back()->with('status', 'Successfully applied this job.');
		}

	}

}
