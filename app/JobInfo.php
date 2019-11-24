<?php

namespace App;

use App\AppliedJob;
use App\Employeer;
use Illuminate\Database\Eloquent\Model;

class JobInfo extends Model {
	protected $fillable = [
		'job_title', 'job_description', 'salary', 'location', 'country',
	];

	public function employeer() {
		return $this->belongsTo(Employeer::class);
	}

	public function applied_jobs() {
		return $this->belongsToMany(AppliedJob::class);
	}
}
