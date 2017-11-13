@extends('layouts.master')

@section('content')

    @include('layouts.nav')

    <!-- main section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 profile-bg">
                <div class="profile-bg-height">
                    <img src="{{ asset('images/profile-bg.jpg') }}" alt="" class="img-fluid">
                    <div class="profile-banner"></div>

                    <div class="container profile-name">
                        <div class="row">
                            <div class="col-xl-12 text-center">
                                <h1 class="main-profile-name">{{ $profileUser->name }}</h1>
                                <h6 class="main-profile-loc">Karachi, Pakistan</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container profile-pic">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <img src="{{ asset('images/person-2.jpg') }}" alt=""
                                 class="img-fluid rounded profile-avatar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Overview section  -->
    <div class="container-fluid overview-margin">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-7 col-sm-12 column-color">
                    <h3 class="overview-heading">Overview</h3>
                    <p class="overview-detail">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                        survived not only five centuries, but also the leap into electronic typesetting, remaining
                        essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                        containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus
                        PageMaker including versions of Lorem Ipsum. Contrary to popular belief, Lorem Ipsum is not
                        simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it
                        over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in
                        Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum
                        passage, and going through the cites of the word in classical literature, discovered the
                        undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum
                        et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise
                        on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum,
                        "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12 mobile-view-margin">
                    <h5 class="overall-heading">Overall Rating</h5>
                    <ul class="overall-list">
                        <li><a href="#" class="rating"><span class="badge badge-default rating-badge">5.0</span></a>
                        </li>
                        <li><a href="#" class="rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li><a href="#" class="rating">3 Reviews</a></li>
                    </ul>

                    <hr>

                    <h5 class="overall-heading">Associated with</h5>
                    <ul class="associated-list">
                        <li>None</li>
                    </ul>

                    <hr>

                    <h5 class="overall-heading">Skills</h5>
                    <ul class="associated-list">
                        <li>Wedding</li>
                        <li>Nature</li>
                        <li>Sports</li>
                    </ul>

                    <hr>

                    <h5 class="overall-heading pull-left">Membership Type</h5><span class="pull-right"><a href="#"
                                                                                                          class="upgrade-heading">Upgrade</a></span>
                    <ul class="associated-list clear">
                        <li>Free</li>
                    </ul>

                    <hr>

                    <h5 class="overall-heading pull-left">Profile Link</h5>
                    <ul class="associated-list associated-list-margin clear">
                        <li><input type="text" class="form-control profile-link" value="https://photolinga/profiles/{{ $profileUser->id }}" readonly>
                        </li>
                        <li><a href="#" class="copy-link">Copy Link</a></li>
                        <li>
                            <button type="button" class="btn btn-primary btn-block hire-btn">Hire Me</button>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <!-- Packages Section -->
    <div class="container-fluid overview-margin">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 column-color">
                    <h3 class="overview-heading">Packages</h3>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 packages-padding">
                            <img src="{{ asset('images/36fcda8.jpg') }}" alt="" class="img-fluid">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <h6 class="packages-detail">Package 1</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-right">
                                    <h6 class="packages-detail">5000 PKR</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 packages-padding">
                            <img src="{{ asset('images/36fcda8.jpg') }}" alt="" class="img-fluid">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <h6 class="packages-detail">Package 1</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-right">
                                    <h6 class="packages-detail">5000 PKR</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Portfolio section -->
    <div class="container-fluid overview-margin">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 column-color">
                    <h3 class="overview-heading">Portfolio</h3>
                    <ul class="portfolio-list">
                        <li>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-md-6 col-sm-6 packages-padding">
                                    <img src="{{ asset('images/36fcda8.jpg') }}" alt="" class="img-fluid">
                                    <h5 class="packages-detail text-center">Guitar Hero</h5>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-md-6 col-sm-6 packages-padding">
                                    <img src="{{ asset('images/36fcda8.jpg') }}" alt="" class="img-fluid">
                                    <h5 class="packages-detail text-center">Guitar Hero</h5>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-md-6 col-sm-6 packages-padding">
                                    <img src="{{ asset('images/36fcda8.jpg') }}" alt="" class="img-fluid">
                                    <h5 class="packages-detail text-center">Guitar Hero</h5>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-md-6 col-sm-6 packages-padding">
                                    <img src="{{ asset('images/36fcda8.jpg') }}" alt="" class="img-fluid">
                                    <h5 class="packages-detail text-center">Guitar Hero</h5>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-md-6 col-sm-6 packages-padding">
                                    <img src="{{ asset('images/36fcda8.jpg') }}" alt="" class="img-fluid">
                                    <h5 class="packages-detail text-center">Guitar Hero</h5>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-md-6 col-sm-6 packages-padding">
                                    <img src="{{ asset('images/36fcda8.jpg') }}" alt="" class="img-fluid">
                                    <h5 class="packages-detail text-center">Guitar Hero</h5>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- Work History Section -->
    <div class="container-fluid overview-margin">
        <div class="container column-color">
            <div class="row column-color">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <h4 class="overview-heading">Work History & Feedback</h4>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <select class="form-control col-4 pull-right">
                        <option>Default select</option>
                    </select>
                </div>
            </div>

            <div class="row column-color">
                <div class="col-xl-12">
                    <ul class="work-history-list">
                        @forelse($profileUser->createdJobs as $job)
                            <li>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                        <h5 class="cover-event-name">{{ $job->title }}</h5>
                                        <h6 class="cover-date">Aug 2017 - Sep 2017</h6>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                        <h6 class="cover-event-amount text-right">PKR 10,000 earned</h6>
                                    </div>
                                </div>
                                <hr>
                            </li>

                        @empty

                            {{ $profileUser->name }} has not completed any jobs yet.

                        @endforelse
                        {{--<li>--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">--}}
                        {{--<h5 class="cover-event-name">Cover My Event</h5>--}}
                        {{--<h6 class="cover-date">Aug 2017 - Present</h6>--}}
                        {{--</div>--}}

                        {{--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">--}}
                        {{--<h6 class="cover-event-amount text-right">PKR 6,000 earned</h6>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection