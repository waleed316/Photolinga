@extends('layouts.master') @section('content') @include('layouts.nav')

<!-- main section -->
<div class="container-fluid mt-1 pt-1 pb-1 details-margin">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <a href="/jobs" class="back-btn">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i> &nbsp;Back to results</a>
            </div>
        </div>
    </div>
</div>

<job-view inline-template :initial-proposals-count="{{ count($job->proposals) }}">
    <section class="details-bg-color">
        <div class="container-fluid">
            <div class="container mb-1">
                <div class="row pt-5" style="border-bottom: 1px solid black">

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 px-0">
                        <h6 class="details-title">PROJECT TITLE</h6>
                        <h6 class="details-text detail-text-pb">
                            <b>{{ $job->title }}</b>
                        </h6>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-4 px-0">
                        <h6 class="details-title">BY</h6>
                        <h6 class="details-text detail-text-pb">{{ $job->contractor->name }}</h6>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-4 px-0">
                        <h6 class="details-title">POSTED DATE</h6>
                        <h6 class="details-text detail-text-pb">{{ $job->created_at->diffForHumans() }}</h6>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-4 px-0">
                        <h6 class="details-title">BUDGET</h6>
                        <h6 class="details-text detail-text-pb">
                            <b>{{ $job->budget }} PKR</b>
                        </h6>
                    </div>

                    @can('apply',$job)
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 px-0">
                            <h6 class="details-title ml-3 hidden-sm-down">&nbsp;</h6>
                            <h6 class="details-text">
                                <a href="javascript:void(0)" id="bid" class="btn-bid">Bid</a>
                            </h6>
                        </div>
                    @endcan @guest
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 px-0">
                            <h6 class="details-title ml-3 hidden-sm-down">&nbsp;</h6>
                            <h6 class="details-text">
                                <a class="btn-bid" href="/login">Log In</a>
                            </h6>
                        </div>
                    @endguest

                </div>
                @auth
                    <new-proposal inline-template v-if="{{ Auth::user()->can('apply',$job) }}">
                        {{-- @can('apply',$job)--}}
                        <div class="row mt-3 pb-4" id="bid-hide">
                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 bord">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pl-4">
                                        <form action="{{ $job->path() }}/proposals" method="POST">
                                            {{ csrf_field() }}
                                            <ul class="dash-bloady">
                                                <li>
                                                    <div class="row">
                                                        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-9 col-8 r-nb">
                                                            <b class="aaa">Bid:</b>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-group row mb-0">
                                                        <label for="smFormGroupInput"
                                                               class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4 r-nb col-form-label col-form-label-sm">Place
                                                            your bid:</label>
                                                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5 col-4 mob-mary">
                                                            <div class="input-group r-bid">
                                                                <input type="number" class="form-control r-bid-i"
                                                                       placeholder="3500" aria-label="Amount"
                                                                       name="amount" v-model="amount">
                                                                <span class="input-group-addon r-bid-i rr">PKR</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-group row mb-0">
                                                        <label class="col-xl-3 col-lg-3 col-md-4 col-sm-4 r-nb col-6 pb-0 col-form-label r-bid-i">Photolinga
                                                            Project Fee:</label>
                                                        <div class="col-sm-4 col-6 mob-mary">
                                                            <p class="form-control-static pb-0 r-bid-i">
                                                                <b v-text="projectFee+' PKR'"></b>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-group row mb-0">
                                                        <label class="col-xl-3 col-lg-3 col-md-4 r-nb col-sm-4 col-6 pb-0 col-form-label r-bid-i">Your
                                                            bid:
                                                        </label>
                                                        <div class="col-sm-6 col-6 mob-mary">
                                                            <p class="form-control-static pb-0 r-bid-i">
                                                                <b v-text="bidAmount+' PKR'"></b>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <p class="demo r-nb">
                                                <b>Note:</b> Photolinga Project Fee will only be charged when you get
                                                awarded and accept the project</p>
                                            <hr>
                                            <div class="form-group">
                                                <label for="exampleTextarea">Description:</label>
                                                <textarea class="form-control" id="exampleTextarea" rows="10"
                                                          name="body"></textarea>
                                            </div>

                                            <button type="submit" class="btn btn-send-prop pull-right">Place Bid
                                            </button>

                                        </form>

                                    </div>

                                </div>
                            </div>

                            {{--
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">--}} {{--
							<div class="boxer">--}} {{--
								<h6 class="bid-left">BIDS LEFT</h6>--}} {{--
								<h6 class="ratio">7
									<sub>/8</sub>
								</h6>--}} {{--
								<!-- <hr> -->--}} {{--
								<!-- <h6 class="bid-left">Quality Score</h6>--}}
                            {{--<h6 class="ratio">76</h6> -->--}} {{--
							</div>--}} {{--
						</div>--}}
                        </div>
                        {{--@endcan--}}
                    </new-proposal>
                @endif {{--

				<div class="row details-bg-white pt-0">--}} {{--
					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-4 det-com details-border">--}} {{--
						<h6 class="details-bids mb-0 border-left-0 first-pad">
							<span>0</span> Comments</h6>--}} {{--
					</div>--}} {{--

					<div class="col-xl-1 col-lg-1 col-md-1 col-sm-4 col-4 det-bid details-border">--}} {{--
						<h6 class="details-bids mb-0 border-left-0 first-pad">--}} {{--
							<span v-text="proposalsCount"></span> Bids</h6>--}} {{--
					</div>--}} {{--

					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-4 det-avg details-border">--}} {{--
						<h6 class="details-bids mb-0 border-left-0 first-pad no-margin-on-med">--}} {{--
							<span>
								<sup>$</sup>325</span> Avg Bid (PKR)</h6>--}} {{--
					</div>--}} {{--

					<div class="col-xl-2 col-lg-3 col-md-2 col-sm-6 col-6 det-time details-border">--}} {{--
						<h6 class="details-bids mb-0 border-left-0 first-pad no-margin-on-med">
							<span>Open</span> 1--}} {{--day,--}} {{--12 hours left</h6>--}} {{--
					</div>--}} {{--

					<div class="col-xl-3 col-lg-2 col-md-3 col-sm-6 col-6 det-price details-border">--}} {{--
						<h6 class="details-bids mb-0 border-left-0 text-align border-right-0">
							<a--}} {{--href="{{ route('jobs.create') }}" --}} {{--class="detail-create-project">
								<span>
									<i--}} {{--class="fa fa-plus-circle" aria-hidden="true"></i>
								</span> Create a--}} {{--Project--}} {{--like this</a>
						</h6>--}} {{--
					</div>--}} {{--

					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 det-social details-border">--}} {{--
						<ul class="details-social-list border-left-0 border-right-0">--}} {{--
							<li>
								<a href="#" class="social-list-details">
									<i class="fa fa-facebook" --}} {{--aria-hidden="true"></i>
								</a>
							</li>--}} {{--

							<li>
								<a href="#" class="social-list-details-1">
									<i class="fa fa-twitter" --}} {{--aria-hidden="true"></i>
								</a>
							</li>--}} {{--
							<li>
								<a href="#" class="social-list-details-2">
									<i class="fa fa-google-plus" --}} {{--aria-hidden="true"></i>
								</a>
							</li>--}} {{--
						</ul>--}} {{--
					</div>--}} {{--

				</div>--}}

                <div class="row details-bg-white pt-4">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                        <h6 class="details-project-desc">Project Description:</h6>
                        <p class="details-detail mt-3">{{ $job->description }}</p>

                        {{--
                        <div class="details-image">--}} {{--
							<img src="{{ asset('images/project_detail.jpg') }}" alt="">--}} {{--
						</div>--}} {{--
						<hr class="hidden-sm-down">--}}


                    </div>

                    {{--
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">--}} {{--
						<h6 class="details-project-desc">Skills required:</h6>--}} {{--
						<p class="tags-required">--}} {{--
							<a href="#" class="required-skills">PHP</a>--}} {{--
							<a href="#" class="required-skills">JAVASCRIPT</a>--}} {{--
							<a href="#" class="required-skills">WORDPRESS</a>--}} {{--
							<a href="#" class="required-skills">REACT</a>--}} {{--
							<a href="#" class="required-skills">DEVELOPER</a>--}} {{--
						</p>--}} {{--

						<h6 class="details-project-desc">Category:</h6>--}} {{--
						<ul class="rating-client ml-1">--}} {{--
							<li class="bold">Web Development</li>--}} {{--
							<li class="bold2">UI Design</li>--}} {{--
						</ul>--}} {{--

						<h6 class="details-project-desc">Attachments:</h6>--}} {{--
						<ul class="detail-attach ml-1">--}} {{--
							<li>
								<a href="#" class="details-attached">
									<i class="fa fa-paperclip" aria-hidden="true"></i>--}} {{--Brief 1</a>
							</li>--}} {{--
							<li>
								<a href="#" class="details-attached">
									<i class="fa fa-paperclip" aria-hidden="true"></i>--}} {{--Contract
								</a>
							</li>--}} {{--
						</ul>--}} {{--

					</div>--}}
                </div>
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                        <div class="row hidden-sm-down">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <h6 class="details-title">BIDDING FREELANCERS (@{{ proposalsCount }})</h6>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                <h6 class="details-title">REPUTATION</h6>
                            </div>

                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                                <h6 class="details-title">BID</h6>
                            </div>
                        </div>


                        <ul class="details-freelance-list">
                            <proposals :proposals="{{ $job->proposals }}" @removed="proposalsCount--"></proposals>

                            {{--@forelse($job->proposals as $proposal)--}} {{--@include('jobs.proposal')--}} {{--@empty--}} {{--
							<div class="row details-bg-white">--}} {{--
								<div class="panel panel-default">--}} {{--
									<div class="panel-body">--}} {{--
										<h6 style="margin: 10px;">No proposals yet.</h6>--}} {{--
									</div>--}} {{--
								</div>--}} {{--
							</div>--}} {{--@endforelse--}}
                        </ul>
                    </div>


                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="row hidden-sm-down">
                            <div class="col-xl-12">
                                <h6 class="details-title">ABOUT COMPANY</h6>
                            </div>
                        </div>

                        <div class="row details-bg-white margin-on-large">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="row pb-2">
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-2 col-3">
                                        <div class="comments-images ml-1 mt-3">
                                            <a href="{{ $job->contractor->profile() }}">
                                                <img src="{{ asset($job->contractor->avatar())}}"
                                                     class="engine-border freelance-margin img-fluid rounded-circle"
                                                     alt="">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-xl-9 col-lg-9 col-md-8 col-sm-10 col-9 mt-4 px-0">
                                        <h6 class="details-freelance-name mb-1">
                                            <a href="#">
                                                <b>{{ $job->contractor->name }}</b>
                                            </a>
                                        </h6>
                                        <p class="details-freelance-desig">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <span class="ml-2 text-muted">Member Since Aug, 3 2014</span>
                                        </p>
                                    </div>
                                </div>

                                <ul class="company-profile pt-2">
                                    <li>
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-2 text-center">
                                                <i class="fa fa-map-marker text-muted" aria-hidden="true"></i>
                                            </div>

                                            <div class="col-xl-6 col-lg-5 col-md-5 col-sm-6 col-5 no-padd-on-md-down">
                                                <p class="text-muted">Location</p>
                                            </div>

                                            <div class="col-xl-4 col-lg-5 col-md-5 col-sm-3 col-5 no-padd-on-md-down text-right">
                                                <p>
                                                    <b>Viet Nam</b>
                                                </p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-2 text-center">
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                            </div>

                                            <div class="col-xl-6 col-lg-5 col-md-5 col-sm-6 col-5 no-padd-on-md-down">
                                                <p class="text-muted">Total Spent</p>
                                            </div>

                                            <div class="col-xl-4 col-lg-5 col-md-5 col-sm-3 col-5 no-padd-on-md-down text-right">
                                                <p>
                                                    <b>$ 2,707</b>
                                                </p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-2 text-center">
                                                <i class="fa fa-briefcase text-muted" aria-hidden="true"></i>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-7 col-sm-6 col-5 no-padd-on-md-down">
                                                <p class="text-muted">Project Posted</p>
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-3 col-sm-3 col-5 no-padd-on-md-down text-right">
                                                <p>
                                                    <b>8</b>
                                                </p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-2 text-center">
                                                <i class="fa fa-paper-plane text-muted" aria-hidden="true"></i>
                                            </div>

                                            <div class="col-xl-6 col-lg-5 col-md-7 col-sm-6 col-5 no-padd-on-md-down">
                                                <p class="text-muted">Hires</p>
                                            </div>

                                            <div class="col-xl-4 col-lg-5 col-md-3 col-sm-3 col-5 no-padd-on-md-down text-right">
                                                <p>
                                                    <b>4</b>
                                                </p>
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
</job-view>

@endsection