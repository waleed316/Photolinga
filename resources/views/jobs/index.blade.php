@extends('layouts.master')

@section('content')

    @include('layouts.nav')


    <!-- main section -->
    <div class="container-fluid post-bg-color">
        <div class="container">
            <div class="row search-padding">
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4">
                    <h3 class="search-loc-heading">Find Work</h3>
                </div>

                <div class="col-xl-8 col-lg-6 col-md-6 col-sm-6">
                    <form class="form" method="GET" action="{{ route('jobs') }}">
                        <div class="input-group form-search">
                            <input type="text" name="location" class="form-control navbar-search"
                                   placeholder="Search by Location">
                            <span class="input-group-btn">
    <button class="btn btn-secondary navbar-search-btn" type="submit">
    <svg version="1.1" id="Capa_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
         y="0px"
         viewBox="0 0 451 451" style="enable-background:new 0 0 451 451;" xml:space="preserve">
    <g>
    <path d="M447.05,428l-109.6-109.6c29.4-33.8,47.2-77.9,47.2-126.1C384.65,86.2,298.35,0,192.35,0C86.25,0,0.05,86.3,0.05,192.3s86.3,192.3,192.3,192.3c48.2,0,92.3-17.8,126.1-47.2L428.05,447c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4C452.25,441.8,452.25,433.2,447.05,428z M26.95,192.3c0-91.2,74.2-165.3,165.3-165.3c91.2,0,165.3,74.2,165.3,165.3s-74.1,165.4-165.3,165.4C101.15,357.7,26.95,283.5,26.95,192.3z"
    />
    </g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    </svg>
    </button>
    </span>
                        </div>
                    </form>
                </div>
            </div>

            @if(request('location'))
                <h4 style="text-align: center">
                    Selected Location: <strong>{{ request('location') }}</strong>
                </h4>
            @endif

            <div class="row jobs-top-margin">

                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12">
                    <h6 class="recent-search-heading">Popular Searches</h6>
                    <ul class="recent-search-list">
                        <li>
                            <a class="recent-search" href="{{ route('jobs',['location'=>'Karachi']) }}">Karachi</a>
                        </li>
                        <li>
                            <a class="recent-search" href="{{ route('jobs',['location'=>'Hyderabad']) }}">Hyderabad</a>
                        </li>
                        <li>
                            <a class="recent-search" href="{{ route('jobs',['location'=>'Lahore']) }}">Lahore</a>
                        </li>
                        <li>
                            <a class="recent-search" href="{{ route('jobs',['location'=>'Quetta']) }}">Quetta</a>
                        </li>
                        <li>
                            <a class="recent-search" href="{{ route('jobs',['location'=>'Islamabad']) }}">Islamabad</a>
                        </li>
                    </ul>

                    <h6 class="recent-search-heading">Job Categories</h6>
                    <ul class="recent-search-list">
                        @foreach(\App\Category::latest()->get() as $category)
                            <li>
                                <a class="recent-search"
                                   href="/jobs/browse/{{ $category->slug }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>


                <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12">
                    <div class="card card-box-shadow">
                        <div class="card-heading card-head-bg-color">
                            <div class="card-title">
                                <h6 class="job-heading">All Jobs</h6>
                            </div>
                        </div>

                        <div class="card-body card-padding">
                            <ul class="event-description-list">
                                @foreach($jobs as $job)
                                    <li>
                                        <div class="row">
                                            {{--<div class="ribbon">--}}
                                            {{--<span>FEATURED</span>--}}
                                            {{--</div>--}}
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <h6 class="event-desc-head">
                                                    <a href="{{ $job->path() }}">{{ $job->title }}</a>
                                                </h6>
                                                <h6 class="event-budget">Budget: {{ $job->budget }} PKR</h6>
                                                <p class="event-description">{{ $job->description }}</p>
                                                <ul class="event-loc-list">
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                            {{ $job->location }}</a>
                                                    </li>

                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                @auth
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12">
                        <ul class="profile-list">
                            <li>
                                <a href="{{ route('profile',Auth::user()) }}">
                                    <img src="{{ asset(auth()->user()->avatar()) }}" alt=""
                                         class="img-fluid profile-img">
                                    <span class="profile-name"> My Profile</span>
                                </a>
                            </li>
                            <li>
                                <h5 class="profile-available">Availability</h5>
                            </li>
                            <li class="availablity">
                                <i class="fa fa-clock-o" aria-hidden="true"></i> Available to work
                            </li>
                            <li>
                                <h5 class="profile-available">Proposals</h5>
                            </li>
                            <li>
                                <a href="#" class="proposals">3 submitted proposals</a>
                            </li>
                            <li>
                                <a href="#" class="proposals">4 bids remaining</a>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>

        </div>
    </div>

@endsection