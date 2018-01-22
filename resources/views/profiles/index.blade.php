@extends('layouts.master')

@section('content')

    @include('layouts.nav')

    <!-- main section -->
    <div class="container-fluid all-jos">
        <div class="bluuur"></div>
        <div class="container">
            <div class="row all-jobs">
                <div class="col-xl-12">
                    <div class="jobs-flex">
                        <div class="first-box">
                            <h1 class="cat-heading">Category</h1>
                            <div class="form-group">
                                <select class="form-control form-control-sm" id="category_select">
                                    <option>All</option>
                                    @foreach( \App\Category::latest()->get() as $category)
                                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="first-box">
                            <h1 class="cat-heading">Countries</h1>
                            <div class="form-group cat-form mb-2">
                                {{--<input type="text" Placeholder="Keyword"--}}
                                {{--class="form-control form-control-sm category-input">--}}
                                <select name="country" id="country">
                                    <option value="pakistan">Pakistan</option>
                                </select>
                                <i class="fa fa-search cat-search"></i>
                            </div>
                            <h1 class="cat-heading">City</h1>
                            <div class="form-group cat-form mb-2">
                                {{--<input type="text" Placeholder="Keyword"--}}
                                       {{--class="form-control form-control-sm category-input">--}}
                                <select name="city" id="city">
                                    <option value="karachi">Karachi</option>
                                    <option value="lahore">Lahore</option>
                                    <option value="hyderabad">Hyderabad</option>
                                    <option value="quetta">Quetta</option>
                                    <option value="islamabad">Islamabad</option>
                                </select>
                                <i class="fa fa-search cat-search"></i>
                            </div>
                        </div>
                        <div class="first-box">
                            <h1 class="cat-heading">Feedback Rating</h1>
                            <div class="form-group">
                                <select class="form-control form-control-sm" id="feedback" name="feedback">
                                    <option>Any Score</option>
                                    <option value="2">2 stars</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>

                        <div class="first-box">
                            <h1 class="cat-heading">Skills</h1>
                            <div class="form-group cat-form mb-2">
                                <input type="text" Placeholder="Keyword"
                                       class="form-control form-control-sm category-input">
                                <i class="fa fa-search cat-search"></i>
                            </div>
                            <p class="tags-required">
                                <a href="#" class="required-skills">Photographer <i class="fa fa-close"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-xl-12">
                    <h1 class="jobs-num"><span>{{ count($profiles) }}</span> Profiles</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-3 post-bg-color">
        <div class="container">
            <div class="row jos-details">
                <div class="col-xl-12">
                    <ul class="p-list">
                        @foreach($profiles as $profile)
                            <li>
                                <div class="profile-box">
                                    <div class="profile-upper-box">
                                        <div class="profile-image">
                                            <img src="{{ $profile->avatar() }}" class="rounded-circle" alt="">
                                        </div>
                                        <div class="p-name-section">
                                            <h1 class="details-freelance-name">{{ $profile->name }}</h1>
                                            <h6 class="details-freelance-desig">Senior Graphic - Web Designer</h6>
                                        </div>
                                        <a href="{{ $profile->profile() }}" class="btn-sm viev-all">View Profile</a>
                                    </div>
                                    <div class="profile-lower-box">
                                        <div class="p-left-section">
                                            <div class="p-rating-section">
                                                <ul class="r-list">
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                </ul>
                                            </div>
                                            <!-- <div class="p-hour">
                                                <h6 class="hour">$30/h</h6>
                                            </div>    -->
                                            <div class="p-year">
                                                <h6 class="year">2+ Years</h6>
                                            </div>
                                        </div>
                                        <div class="p-right-section">
                                            <p class="tags-required">
                                                <a href="#" class="required-skills">Design</a>
                                                <a href="#" class="required-skills">Graphic</a>
                                                <a href="#" class="required-skills">UI</a>
                                                <a href="#" class="required-skills">UX</a>
                                                <a href="#" class="required-skills">Developer</a>
                                                <a href="#" class="required-skills">Branding</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        {{--<li>--}}
                        {{--<div class="profile-box">--}}
                        {{--<div class="profile-upper-box">--}}
                        {{--<div class="profile-image">--}}
                        {{--<img src="images/person-2.jpg" class="rounded-circle" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="p-name-section">--}}
                        {{--<h1 class="details-freelance-name"><a href="#"> Salman Tariq</a></h1>--}}
                        {{--<h6 class="details-freelance-desig">Senior Graphic - Web Designer</h6>--}}
                        {{--</div>--}}
                        {{--<a href="#" class="btn-sm viev-all">View Profile</a>--}}
                        {{--</div>--}}
                        {{--<div class="profile-lower-box">--}}
                        {{--<div class="p-left-section">--}}
                        {{--<div class="p-rating-section">--}}
                        {{--<ul class="r-list">--}}
                        {{--<li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-star-o"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-star-o"></i></a></li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--<!-- <div class="p-hour">--}}
                        {{--<h6 class="hour">$30/h</h6>--}}
                        {{--</div>    -->--}}
                        {{--<div class="p-year">--}}
                        {{--<h6 class="year">2+ Years</h6>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="p-right-section">--}}
                        {{--<p class="tags-required">--}}
                        {{--<a href="#" class="required-skills">Design</a>--}}
                        {{--<a href="#" class="required-skills">Graphic</a>--}}
                        {{--<a href="#" class="required-skills">UI</a>--}}
                        {{--<a href="#" class="required-skills">UX</a>--}}
                        {{--<a href="#" class="required-skills">Developer</a>--}}
                        {{--<a href="#" class="required-skills">Branding</a>--}}
                        {{--</p>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<div class="profile-box">--}}
                        {{--<div class="profile-upper-box">--}}
                        {{--<div class="profile-image">--}}
                        {{--<img src="images/person-2.jpg" class="rounded-circle" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="p-name-section">--}}
                        {{--<h1 class="details-freelance-name"><a href="#"> Salman Tariq</a></h1>--}}
                        {{--<h6 class="details-freelance-desig">Senior Graphic - Web Designer</h6>--}}
                        {{--</div>--}}
                        {{--<a href="#" class="btn-sm viev-all">View Profile</a>--}}
                        {{--</div>--}}
                        {{--<div class="profile-lower-box">--}}
                        {{--<div class="p-left-section">--}}
                        {{--<div class="p-rating-section">--}}
                        {{--<ul class="r-list">--}}
                        {{--<li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-star-o"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-star-o"></i></a></li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--<!-- <div class="p-hour">--}}
                        {{--<h6 class="hour">$30/h</h6>--}}
                        {{--</div>    -->--}}
                        {{--<div class="p-year">--}}
                        {{--<h6 class="year">2+ Years</h6>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="p-right-section">--}}
                        {{--<p class="tags-required">--}}
                        {{--<a href="#" class="required-skills">Design</a>--}}
                        {{--<a href="#" class="required-skills">Graphic</a>--}}
                        {{--<a href="#" class="required-skills">UI</a>--}}
                        {{--<a href="#" class="required-skills">UX</a>--}}
                        {{--<a href="#" class="required-skills">Developer</a>--}}
                        {{--<a href="#" class="required-skills">Branding</a>--}}
                        {{--</p>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<div class="profile-box">--}}
                        {{--<div class="profile-upper-box">--}}
                        {{--<div class="profile-image">--}}
                        {{--<img src="images/person-2.jpg" class="rounded-circle" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="p-name-section">--}}
                        {{--<h1 class="details-freelance-name"><a href="#"> Salman Tariq</a></h1>--}}
                        {{--<h6 class="details-freelance-desig">Senior Graphic - Web Designer</h6>--}}
                        {{--</div>--}}
                        {{--<a href="#" class="btn-sm viev-all">View Profile</a>--}}
                        {{--</div>--}}
                        {{--<div class="profile-lower-box">--}}
                        {{--<div class="p-left-section">--}}
                        {{--<div class="p-rating-section">--}}
                        {{--<ul class="r-list">--}}
                        {{--<li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-star-o"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-star-o"></i></a></li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--<!-- <div class="p-hour">--}}
                        {{--<h6 class="hour">$30/h</h6>--}}
                        {{--</div>    -->--}}
                        {{--<div class="p-year">--}}
                        {{--<h6 class="year">2+ Years</h6>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="p-right-section">--}}
                        {{--<p class="tags-required">--}}
                        {{--<a href="#" class="required-skills">Design</a>--}}
                        {{--<a href="#" class="required-skills">Graphic</a>--}}
                        {{--<a href="#" class="required-skills">UI</a>--}}
                        {{--<a href="#" class="required-skills">UX</a>--}}
                        {{--<a href="#" class="required-skills">Developer</a>--}}
                        {{--<a href="#" class="required-skills">Branding</a>--}}
                        {{--</p>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<div class="profile-box">--}}
                        {{--<div class="profile-upper-box">--}}
                        {{--<div class="profile-image">--}}
                        {{--<img src="images/person-2.jpg" class="rounded-circle" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="p-name-section">--}}
                        {{--<h1 class="details-freelance-name"><a href="#"> Salman Tariq</a></h1>--}}
                        {{--<h6 class="details-freelance-desig">Senior Graphic - Web Designer</h6>--}}
                        {{--</div>--}}
                        {{--<a href="#" class="btn-sm viev-all">View Profile</a>--}}
                        {{--</div>--}}
                        {{--<div class="profile-lower-box">--}}
                        {{--<div class="p-left-section">--}}
                        {{--<div class="p-rating-section">--}}
                        {{--<ul class="r-list">--}}
                        {{--<li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-star-o"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-star-o"></i></a></li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--<!-- <div class="p-hour">--}}
                        {{--<h6 class="hour">$30/h</h6>--}}
                        {{--</div>    -->--}}
                        {{--<div class="p-year">--}}
                        {{--<h6 class="year">2+ Years</h6>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="p-right-section">--}}
                        {{--<p class="tags-required">--}}
                        {{--<a href="#" class="required-skills">Design</a>--}}
                        {{--<a href="#" class="required-skills">Graphic</a>--}}
                        {{--<a href="#" class="required-skills">UI</a>--}}
                        {{--<a href="#" class="required-skills">UX</a>--}}
                        {{--<a href="#" class="required-skills">Developer</a>--}}
                        {{--<a href="#" class="required-skills">Branding</a>--}}
                        {{--</p>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection