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
                    
              <rating :jobid="{{ $job->id }}"></rating>  
                <div class="card-body p-2">
                    <a href="{{ $job->path() }}">
                        <h4 class="card-title">{{ $job->title }}</h4>
                    </a>
                    
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