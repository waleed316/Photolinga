@extends('layouts.master')

@section('content')

    <div class="container-fluid post-bg-color">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">

                    <div class="form">
                        <h2 class="heading-font"><span class="badge badge-default badge-no">1</span> What do you need
                            done?</h2>

                        <label class="label-name" for="name-of-project">What's the name of the project? <a href="#"
                                                                                                           data-toggle="tooltip"
                                                                                                           data-placement="top"
                                                                                                           title="help"><span
                                        class="badge badge-default second-badge">?</span></a></label>
                        <input class="form-control" type="text" id="example-text-input">

                        <h2 class="heading-font"><span class="badge badge-default badge-no">2</span> Tell us more about
                            your project</h2>

                        <label class="label-name" for="skill">What skill are required? <a href="#" data-toggle="tooltip"
                                                                                          data-placement="top"
                                                                                          title="help"><span
                                        class="badge badge-default second-badge">?</span></a></label>
                        <input class="form-control" type="text" placeholder="Required skills" id="example-text-input">

                        <label class="label-name label-margin" for="description">Describe your project <a href="#"
                                                                                                          data-toggle="tooltip"
                                                                                                          data-placement="top"
                                                                                                          title="help"><span
                                        class="badge badge-default second-badge">?</span></a></label>
                        <textarea class="form-control" id="exampleTextarea" placeholder="Describe your Project here ..."
                                  rows="5"></textarea>

                        <h2 class="heading-font"><span class="badge badge-default badge-no">3</span> What budget do you
                            have in mind?</h2>

                        <label class="label-name" for="budget">Budget limits <a href="#" data-toggle="tooltip"
                                                                                data-placement="top" title="help"><span
                                        class="badge badge-default second-badge">?</span></a></label>
                        <select class="form-control" id="exampleSelect1">
                            <option>Very small project (5000 - 10000 PKR)</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>

                        <div class="form-group btn-padding">
                            <button type="button" class="btn btn-post">Post Project Now</button>
                            <button class="btn-text">By clicking 'Post Project now', you are indicating that you have
                                read and agree to the <a href="#">terms & Conditions</a> and <a href="#">privacy
                                    Policy</a></button>
                        </div>

                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 hidden-on-mobile">
                    <div class="card side-panel-margin">
                        <div class="card-header side-panel">
                            <div class="card-title"><h5 class="text-center side-heading">It's Free to Post a
                                    Project</h5></div>
                        </div>
                        <div class="card-body card-padding">
                            <h5 class="side-body-heading">Try it Today!</h5>

                            <ul class="side-list">
                                <li>
                                    <div class="row">
                                        <div class="col-xl-1 col-lg-1 col-md-2">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_2"
                                                 x="0px" y="0px" viewBox="0 0 488.878 488.878"
                                                 style="enable-background:new 0 0 488.878 488.878;"
                                                 xml:space="preserve"><g>
                                                    <g>
                                                        <polygon
                                                                points="143.294,340.058 50.837,247.602 0,298.439 122.009,420.447 122.149,420.306 144.423,442.58 488.878,98.123 437.055,46.298 "
                                                                fill="#2c004f"/>
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
                                        </div>
                                        <div class="col-xl-10 col-lg-10 col-md-10">
                                            <h6 class="list-heading">Get bids from skilled photographers within
                                                minutes</h6>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row">
                                        <div class="col-xl-1 col-lg-1 col-md-2">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_2"
                                                 x="0px" y="0px" viewBox="0 0 488.878 488.878"
                                                 style="enable-background:new 0 0 488.878 488.878;"
                                                 xml:space="preserve"><g>
                                                    <g>
                                                        <polygon
                                                                points="143.294,340.058 50.837,247.602 0,298.439 122.009,420.447 122.149,420.306 144.423,442.58 488.878,98.123 437.055,46.298 "
                                                                fill="#2c004f"/>
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
                                        </div>
                                        <div class="col-xl-10 col-lg-10 col-md-10">
                                            <h6 class="list-heading">View photographer profiles and ratings, then
                                                instanly chat with them</h6>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row">
                                        <div class="col-xl-1 col-lg-1 col-md-2">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_2"
                                                 x="0px" y="0px" viewBox="0 0 488.878 488.878"
                                                 style="enable-background:new 0 0 488.878 488.878;"
                                                 xml:space="preserve"><g>
                                                    <g>
                                                        <polygon
                                                                points="143.294,340.058 50.837,247.602 0,298.439 122.009,420.447 122.149,420.306 144.423,442.58 488.878,98.123 437.055,46.298 "
                                                                fill="#2c004f"/>
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
                                        </div>
                                        <div class="col-xl-10 col-lg-10 col-md-10">
                                            <h6 class="list-heading">With only a 5%* commission fee, your favorite
                                                photographer can start working for you today</h6>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row">
                                        <div class="col-xl-1 col-lg-1 col-md-2">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_2"
                                                 x="0px" y="0px" viewBox="0 0 488.878 488.878"
                                                 style="enable-background:new 0 0 488.878 488.878;"
                                                 xml:space="preserve"><g>
                                                    <g>
                                                        <polygon
                                                                points="143.294,340.058 50.837,247.602 0,298.439 122.009,420.447 122.149,420.306 144.423,442.58 488.878,98.123 437.055,46.298 "
                                                                fill="#2c004f"/>
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
                                        </div>
                                        <div class="col-xl-10 col-lg-10 col-md-10">
                                            <h6 class="list-heading">Pay the photographer once when you're 100%
                                                satisfied</h6>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row">
                                        <div class="col-xl-1 col-lg-1 col-md-2">
                                            <!-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_2" x="0px" y="0px" viewBox="0 0 488.878 488.878" style="enable-background:new 0 0 488.878 488.878;" xml:space="preserve"><g><g><polygon points="143.294,340.058 50.837,247.602 0,298.439 122.009,420.447 122.149,420.306 144.423,442.58 488.878,98.123 437.055,46.298 " fill="#2c004f"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg> -->
                                        </div>
                                        <div class="col-xl-10 col-lg-10 col-md-10">
                                            <h6 class="list-heading">* minimum fees apply</h6>
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

@endsection