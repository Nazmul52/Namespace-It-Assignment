<?php

namespace App;

use App\JobInfo;
use App\User;
use Illuminate\Database\Eloquent\Model;

class AppliedJob extends Model {
	protected $fillable = [
		'user_id', 'employeer_id', 'apply_status',
	];

	public function job_infos() {
		return $this->belongsToMany(JobInfo::class);
	}

	public function users() {
		return $this->belongsToMany(User::class);
	}
}
