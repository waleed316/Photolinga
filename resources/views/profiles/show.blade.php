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
											<img src="/{{ $profileUser->avatar() }}" class="rounded-circle img-fluid" alt=""> {{--
											<modal v-if="openModal" open="true"></modal>--}} @endcan @cannot('update',$profileUser)
											<img src="/{{ $profileUser->avatar() }}" class="rounded-circle img-fluid" alt=""> @endcannot
										</div>
										<div class="name">
											<h6 class="details-freelance-name">
												<a href="#">{{ $profileUser->name }}</a>
											</h6>
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
									<h1 class="p-overview-head">Overview @can('update',$profileUser)
										<button @click="editing=true" class="btn btn-danger">
											<i style="font-size: 15px" class="fa fa-pencil" aria-hidden="true"></i>
										</button>
										@endcan
									</h1>

									<div v-if="editing" class="panel panel-default">
										<div class="panel-body">
											<textarea name="description" rows="10" class="form-control" v-model="description"></textarea>
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
								</div>
								<div class="history-portion">
									<h1 class="review-head">Work history and Reviews
										<span>({{ count($profileUser->jobs) }})</span>
									</h1>
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
													{{--
													<h6 class="r-date">3 hours @
														<b>$350</b>
													</h6>--}}
													<h6 class="r-date">Earned $125</h6>
												</div>
											</div>
										</li>
										@endforeach
									</ul>
								</div>
								<div class="portfolio-portion">
									<h1 class="portfolio-head">Portfolio ({{ count($profileUser->portfolio) }} items) @can('update',$profileUser)
										<button @click="" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
											<i style="font-size: 15px" class="fa fa-plus" aria-hidden="true"></i>
										</button>
										<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload Images</h4>
        </div>
        <div class="modal-body">
            <form action="{{route('dropzone.store')}}"
      class="dropzone"
      id="my-dropzone">
          {{csrf_field()}}
      </form>
       <button id="submit-all" class="btn btn-primary">Upload all files</button>
      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
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
												<b>{{ $profileUser->contactInformation->city }}, {{ $profileUser->contactInformation->country }}</b>
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
</profile-view>

<script type="text/javascript" src="{{asset('js/UploadImage.js')}}"></script>
@endsection