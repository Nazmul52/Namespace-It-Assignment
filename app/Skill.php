<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model {
	protected $fillable = [
		'skill',
	];

	public function user() {
		return $this->belongsTo(User::class);
	}
}
