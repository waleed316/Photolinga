<?php

namespace App\Http\Controllers;

use App\Proposal;
use Illuminate\Http\Request;

class AwardProposalsController extends Controller
{
    public function store( Proposal $proposal )
    {
        $this->authorize( 'award', $proposal->job );
        $proposal->job->awardJob( $proposal );

        return redirect( $proposal->job->path() );
    }
}
