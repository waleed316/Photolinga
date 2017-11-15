<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model {

	protected $guarded = [];

	public function contractor() {
		return $this->belongsTo( 'App\User' );
	}

	public function proposals() {
		return $this->hasMany( 'App\Proposal' );
	}

	public function addProposal( $proposal ) {
		$proposal = $this->proposals()->create( $proposal );

		return $proposal;
	}


	/**
	 * Award the job to the given proposal
	 *
	 * @param Proposal $proposal
	 */
	public function awardJob( Proposal $proposal ) {
		$this->update( [ 'awarded_proposal_id' => $proposal->id ] );
	}


	/**
	 * Return the string path for the job
	 *
	 * @return string
	 */
	public function path() {
		return '/jobs/' . $this->id;
	}
}
