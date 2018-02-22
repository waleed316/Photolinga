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
											@can('update',$profileUser)
											<!-- 	<button class="btn btn-danger" id="button-skill">
											<i style="font-size: 15px" class="fa fa-pencil" aria-hidden="true"></i>
										</button> -->
										
	<div class="container">
  	  <div class="row" >
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" id="skill-input">
                <div class="panel-heading"></div>
         
                	<div class="panel-body">
  					  <autocomplete></autocomplete>
					</div>   
            </div>
        </div>
    </div>
</div>
 @endcan
			@cannot('update',$profileUser)
   <div class="right-sec">
                    <p class="tags-required">
                    	@foreach($skillSet as $skill)
                      <a href="#" class="required-skills">{{$skill->name}}
                      </a>
                        @endforeach
                    </p>
     </div>
                  @endcannot
    
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
									<h1 class="portfolio-head">Portfolio ({{ count($profileUser->album) }} items) @can('update',$profileUser)
										
									
											<button @click="" class="btn btn-danger" data-toggle="modal" data-target="#AlbumModal">
											<i style="font-size: 15px" class="fa fa-plus" aria-hidden="true"></i>
										</button>		

										 
									
										@endcan
										
<div class="modal fade" id="AlbumModal" role="dialog">
											<div class="modal-dialog">

												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Album Name</h4>
													</div>
													<div class="modal-body">
														<form action="{{route('album.store')}}" method="post" enctype="multipart/form-data">
															{{csrf_field()}}
															<label for="AlbumName" class="album-modal"> Album Name:</label>
															<input type="text" name="title" id="AlbumName" required>
															<label for="thumbnailName" class="album-modal album-thumbnail">Thumbnail:</label>
															<input type="file" name="thumbnail" class="modal-thumbnail" id="thumbnailName" required>
															<input type="hidden" name="user_id" value="{{auth()->id()}}">
															<div class="Album-button">
														<button class="btn btn-primary">Save</button>
														</div>
													</form>

													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>

											</div>
										</div>

									</h1>

									<ul class="portfolio-list" >
										@foreach( $profileUser->album as $portfolio )

										<li>
											
											
										<!-- @yield('model') -->


										@can('update',$profileUser)
										<a href="" class="btn" data-toggle="modal" data-target="#album-{{$portfolio->id}}">
											

											
											
											<div class="portfoli-box">
												<div class="p-image">
													<img src="{{asset('storage/Uploads/'.$portfolio->thumbnail)}}" class="img-fluid" alt="">

													<div class="p-text">
														<h6>{{ $portfolio->title }}</h6>
													</div>
												</div>
											</div>
										</a>
										<div class="modal fade" id="album-{{$portfolio->id}}" role="dialog">
											<div class="modal-dialog">

												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Upload Images</h4>
													</div>
													<div class="modal-body">
														<div id="err"></div>
														<form action="{{route('dropzone.store',['id'=>$portfolio->id])}}" class="dropzone" id="my-dropzone">
															{{csrf_field()}}
														
														</form>
														<button id="submit-all" class="btn btn-primary" style="display: none">Upload all files</button>
														
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>

											</div>
										</div>
										@endcan


										@cannot('update',$profileUser)	


										<a href="" class="btn" data-toggle="modal" data-target="#albumShow-{{$portfolio->id}}">
											

											
											
											<div class="portfoli-box">
												<div class="p-image">
													<img src="{{asset('storage/Uploads/'.$portfolio->thumbnail)}}" class="img-fluid" alt="">

													<div class="p-text">
														<h6>{{ $portfolio->title }}</h6>
													</div>
												</div>
											</div>
										</a>
										<div class="modal fade" id="albumShow-{{$portfolio->id}}" role="dialog">
											<div class="modal-dialog"  style="height: 450px;overflow: scroll;">

												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Portfolio</h4>
													</div>
													<div class="modal-body">
														<div id="err"></div>
														@foreach($portfolio->images as $abc)
														<img src="{{asset('storage/Uploads/'.$abc->path)}}" class="img-fluid" alt="">
														@endforeach
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>

											</div>
										</div>



										@endcannot							
										
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
<!--  -->	<div class="modal fade" id="invite" role="dialog">
											<div class="modal-dialog">

												
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Invite</h4>
													</div>
									<div class="modal-body">
										<div>
											@auth
											@if(count(auth()->user()->createdJobs))
											@foreach(auth()->user()->createdJobs as $job)
													{{ $job->title }}
													<form method="POST" action="{{route('invite',['id'=>$profileUser->id])}}">
														{{csrf_field()}}
												<input type="hidden" name="jobid" value="{{$job->id}}" >
												<!-- <input type="hidden" name="userid" value="{{$profileUser->id}}"> -->
											<button class="btn btn-danger" >
												<div>Invite</div> 
											</button>
																</form>


															@endforeach
												@else
												<div>You have no projects</div>
												@endif
											@endauth
												@guest
												<div>Login please</div>
												@endguest
														</div>
														
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>

											</div>
										</div>	
							
									<a href="#" class="btn-sm btn btn-join-me" data-toggle="modal" data-target="#invite">Invite me to join</a>
									
									
									<!-- <a href="#" class="btn-sm btn btn-join-me">Invite me to join</a> --> 
									or
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
												<b>{{$profileUser->rate}} PKR</b>
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
												<b>{{$profileUser->rating}}</b>
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
										@can('update',$profileUser)
						  <div class="fb-share-button" 
    data-href="http://127.0.0.1:8000/profiles/{{$profileUser->id }}" 
    data-layout="button_count">Share
  </div>
<script type="IN/Share" data-url="https://photolinga.com/profiles/{{$profileUser->id }}" style="padding: 20px;"></script>
<a class="twitter-share-button"
  href="https://twitter.com/share" 
  data-text="Write Something.."
  data-url="https:photolinga.com/profiles/{{$profileUser->id}}"
  data-hashtags="photolinga"
  data-via="Photolinga"
  data-related="photolinga">
Tweet
</a>
@endcan
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
@endsection