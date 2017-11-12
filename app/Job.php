<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model {

	public function contractor() {
		return $this->belongsTo( 'App\User' );
	}

	public function proposals() {
		return $this->hasMany( 'App\Proposal' );
	}

	public function addProposal($proposal) {
		$proposal = $this->proposals()->create($proposal);
		return $proposal;
	}

	public function path() {
		return '/jobs/' . $this->id;
	}
}
