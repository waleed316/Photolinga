<?php

namespace App\Http\Controllers;

use App\Job;
use App\Proposal;
use App\Events\Bidplaced;

class ProposalsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [ 'except' => 'index' ]);
    }

    public function store( Job $job )
    {
        $this->authorize('apply', $job);

        request()->validate([
            'body' => 'required',
            'amount' => 'required|numeric'
        ]);

        $Proposal=$job->addProposal([
            'body' => request('body'),
            'amount' => request('amount'),
            'user_id' => auth()->id(),
        ]);
        event(new Bidplaced($Proposal));
        return redirect($job->path());
    }

    public function show( Proposal $proposal )
    {
        $this->authorize('view', $proposal);

        return view('proposals.show', compact('proposal'));
    }

    public function update( Proposal $proposal )
    {
        $this->authorize('update', $proposal);
        request()->validate([
            'body' => 'required',
            'amount' => 'required'
        ]);

        $proposal->update(request([ 'body', 'amount' ]));
    }

    public function destroy( Proposal $proposal )
    {
        $this->authorize('delete', $proposal);

        $proposal->delete();

        if ( request()->expectsJson() ) {
            return response([ 'status' => 'Proposal deleted' ]);
        }
        return back();
    }
}
