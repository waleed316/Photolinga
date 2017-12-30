@extends('layouts.master') @section('content') @include('layouts.nav')

<!-- main section -->
<profile-view inline-template :user="{{ $profileUser }}" avatar="/{{ $profileUser->avatar() }}" v-cloak>

    <section class="details-bg-color pt-5">
        <div class="container-fluid">
            <div class="container pb-1">
                <div class="row mx-0">
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="about-freelancer-box">
                            <h6 class="about-head">ABOUT FREELANCER</h6>
                            <div class="freelance-box">
                                <div class="upper-portion">
                                    <div class="left-sec">
                                        <div class="img">
                                            @can('update',$profileUser)
                                                <img src="/{{ $profileUser->avatar() }}"
                                                     class="rounded-circle img-fluid"
                                                     alt="">
                                                {{--<modal v-if="openModal" open="true"></modal>--}}
                                            @endcan
                                            @cannot('update',$profileUser)
                                                <img src="/{{ $profileUser->avatar() }}"
                                                     class="rounded-circle img-fluid"
                                                     alt="">
                                            @endcannot
                                        </div>
                                        <div class="name">
                                            <h6 class="details-freelance-name"><a href="#">{{ $profileUser->name }}</a></h6>
                                            <h6 class="details-freelance-desig">Still Photographer</h6>
                                            <h6 class="review-p">0 Reviews</h6>
                                        </div>
                                    </div>
                                    <div class="right-sec">
                                        <p class="tags-required">
                                            <a href="#" class="required-skills">Cinematography</a>
                                            <a href="#" class="required-skills">VideoGraphy</a>
                                            <a href="#" class="required-skills">Still Shoots</a>
                                            <a href="#" class="required-skills">Wedding Photography</a>
                                            <a href="#" class="required-skills">ALbum Making</a>
                                            <a href="#" class="required-skills">Editing</a>
                                            <a href="#" class="required-skills">Cinematography</a>
                                            <a href="#" class="required-skills">Cinematography</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="mid-portion">
                                    <h1 class="p-overview-head">Overview
                                        @can('update',$profileUser)
                                            <button @click="editing=true" class="btn btn-danger">
                                                <i style="font-size: 15px" class="fa fa-pencil" aria-hidden="true"></i>
                                            </button>
                                        @endcan
                                    </h1>

                                    <div v-if="editing" class="panel panel-default">
                                        <div class="panel-body">
                                            <textarea name="description" rows="10" class="form-control"
                                                      v-model="description"></textarea>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="level">
                                                <button class="btn btn-danger btn-xs mr-1" @click="updateDescription">
                                                    Update
                                                </button>
                                                <button class="btn btn-xs" @click="cancelEditing">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                    <p v-else class="overview-desc" v-text="description"></p>

                                    {{--<p class="overview-desc" :text="description" v-if="!editing">--}}
                                    {{--t is a long established fact that a reader will be distracted by the readable--}}
                                    {{--content of a page when looking at its layout. The point of using Lorem Ipsum is--}}
                                    {{--that it has a more-or-less normal distribution of letters, as opposed to using--}}
                                    {{--'Content here, content here', making it look like readable English. Many desktop--}}
                                    {{--publishing packages and web page editors now use Lorem Ipsum as their default--}}
                                    {{--model text, and a search for 'lorem ipsum' will uncover many web sites still in--}}
                                    {{--their infancy. Various versions have evolved over the years, sometimes by--}}
                                    {{--accident, sometimes on purpose (injected humour and the like).--}}
                                    {{--</p>--}}
                                    {{--<div v-else>--}}
                                    {{--<div class="panel panel-default">--}}
                                    {{--<textarea name="description" id="description" cols="30" rows="10"--}}
                                    {{--v-model="description"></textarea>--}}
                                    {{--<div class="panel-footer">--}}
                                    {{----}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                                <div class="history-portion">
                                    <h1 class="review-head">Work history and Reviews
                                        <span>({{ count($profileUser->jobs) }})</span></h1>
                                    <ul class="review-list">
                                        @foreach($profileUser->jobs as $job)
                                            <li>
                                                <div class="review-box">
                                                    <div class="r-name">
                                                        <h6 class="r-company-name">{{ $job->title }}</h6>
                                                        <h6 class="r-progress">Job in progress</h6>
                                                    </div>
                                                    <div class="r-history">
                                                        <h6 class="r-date">27 July 2014 - Present</h6>
                                                        {{--<h6 class="r-date">3 hours @ <b>$350</b></h6>--}}
                                                        <h6 class="r-date">Earned $125</h6>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="portfolio-portion">
                                    <h1 class="portfolio-head">Portfolio ({{ count($profileUser->portfolio) }}
                                        items)
                                        @can('update',$profileUser)
                                            <button @click="" class="btn btn-danger">
                                                <i style="font-size: 15px" class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        @endcan
                                    </h1>
                                    <ul class="portfolio-list">
                                        @foreach( $profileUser->portfolio as $portfolio )
                                            <li>
                                                <div class="portfoli-box">
                                                    <div class="p-image">
                                                        <img src="{{ $portfolio->thumbnail }}" class="img-fluid" alt="">
                                                        <div class="p-text">
                                                            <h6>{{ $portfolio->title }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 px-0">
                        <div class="about-freelancer-box">
                            <h1 class="about-head">INFO</h1>
                            <div class="f-profile-box">
                                <div class="btn-box">
                                    <a href="#" class="btn-sm btn btn-join-me">Invite me to join</a> or
                                    <a href="#" class="contact-me">Contact me</a>
                                </div>
                                <ul class="person-detail">
                                    <li>
                                        <div class="p-box">
                                            <div class="ico">
                                                <i class="fa fa-dollar" aria-hidden="true"></i>
                                            </div>
                                            <div class="it">
                                                <h6>Hourly Rate</h6>
                                            </div>
                                            <div class="bold">
                                                <b>$60</b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="p-box">
                                            <div class="ico">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            <div class="it">
                                                <h6>Rating</h6>
                                            </div>
                                            <div class="bold">
                                                <b>$60</b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="p-box">
                                            <div class="ico">
                                                <i class="fa fa-trophy" aria-hidden="true"></i>
                                            </div>
                                            <div class="it">
                                                <h6>Experience</h6>
                                            </div>
                                            <div class="bold">
                                                <b>2 years</b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="p-box">
                                            <div class="ico">
                                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                            </div>
                                            <div class="it">
                                                <h6>Jobs Worked</h6>
                                            </div>
                                            <div class="bold">
                                                <b>10</b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="p-box">
                                            <div class="ico">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            </div>
                                            <div class="it">
                                                <h6>Hours Worked</h6>
                                            </div>
                                            <div class="bold">
                                                <b>2,707</b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="p-box">
                                            <div class="ico">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            </div>
                                            <div class="it">
                                                <h6>Location</h6>
                                            </div>
                                            <div class="bold">
                                                {{--<b>{{ $profileUser->contactInformation->city }}--}}
                                                {{--                                                    , {{ $profileUser->contactInformation->country }}</b>--}}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--<div>--}}
    {{--<div class="container-fluid">--}}
    {{--<div class="row">--}}
    {{--<div class="col-xl-12 profile-bg">--}}
    {{--<div class="profile-bg-height">--}}
    {{--<img src="{{ asset('images/profile-bg.jpg') }}" alt="" class="img-fluid">--}}
    {{--<div class="profile-banner"></div>--}}

    {{--<div class="container profile-name" style="position: absolute !important;top: 20%!important;color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-xl-12 text-center">--}}
    {{--<h1 class="main-profile-name">{{ $profileUser->name }}</h1>--}}
    {{--<h6 class="main-profile-loc">Karachi, Pakistan</h6>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="container profile-pic">--}}
    {{--<div class="row">--}}
    {{--<div class="col-xl-12 text-center">--}}
    {{--<img :src="image" :alt="user.name" --}}{{--<img src="{{ asset($profileUser->avatar()) }}" alt="" --}}{{-- class="img-fluid rounded profile-avatar"> @can('update',$profileUser)--}}
    {{--<form action="{{ route('avatar',$profileUser) }}" method="POST" enctype="multipart/form-data">--}}
    {{--{{csrf_field()}}--}}

    {{--<input type="file" name="avatar" @change="onFileChange" required>--}}
    {{--<button type="submit" class="btn btn-primary">Add Avatar</button>--}}
    {{--</form>--}}
    {{--@endcan --}}{{--@if (count($errors))--}}{{-- --}}{{----}}
    {{--<ul class="alert alert-danger">--}}{{-- --}}{{--@foreach ($errors->all() as $error)--}}{{-- --}}{{----}}
    {{--<li>{{ $error }}</li>--}}{{-- --}}{{--@endforeach--}}{{-- --}}{{----}}
    {{--</ul>--}}{{-- --}}{{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<!-- Overview section  -->--}}
    {{--<div class="container-fluid overview-margin">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-xl-9 col-lg-8 col-md-7 col-sm-12 column-color">--}}
    {{--<h3 class="overview-heading">Overview @can('update',$profileUser)--}}
    {{--<button @click="editing=true" class="btn btn-danger">--}}
    {{--<i style="font-size: 15px" class="fa fa-pencil" aria-hidden="true"></i>--}}
    {{--</button>--}}
    {{--@endcan--}}
    {{--</h3>--}}
    {{--<div v-if="editing" class="panel panel-default">--}}
    {{--<div class="panel-body">--}}
    {{--<textarea name="description" rows="10" class="form-control" v-model="description"></textarea>--}}
    {{--</div>--}}
    {{--<div class="panel-footer">--}}
    {{--<div class="level">--}}
    {{--<button class="btn btn-danger btn-xs mr-1" @click="updateDescription">Update--}}
    {{--</button>--}}
    {{--<button class="btn btn-xs" @click="editing=false">Cancel</button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<p v-else class="overview-detail" v-text="description"></p>--}}
    {{--</div>--}}

    {{--<div class="col-xl-3 col-lg-4 col-md-5 col-sm-12 mobile-view-margin">--}}
    {{--<h5 class="overall-heading">Overall Rating</h5>--}}
    {{--<ul class="overall-list">--}}
    {{--<li>--}}
    {{----}}
    {{--<a href="#" class="rating">--}}
    {{--<span class="badge badge-default rating-badge">0.0</span>--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--<li>--}}
    {{----}}
    {{--<a href="#" class="rating">--}}
    {{--<i class="fa fa-star-o" aria-hidden="true"></i>--}}
    {{--<i class="fa fa-star-o" aria-hidden="true"></i>--}}
    {{--<i class="fa fa-star-o" aria-hidden="true"></i>--}}
    {{--<i class="fa fa-star-o" aria-hidden="true"></i>--}}
    {{--<i class="fa fa-star-o" aria-hidden="true"></i>--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<span class="rating">0 Reviews</span>--}}
    {{--</li>--}}
    {{--</ul>--}}

    {{--<hr>--}}

    {{--<h5 class="overall-heading">Associated with</h5>--}}
    {{--<ul class="associated-list">--}}
    {{--<li>None</li>--}}
    {{--</ul>--}}

    {{--<hr>--}}

    {{--<h5 class="overall-heading">Skills</h5>--}}
    {{--<ul class="associated-list">--}}
    {{--<li>Wedding</li>--}}
    {{--<li>Nature</li>--}}
    {{--<li>Sports</li>--}}
    {{--</ul>--}}

    {{--<hr>--}}

    {{--<h5 class="overall-heading pull-left">Membership Type</h5>--}}
    {{--<span class="pull-right">--}}
    {{----}}
    {{--<a href="#" class="upgrade-heading">Upgrade</a>--}}
    {{--</span>--}}
    {{--<ul class="associated-list clear">--}}
    {{--<li>Free</li>--}}
    {{--</ul>--}}

    {{--<hr>--}}

    {{--<h5 class="overall-heading pull-left">Profile Link</h5>--}}
    {{--<ul class="associated-list associated-list-margin clear">--}}
    {{--<li>--}}
    {{--<input type="text" class="form-control profile-link" value="https://photolinga/profiles/{{ $profileUser->id }}" readonly>--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<a href="#" class="copy-link">Copy Link</a>--}}
    {{--</li>--}}
    {{--  @if($profileUser->id === auth()->id())--}}
    {{--<li>--}}
    {{--<button type="button" class="btn btn-primary btn-block hire-btn">--}}
    {{--<a href="{{ $profileUser->profile() . '/edit' }}" style="color: #fff;">Edit Profile</a>--}}
    {{--</button>--}}
    {{--</li>--}}
    {{--@endif  --}}
    {{--</ul>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<!-- Packages Section -->--}}
    {{----}}
    {{--<div class="container-fluid overview-margin">--}}{{-- --}}{{----}}
    {{--<div class="container">--}}{{-- --}}{{----}}
    {{--<div class="row">--}}{{-- --}}{{----}}
    {{--<div class="col-xl-12 column-color">--}}{{-- --}}{{----}}
    {{--<h3 class="overview-heading">Packages</h3>--}}{{-- --}}{{----}}
    {{--<div class="row">--}}{{-- --}}{{----}}
    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 packages-padding">--}}{{-- --}}{{----}}
    {{--<img src="{{ asset('images/36fcda8.jpg') }}" alt="" class="img-fluid">--}}{{-- --}}{{----}}
    {{--<div class="row">--}}{{-- --}}{{----}}
    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">--}}{{-- --}}{{----}}
    {{--<h6 class="packages-detail">Package 1</h6>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}
    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-right">--}}{{-- --}}{{----}}
    {{--<h6 class="packages-detail">5000 PKR</h6>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}
    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 packages-padding">--}}{{-- --}}{{----}}
    {{--<img src="{{ asset('images/36fcda8.jpg') }}" alt="" class="img-fluid">--}}{{-- --}}{{----}}
    {{--<div class="row">--}}{{-- --}}{{----}}
    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">--}}{{-- --}}{{----}}
    {{--<h6 class="packages-detail">Package 1</h6>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}
    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-right">--}}{{-- --}}{{----}}
    {{--<h6 class="packages-detail">5000 PKR</h6>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}
    {{--</div>--}}


    {{--<!-- Portfolio section -->--}}
    {{--<div class="container-fluid overview-margin">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-xl-12 column-color">--}}
    {{--<h3 class="overview-heading">--}}
    {{--Portfolio @can('update',$profileUser)--}}
    {{--<button @click="openPortfolioModal" class="btn btn-danger">--}}
    {{--<i style="font-size: 15px" class="fa fa-plus" aria-hidden="true"></i>--}}
    {{--</button>--}}
    {{----}}
    {{--<portfolio-upload></portfolio-upload>--}}{{-- @endcan--}}
    {{--<modal></modal>--}}
    {{--</h3>--}}
    {{--<ul class="portfolio-list">--}}
    {{--@forelse($profileUser->portfolio as $portfolio) @if($loop->index%2 == 0)--}}
    {{--<li>--}}
    {{--<div class="row">--}}
    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-md-6 col-sm-6 packages-padding">--}}
    {{--<img src="{{ asset('images/'.$portfolio->images()->first()) }}" alt="" class="img-fluid">--}}
    {{--<h5 class="packages-detail text-center">{{ $portfolio->title }}</h5>--}}
    {{--</div>--}}
    {{--@else--}}

    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-md-6 col-sm-6 packages-padding">--}}
    {{--<img src="{{ asset('images/'.$portfolio->images()->first()) }}" alt="" class="img-fluid">--}}
    {{--<h5 class="packages-detail text-center">{{ $portfolio->title }}</h5>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</li>--}}
    {{--@endif @empty--}}
    {{--<p>{{ $profileUser->name }} has not added any portfolio yet.</p>--}}
    {{--@endforelse --}}{{----}}

    {{--<li>--}}{{-- --}}{{----}}
    {{--<div class="row">--}}{{-- --}}{{----}}
    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-md-6 col-sm-6 packages-padding">--}}{{-- --}}{{----}}
    {{--<img src="{{ asset('images/36fcda8.jpg') }}" alt="" class="img-fluid">--}}{{-- --}}{{----}}
    {{--<h5 class="packages-detail text-center">Guitar Hero</h5>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}

    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-md-6 col-sm-6 packages-padding">--}}{{-- --}}{{----}}
    {{--<img src="{{ asset('images/36fcda8.jpg') }}" alt="" class="img-fluid">--}}{{-- --}}{{----}}
    {{--<h5 class="packages-detail text-center">Guitar Hero</h5>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}
    {{--</li>--}}{{-- --}}{{----}}

    {{--<li>--}}{{-- --}}{{----}}
    {{--<div class="row">--}}{{-- --}}{{----}}
    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-md-6 col-sm-6 packages-padding">--}}{{-- --}}{{----}}
    {{--<img src="{{ asset('images/36fcda8.jpg') }}" alt="" class="img-fluid">--}}{{-- --}}{{----}}
    {{--<h5 class="packages-detail text-center">Guitar Hero</h5>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}

    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-md-6 col-sm-6 packages-padding">--}}{{-- --}}{{----}}
    {{--<img src="{{ asset('images/36fcda8.jpg') }}" alt="" class="img-fluid">--}}{{-- --}}{{----}}
    {{--<h5 class="packages-detail text-center">Guitar Hero</h5>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}
    {{--</li>--}}

    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}


    {{--<!-- Work History Section -->--}}
    {{--<div class="container-fluid overview-margin">--}}
    {{--<div class="container column-color">--}}
    {{--<div class="row column-color">--}}
    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">--}}
    {{--<h4 class="overview-heading">Work History & Feedback</h4>--}}
    {{--</div>--}}

    {{----}}
    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">--}}{{-- --}}{{----}}
    {{--<select class="form-control col-4 pull-right">--}}{{-- --}}{{----}}
    {{--<option>Default select</option>--}}{{-- --}}{{----}}
    {{--</select>--}}{{-- --}}{{----}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="row column-color">--}}
    {{--<div class="col-xl-12">--}}
    {{--<ul class="work-history-list">--}}
    {{--@forelse($profileUser->createdJobs as $job)--}}
    {{--<li>--}}
    {{--<div class="row">--}}
    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">--}}
    {{--<h5 class="cover-event-name">{{ $job->title }}</h5>--}}
    {{--<h6 class="cover-date">Aug 2017 - Sep 2017</h6>--}}
    {{--</div>--}}

    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">--}}
    {{--<h6 class="cover-event-amount text-right">{{ $job->in_progress ? 'In Progress' : 'PKR 10,000 earned' }}</h6>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<hr>--}}
    {{--</li>--}}
    {{--@empty {{ $profileUser->name }} has not completed any jobs yet. @endforelse --}}{{----}}
    {{--<li>--}}{{-- --}}{{----}}
    {{--<div class="row">--}}{{-- --}}{{----}}
    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">--}}{{-- --}}{{----}}
    {{--<h5 class="cover-event-name">Cover My Event</h5>--}}{{-- --}}{{----}}
    {{--<h6 class="cover-date">Aug 2017 - Present</h6>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}

    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">--}}{{-- --}}{{----}}
    {{--<h6 class="cover-event-amount text-right">PKR 6,000 earned</h6>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}
    {{--</div>--}}{{-- --}}{{----}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
</profile-view>

@endsection