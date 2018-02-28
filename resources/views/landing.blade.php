@extends('layouts.master')

@section('content')

    <!-- main Header -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 main-image">
                <img src="{{ asset('images/Picture.jpg') }}" alt="" class="img-fluid">
                <div class="img-banner"></div>
                <div class="container-fluid login-row">
                    <div class="row">
                        <div class="col-xl-12 text-right animated fadeIn">
                            <a href="/jobs" class="btn btn-signin">Browse Jobs</a>

                            <a href="/profiles" class="btn btn-signin">Browse Photographers</a>

                            <a href="/login"
                               class="btn btn-signin" @click="openLoginPage">Sign In
                            </a>
                            <a href="/register"
                               class="btn btn-join" @click="openRegistrationPage">Join
                            </a>

                        </div>
                    </div>
                </div>

                <div class="container search-bar">
                    <div class="row">
                        <div class="col-lg-3 col-xl-3 col-md-2"></div>
                        <div class="col-lg-6 col-xl-6 col-md-8 col-sm-12">
                            <h1 class="text-center do-heading1 animated zoomIn">Don't Just Dream, Do</h1>
                            <h6 class="text-center do-heading2 animated slideInLeft">Hire Talented and Professional
                                Photographers</h6>
                            <form action="{{ route('jobs') }}" method="GET" autocomplete="off">

                                
                                    <!-- <input name="location" type="text" class="form-control"
                                           placeholder="Search by Location ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary btn-search" type="submit">Search</button> -->
                                          <div class="form-group row">
                                            <select class="form-control col-10  " name="location">
                                              <option>Faisalabad</option>
                                              <option>Islamabad</option>
                                              <option>Karachi</option>
                                              <option>Lahore</option>
                                              <option>Multan</option>
                                              <option>Peshawar</option>
                                              <option>Quetta</option>
                                              <option>Hyderabad</option>


                                         </select>
                                         <button class="btn btn-secondary btn-search" type="submit">Search</button>
                                        </div>
                                      
                        <!-- <placesearch v-bind:landing=true></placesearch> -->

                                   <!--  </span> -->
                                </div>
                            </form>

                        </div>
                        <div class="col-lg-3 col-xl-3 col-md-2"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- iconbar  -->
    <div class="container-fluid">
        <div class="container">
            <div class="row icon-padding">
                <div class="col-xl-12 col-lg-12 col-md-12-col-sm-12">
                    <h1 class="text-center market-place-heading">Explore The Marketplace</h1>
                    <h6 class="text-center market-place-heading">Get inspired to build your own bussiness</h6>


                    <div class="row text-center icon-padding">

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                            <a href="#" class="svg-icon">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60"
                                     style="enable-background:new 0 0 60 60;" xml:space="preserve"><g>
                                        <path d="M30,20.5c-6.617,0-12,5.383-12,12s5.383,12,12,12s12-5.383,12-12S36.617,20.5,30,20.5z"/>
                                        <path d="M55.201,15.5h-8.524l-4-10H17.323l-4,10H12v-5H6v5H4.799C2.152,15.5,0,17.652,0,20.299v29.368C0,52.332,2.168,54.5,4.833,54.5h50.334c2.665,0,4.833-2.168,4.833-4.833V20.299C60,17.652,57.848,15.5,55.201,15.5z M10,15.5H8v-3h2V15.5z M30,50.5c-9.925,0-18-8.075-18-18s8.075-18,18-18s18,8.075,18,18S39.925,50.5,30,50.5z M52,27.5c-2.206,0-4-1.794-4-4s1.794-4,4-4s4,1.794,4,4S54.206,27.5,52,27.5z"/>
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
                                    <g></g></svg>
                            </a>
                            <a href="#" class="svg-text"><h5 class="market-place-heading">PhotoGraphy</h5></a>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                            <a href="#" class="svg-icon">
                                <svg version="1.1" id="Capa_1" class="video" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 485.211 485.211" style="enable-background:new 0 0 485.211 485.211;"
                                     xml:space="preserve"><g>
                                        <path d="M460.955,176.401c13.33-10.011,24.256-4.532,24.256,12.139v272.935c0,16.671-10.926,22.15-24.256,12.14l-72.792-54.609c-13.324-10.007-24.255-31.839-24.255-48.51v-90.976c0-16.676,10.931-38.501,24.255-48.512L460.955,176.401z M60.651,36.914C27.158,36.914,0,64.07,0,97.565c0,33.493,27.158,60.653,60.651,60.653c33.498,0,60.653-27.16,60.653-60.653C121.304,64.07,94.149,36.914,60.651,36.914z M242.606,6.587c-41.875,0-75.812,33.939-75.812,75.814s33.937,75.817,75.812,75.817c41.873,0,75.816-33.941,75.816-75.817S284.479,6.587,242.606,6.587z M121.304,249.194h212.282v181.955c0,16.764-13.566,30.326-30.331,30.326H30.327C13.562,461.476,0,447.913,0,431.149V218.867c0-16.764,13.564-30.327,30.327-30.327h272.928c16.765,0,30.331,13.567,30.331,30.327H121.304V249.194z M121.304,370.496c0-16.76-13.565-30.322-30.327-30.322s-30.327,13.562-30.327,30.322c0,16.764,13.565,30.322,30.327,30.322S121.304,387.26,121.304,370.496z"/>
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
                                    <g></g></svg>
                            </a>
                            <a href="#" class="svg-text"><h5 class="market-place-heading">Videography</h5></a>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                            <a href="#" class="svg-icon">
                                <svg version="1.1" id="Capa_1" class="editing" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 612 612"
                                     style="enable-background:new 0 0 612 612;" xml:space="preserve"><g>
                                        <g id="_x33__13_">
                                            <g>
                                                <path d="M573.75,267.75L459,344.25c0-23.218-10.557-43.758-26.89-57.796c38.881-23.428,65.14-65.637,65.14-114.329c0-73.938-59.938-133.875-133.875-133.875c-73.937,0-133.875,59.938-133.875,133.875c0,37.504,15.51,71.317,40.373,95.625h-70.151c18.322-20.33,29.778-46.971,29.778-76.5c0-63.38-51.37-114.75-114.75-114.75S0,127.87,0,191.25c0,34.578,15.625,65.216,39.818,86.254C16.199,290.528,0,315.371,0,344.25v153c0,42.247,34.253,76.5,76.5,76.5h306c42.247,0,76.5-34.253,76.5-76.5l114.75,76.5c21.133,0,38.25-17.117,38.25-38.25V306C612,284.867,594.883,267.75,573.75,267.75z M114.75,267.75c-42.247,0-76.5-34.253-76.5-76.5s34.253-76.5,76.5-76.5s76.5,34.253,76.5,76.5S156.997,267.75,114.75,267.75z M363.375,267.96c-52.938,0-95.835-42.917-95.835-95.835c0-52.938,42.917-95.835,95.835-95.835s95.835,42.897,95.835,95.835S416.312,267.96,363.375,267.96z"/>
                                            </g>
                                        </g>
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
                                    <g></g></svg>
                            </a>
                            <a href="#" class="svg-text"><h5 class="market-place-heading">VideoEditing</h5></a>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                            <a href="#" class="svg-icon">
                                <svg version="1.1" id="Capa_1" class="designing" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 561 561"
                                     style="enable-background:new 0 0 561 561;" xml:space="preserve"><g>
                                        <g id="photo-library">
                                            <path d="M561,408V51c0-28.05-22.95-51-51-51H153c-28.05,0-51,22.95-51,51v357c0,28.05,22.95,51,51,51h357C538.05,459,561,436.05,561,408z M242.25,267.75l63.75,76.5l89.25-114.75L510,382.5H153L242.25,267.75z M0,102v408c0,28.05,22.95,51,51,51h408v-51H51V102H0z"/>
                                        </g>
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
                                    <g></g></svg>
                            </a>
                            <a href="#" class="svg-text"><h5 class="market-place-heading">Album Designing</h5></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- photo pro -->
    <div class="container-fluid pro-bg-color">
        <div class="container">
            <div class="row icon-padding">
                <div class="col-xl-1 col-lg-1"></div>
                <div class="col-xl-7 col-lg-7 col-md-8 col-sm-8 allign-middle">
                    <h1>Introducing PHOTOLINGA PRO</h1>
                    <h3>Hand-vetted. High-end. on-demand.</h3>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4">
                    <a href="/pro"><img src="{{ asset('images/Pro.png') }}" alt="" class="img-fluid"></a>
                </div>
            </div>
        </div>
    </div>

    <!-- how-it-works -->
    <div class="container-fluid how-bg-color">
        <div class="container">
            <div class="row icon-padding">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h1 class="text-center market-place-heading">How it works</h1>

                    <div class="row text-center icon-padding">

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                            <a href="#"><img style="width:70%" src="{{ asset('images/search.png') }}" alt="" class="img-fluid rubberband"></a>
                            <h3 class="market-place-heading hiw-icon-text">SEARCH</h3>
                            <p class="lead text-muted">Search photographer as per your requirements and budget</p>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                            <a href="#"><img style="width:70%" src="{{ asset('images/hire.png') }}" alt=""
                                             class="img-fluid flipouty"></a>
                            <h3 class="market-place-heading hiw-icon-text">HIRE</h3>
                            <p class="lead text-muted">Check profile/ratings, reviews and hire your favorite</p>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                            <a href="#"><img style="width:70%" src="{{ asset('images/click.png') }}" alt=""
                                             class="img-fluid slidinright"></a>
                            <h3 class="market-place-heading hiw-icon-text">CLICK</h3>
                            <p class="lead text-muted">Photographer/Videographer will cover your event or project</p>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                            <a href="#"><img style="width:70%" src="{{ asset('images/done.png') }}" alt=""
                                             class="img-fluid zoomoutup"></a>
                            <h3 class="market-place-heading hiw-icon-text">DONE</h3>
                            <p class="lead text-muted">Pay through 100% Secure and Easy payment options</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- timeline -->
    <div class="container-fluid pro-bg-color">
        <div class="container">
            <div class="row icon-padding text-center">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 right-border">
                    <h4>Your <strong>Terms</strong></h4>
                    <p>Whatever you need to simplify your to-do list, no matter your budget.</p>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 right-border">
                    <h4>Your <strong>Timeline</strong></h4>
                    <p>Find service based on your goals and deadlines, it's that simple.</p>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <h4>Your <strong>Safety</strong></h4>
                    <p>Your payment is always secure, Photolinga is built to protect your peace of mind.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- people saying -->
    {{--<div class="container-fluid how-bg-color">--}}
    {{--<div class="container">--}}
    {{--<div class="row icon-padding">--}}
    {{--<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">--}}
    {{--<h1 class="text-center market-place-heading">What people are saying</h1>--}}
    {{--<h6 class="text-center market-place-heading">Companies and individuals loves using Photolinga to--}}
    {{--work--}}
    {{--their way.</h6>--}}

    {{--<ul class="remove-list-style">--}}
    {{--<li>--}}
    {{--<div class="row">--}}

    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">--}}
    {{--<div class="row">--}}
    {{--<div class="col-xl-2 col-lg-2 col-md-4 col-sm-2 col-4">--}}
    {{--<img src="{{ asset('./images/Image -1.png') }}" alt="" class="img-fluid">--}}
    {{--</div>--}}

    {{--<div class="col-xl-10 col-lg-10 col-md-8 col-sm-10 col-8">--}}
    {{--<p class="desc">Guru is an amazing service thati highly recommend to--}}
    {{--bussiness--}}
    {{--of all sizes looking to find short or long-term, high quality--}}
    {{--resources.</p>--}}
    {{--<h6 class="author-name">Bev Flaxington</h6>--}}
    {{--<footer class="blockquote-footer">PRINCIPAL OF THE<cite--}}
    {{--title="Source Title">COLLABORATIVE</cite>--}}
    {{--</footer>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">--}}
    {{--<div class="row">--}}
    {{--<div class="col-xl-2 col-lg-2 col-md-4 col-sm-2 col-4">--}}
    {{--<img src="{{ asset('./images/Image -1.png') }}" alt="" class="img-fluid">--}}
    {{--</div>--}}

    {{--<div class="col-xl-10 col-lg-10 col-md-8 col-sm-10 col-8">--}}
    {{--<p class="desc">Guru is an amazing service thati highly recommend to--}}
    {{--bussiness--}}
    {{--of all sizes looking to find short or long-term, high quality--}}
    {{--resources.</p>--}}
    {{--<h6 class="author-name">Bev Flaxington</h6>--}}
    {{--<footer class="blockquote-footer">PRINCIPAL OF THE<cite--}}
    {{--title="Source Title">COLLABORATIVE</cite>--}}
    {{--</footer>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</li>--}}

    {{--<li>--}}
    {{--<div class="row">--}}

    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">--}}
    {{--<div class="row">--}}
    {{--<div class="col-xl-2 col-lg-2 col-md-4 col-sm-2 col-4">--}}
    {{--<img src="{{ asset('./images/Image -1.png') }}" alt="" class="img-fluid">--}}
    {{--</div>--}}

    {{--<div class="col-xl-10 col-lg-10 col-md-8 col-sm-10 col-8">--}}
    {{--<p class="desc">Guru is an amazing service thati highly recommend to--}}
    {{--bussiness--}}
    {{--of all sizes looking to find short or long-term, high quality--}}
    {{--resources.</p>--}}
    {{--<h6 class="author-name">Bev Flaxington</h6>--}}
    {{--<footer class="blockquote-footer">PRINCIPAL OF THE<cite--}}
    {{--title="Source Title">COLLABORATIVE</cite>--}}
    {{--</footer>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">--}}
    {{--<div class="row">--}}
    {{--<div class="col-xl-2 col-lg-2 col-md-4 col-sm-2 col-4">--}}
    {{--<img src="{{ asset('./images/Image -1.png') }}" alt="" class="img-fluid">--}}
    {{--</div>--}}

    {{--<div class="col-xl-10 col-lg-10 col-md-8 col-sm-10 col-8">--}}
    {{--<p class="desc">Guru is an amazing service thati highly recommend to--}}
    {{--bussiness--}}
    {{--of all sizes looking to find short or long-term, high quality--}}
    {{--resources.</p>--}}
    {{--<h6 class="author-name">Bev Flaxington</h6>--}}
    {{--<footer class="blockquote-footer">PRINCIPAL OF THE<cite--}}
    {{--title="Source Title">COLLABORATIVE</cite>--}}
    {{--</footer>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</li>--}}

    {{--</ul>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

@endsection