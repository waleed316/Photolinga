<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model {

	protected $guarded = [];

	public function job() {
		return $this->belongsTo( 'App\Job' );
	}

	public function owner() {
		return $this->belongsTo( 'App\User','user_id' );
	}

	public function path() {
		return '/proposals/' . $this->id;
	}
}
