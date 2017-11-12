<?php

namespace App\Http\Controllers;

use App\Job;
use App\Proposal;

class ProposalsController extends Controller {

	public function __construct() {
		$this->middleware( 'auth', [ 'except' => 'index' ] );
		$this->middleware( 'role:freelancer', [ 'except' => 'show' ] );
		//		$this->middleware( 'role:contractor', [ 'only' => 'show' ] );
	}

	public function store( Job $job ) {
		request()->validate( [
			'body' => 'required'
		] );

		return $job->addProposal( [
			'body'    => request( 'body' ),
			'amount'  => request( 'amount' ),
			'user_id' => auth()->id(),
		] );
	}

	public function show( Proposal $proposal ) {
		if ( $proposal->job->contractor->id == auth()->id() ) {
			return view( 'proposals.show', compact( 'proposal' ) );
		} else {
			return redirect( '/' );
		}
	}

	public function update( Proposal $proposal ) {
		//		if ( $proposal->owner->id == auth()->id() ) {
		request()->validate( [
			'body' => 'required'
		] );

		$proposal->update( request( [ 'body' ] ) );
		//		}
	}
}
