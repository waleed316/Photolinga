<?php

namespace App\Http\Controllers;

use App\Job;
use App\Proposal;

class ProposalsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [ 'except' => 'index' ]);
    }

    public function store(Job $job)
    {
        //		if ( auth()->id() == $job->contractor->id ) {
        //			abort( 403, 'You can not apply to your own job' );
        //		}
        //
        //		if ( $job->proposals()->where( 'user_id', auth()->id() )->count() != 0 ) {
        //			abort( 403, 'You have already applied to this job' );
        //		}
        $this->authorize('apply', $job);

        request()->validate([
            'body' => 'required'
        ]);

        return $job->addProposal([
            'body'    => request('body'),
            'amount'  => request('amount'),
            'user_id' => auth()->id(),
        ]);
    }

    public function show(Proposal $proposal)
    {
        $this->authorize('view', $proposal);

        return view('proposals.show', compact('proposal'));
    }

    public function update(Proposal $proposal)
    {
        $this->authorize('update', $proposal);
        request()->validate([
            'body' => 'required'
        ]);

        $proposal->update(request([ 'body' ]));
    }

    public function destroy(Proposal $proposal)
    {
        $this->authorize('delete', $proposal);

        $proposal->delete();

        return redirect($proposal->job->path());
    }
}
