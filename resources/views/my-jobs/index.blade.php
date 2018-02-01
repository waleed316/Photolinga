@extends('layouts.master')

@section('content')

    @include('layouts.nav')

    <div class="p-2" style="width: 100%">
        <div class="card my-jobs-card">
            <h5 class="card-header">
                <strong>My Jobs</strong>
            </h5>
            @forelse(auth()->user()->jobs as $job)
                <div class="card-body p-2">
                    <a href="{{ $job->path() }}">
                        <h4 class="card-title">{{ $job->title }}</h4>
                    </a>
                    <p class="card-text">{{ $job->description }}</p>
                    <p class="item-right text-right">Amount: {{ $job->awardedProposal->amount }} PKR</p>
                </div>
            @empty
                <div class="card-body p-2">
                    <p class="text-center">No Jobs in Progress. Apply to Jobs from the Jobs Page.</p>
                </div>
            @endforelse
        </div>
        <br><br>
        <div class="card my-jobs-card">
            <h5 class="card-header">
                <strong>Created Jobs</strong>
            </h5>
   

            @forelse(auth()->user()->createdJobs as $job)
   
    <div class="modal fade" id="exampleModal-{{ $job->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
             <rating :jobid="{{ $job->id }}"></rating>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      
                <div class="card-body p-2">
                    <a href="{{ $job->path() }}">
                        <h4 class="card-title">{{ $job->title }}</h4>
                    </a>
                   @if($job->completed)
                     <button type="button" class="btn btn-primary" style="float: right;">
                            Completed 
                    </button>
                    
                    @else
                    
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{ $job->id }}" style="float: right;">
                            Mark as complete 
                    </button>
                    @endif
                    <p class="card-text">{{ $job->description }}</p>
                    <p class="item-right text-right">Amount: {{ $job->budget}} PKR</p>
                </div>
            @empty
                <div class="card-body p-2">
                    <p class="text-center">You have not created any jobs yet. Post a job to get started.</p>
                </div>
            @endforelse
        </div>
    </div>

@endsection