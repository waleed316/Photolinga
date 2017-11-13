<?php

namespace App\Http\Controllers;

use App\Job;
use App\Proposal;

class ProposalsController extends Controller {

	public function __construct() {
		$this->middleware( 'auth', [ 'except' => 'index' ] );
		$this->middleware( 'role:freelancer', [ 'except' => 'show' ] );
		$this->middleware( 'role:contractor', [ 'only' => 'show' ] );
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
		$this->authorize( 'view', $proposal );

		return view( 'proposals.show', compact( 'proposal' ) );
	}

	public function update( Proposal $proposal ) {
		$this->authorize( 'update', $proposal );
		request()->validate( [
			'body' => 'required'
		] );

		$proposal->update( request( [ 'body' ] ) );
	}

	public function destroy( Proposal $proposal ) {
		$this->authorize( 'delete', $proposal );

		$proposal->delete();

		return redirect( $proposal->job->path() );
	}
}
