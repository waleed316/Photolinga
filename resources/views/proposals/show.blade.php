@extends('layouts.master')

@section('content')

    <!-- main section -->
    <div class="container-fluid mt-1 pt-1 pb-1 details-margin">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <a href="{{route('jobs.show',['id'=>$proposal->job_id])}}" class="back-btn"><i class="fa fa-chevron-left" aria-hidden="true"></i> &nbsp;Back
                        to results</a>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid post-bg-color">
        <div class="container">
            <div class="row jobs-top-padding">

                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12" style="margin-bottom:3%">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-3">
                                    <img src="{{ asset('images/person-2.jpg') }}" alt=""
                                         class="img-fluid rounded-circle">
                                </div>
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-9 pl-0">
                                    <h4 class="detail-heading"><a
                                                href="{{ $proposal->owner->profile() }}">{{ $proposal->owner->name }}</a>
                                    </h4>
                                    <ul class="detail-page">
                                        <li><a href="#"
                                               class="anchor-badge1">Posted {{ $proposal->created_at->diffForHumans() }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row mt-3 ml-2">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                    <i class="fa fa-money fa-clock-price" aria-hidden="true"></i>
                                    <ul class="detail-page-price-list">
                                        <li><p class="hours">Bid</p></li>
                                        <li><p class="hours2">{{ $proposal->amount }} PKR</p></li>
                                        <!-- <li><p class="hours2">More than 6 months</p></li>                                                                                 -->
                                    </ul>
                                </div>

                                {{--<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">--}}
                                {{--<i class="fa fa-clock-o fa-clock-price" aria-hidden="true"></i>--}}
                                {{--<ul class="detail-page-price-list">--}}
                                {{--<li><p class="hours">Job Complete in </p></li>--}}
                                {{--<li><p class="hours2">30 hrs/Week</p></li>--}}
                                {{--<li><p class="hours2">More than 4 weeks</p></li>--}}
                                {{--</ul>--}}
                                {{--</div>--}}
                            </div>


                        </div>
                    </div>

                    <div class="row white-bg">
                        <div class="col-xl-12">
                            <h5 class="detailing">Cover Letter</h5>

                            <!-- <a class="need-to-hire">Needs to hire 5 Freelancers</a> -->


                            <p class="detail-desc">{{ $proposal->body }}</p>


                            <p class="tags-required">
                            <h6 class="skilss">Skills</h6>
                            <a href="#" class="required-skills">Photography</a>
                        </div>
                    </div>


                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                    <a href="#" class="pull-right flag-inap">Flag as inappropriate</a>

                    <form id="awardForm" style="display: none" action="{{ $proposal->path().'/award' }}" method="post">
                        {{ csrf_field() }}
                    </form>

                    @can('award',$proposal->job)
                        <button class="btn btn-proposal" onclick="event.preventDefault();
                                                     document.getElementById('awardForm').submit();">Hire
                        </button>
                    @endcan
                <!-- <button class="btn btn-save-job">Save Job</button> -->

                    <ul class="required-connect">
                    {{--                        <li><a href="{{ $proposal->owner->profile() }}" class="connect-prop">View Profile</a></li>--}}
                    <!-- <li><a href="#" class="connect-prop">Proposal: 2</a></li>
                        <li><a href="#" class="connect-prop">Available Connects : 80</a></li>                         -->
                    </ul>

                    <hr class="margin-hr">

                    <h6 class="about-client">Work History</h6>

                    <ul class="rating-client">
                        <li class="bold">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            {{--(4.70)25--}}
                        </li>
                        {{--<li class="bold2">95% job Success</li>--}}
                    </ul>

                    <ul class="rating-client">
                        <li class="bold">Pakistan</li>
                        <li class="bold2">{{ $proposal->owner->contactInformation->city }}</li>
                    </ul>

                    {{--<ul class="rating-client">--}}
                    {{--<li class="bold">Hours Worked</li>--}}
                    {{--<li class="bold2">168 Hours</li>--}}
                    {{--</ul>--}}

                    {{--<ul class="rating-client">--}}
                    {{--<li class="bold">Over $50,000 Total Gain</li>--}}
                    {{--<li class="bold2">39 Jobs Done, 2 Active</li>--}}
                    {{--</ul>--}}

                    {{--<ul class="rating-client">--}}
                    {{--<li class="bold">$5.42<span>/hr</span> Avg Hourly Rate Paid</li>--}}
                    {{--<li class="bold2">34,986 Hours</li>--}}
                    {{--</ul>--}}


                    <ul class="rating-client">
                        <li class="bold2">Member since {{ $proposal->owner->created_at->diffForHumans() }}</li>
                    </ul>

                </div>

            </div>


            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                    <h6 class="other-heading mb-4">OTHERS BIDS</h6>
                    <div class="row hidden-sm-down">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <h6 class="details-title">BIDDING FREELACERS({{ count($proposal->job->proposals)-1 }})</h6>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                            <h6 class="details-title">REPUTATION</h6>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                            <h6 class="details-title">BID</h6>
                        </div>
                    </div>

                    <ul class="details-freelance-list">
                        @foreach(\App\Proposal::where('job_id',$proposal->job->id)->where('user_id','!=',$proposal->owner->id)->get() as $proposal)
                            <li>
                                <div class="row details-bg-white">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-4">
                                                <div class="comments-images ml-1 mt-3">
                                                    <a href="{{ $proposal->owner->profile() }}"><img
                                                                src="{{ $proposal->owner->avatar() }}"
                                                                class="freelance-margin img-fluid rounded-circle"
                                                                alt=""></a>
                                                </div>
                                            </div>

                                            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-9 col-8 mt-4 px-0">
                                                <h6 class="details-freelance-name mb-1"><a
                                                            href="{{ $proposal->owner->profile() }}">{{ $proposal->owner->name }}</a>
                                                </h6>
                                                <p class="details-freelance-desig mb-1">Senior Graphic - Web
                                                    Designer</p>
                                                <a href="{{ $proposal->path() }}" class="btn-sm viev-all">View
                                                    Proposal</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-6 no-padding-on-sm">
                                        <div class="freelance-year-btn mt-4">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>

                                            <a href="#" class="freelance-year px-2">2+ Years</a>
                                        </div>
                                    </div>

                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-6">
                                        <div class="freelance-biding mt-3">
                                            <p class="freeware">&nbsp;<span>{{ $proposal->amount }} PKR</span></p>
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

@endsection