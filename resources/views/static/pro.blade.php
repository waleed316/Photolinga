@extends('layouts.master')

@section('content')

    <!-- navigation bar -->
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-faded navbar-bg-color fixed-top">

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon navbar-text-color"></span>
        </button>
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/logoblack.png') }}" alt="Photolinga"
                 class="d-inline-block align-top img-fluid  navbar-logo">
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 margin">
                <ul class="navbar-nav mr-auto justify-content-end nav-li-margin">
                    <li class="nav-item">
                        <a href="#" class="phone-number">+92 333 2057555</a>
                    </li>
                    <li class="nav-item">
                        <button class="btn let-talk-btn" data-toggle="modal" data-target="#myModal"
                                style="margin-top:0!important">Let's Talk
                        </button>
                    </li>
                {{--<li class="nav-item">--}}
                {{--<button class="btn become-pro-btn" style="margin-top:0!important">Become a Pro</button>                        --}}
                {{--</li>--}}
            </div>
        </div>
    </nav>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Your Name</label>
                            <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                   placeholder="John Doe">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="john@example.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone Number</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="john@example.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Event Details</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp"
                                   placeholder="Cover an event at this location on this date">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Budget</label>
                            <input type="number" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="I'm willing to spend this much rupees">
                        </div>
                        <div class="form-group">
                            <button class="btn let-talk-btn" type="submit" style="float: right;">
                                Get Started
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- main section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 main-image">
                <img src="{{ asset('images/pro.jpg') }}" alt="" class="img-fluid">
                <div class="img-banner"></div>

                <div class="container search-bar">
                    <div class="row">
                        <!-- <div class="col-lg-3 col-xl-3 col-md-2"></div> -->
                        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 text-center">
                            <h2 class="text-center do-heading1 pro-heading">Dedicated Photographers</h2>
                            <h2 class="text-center do-heading1 pro-heading">Selected for you</h2>
                            <h5 class="text-center do-heading2 pro-heading1">Let us help you pick the right fit for your event</h5>
                            <button class="btn let-talk-btn" data-toggle="modal" data-target="#myModal"
                                    style="margin-top:0!important">Let's Talk
                            </button>
                        </div>
                        <!-- <div class="col-lg-3 col-xl-3 col-md-2"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why-Photolinga section -->
    <div class="container-fluid jobs-top-margin">
        <div class="container">
            <div class="row">
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12"></div>
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 text-center">
                    <h1 class="why-photolinga">Why choose Photolinga Pro</h1>
                    <p class="lead why-para">With Photolinga Pro, you will be able to get excellent professional photographers, videographers, video editors or album designers in your town. Photolinga Pro is about getting things done perfectly, professionally.</p>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12"></div>
            </div>

            <div class="row text-center jobs-top-margin">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                    <div class="pro-icon-padding">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                             style="enable-background:new 0 0 512 512;" xml:space="preserve"><g>
                                <g>
                                    <path d="M426.197,431.303c-4.141,0-7.498,3.357-7.498,7.498v27.287H93.302V354.634c0-4.141-3.357-7.498-7.498-7.498s-7.498,3.357-7.498,7.498v118.952v20.917c0,9.647,7.849,17.496,17.496,17.496h320.398c9.647,0,17.496-7.849,17.496-17.496v-20.917v-34.785C433.695,434.66,430.338,431.303,426.197,431.303z M418.698,494.504c0,1.378-1.122,2.499-2.499,2.499H95.801c-1.378,0-2.499-1.122-2.499-2.499v-13.419h325.397V494.504z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M414.412,267.333h-28.588c-18.791-36.502-53.671-63.87-93.306-74.857c21.776-12.643,36.462-36.204,36.462-63.146v-28.183V72.981c0-15.091-4.604-29.127-12.481-40.776C303.372,12.789,281.151,0,256,0c-40.242,0-72.981,32.74-72.981,72.981v28.175v28.175c0,26.942,14.686,50.504,36.462,63.146c-39.634,10.987-74.515,38.354-93.306,74.857H97.587c-10.632,0-19.282,8.65-19.282,19.282v43.025c0,4.141,3.357,7.498,7.498,7.498c4.141,0,7.498-3.357,7.498-7.498v-43.025c0-2.362,1.923-4.285,4.285-4.285h316.826c2.363,0,4.286,1.923,4.286,4.285v127.191c0,4.141,3.357,7.498,7.498,7.498c4.141,0,7.498-3.357,7.498-7.498V286.615C433.695,275.984,425.045,267.333,414.412,267.333z M256.001,14.997c31.972,0,57.984,26.012,57.984,57.984v20.031c-27.014-4.549-37.89-31.916-38.37-33.16c-1.04-2.745-3.586-4.63-6.516-4.825c-2.929-0.2-5.702,1.338-7.095,3.921c-0.178,0.33-17.48,31.394-63.988,34.464V72.981h-0.001C198.016,41.008,224.028,14.997,256.001,14.997z M198.016,129.331v-20.889c37.408-2.133,59.088-19.955,69.496-31.813c7.339,11.709,21.961,28.538,46.473,31.544v21.158c0,31.269-24.884,56.822-55.886,57.931c-0.665-0.019-1.331-0.049-1.996-0.059L256,187.202l-0.103,0.001c-0.665,0.009-1.331,0.04-1.996,0.059C222.899,186.152,198.016,160.6,198.016,129.331z M224.78,267.333h-81.467c16.737-28.019,44.289-49.218,75.547-59.065l13.49,26.208L224.78,267.333z M240.169,267.333l6.07-26.349h19.522l6.07,26.349H240.169z M267.155,225.988h-22.309l-11.06-21.486c3.102-0.595,6.227-1.089,9.371-1.456c0.043-0.005,0.086-0.01,0.129-0.015c2.673-0.309,5.36-0.53,8.055-0.669c0.271-0.014,0.542-0.027,0.813-0.039c0.63-0.028,1.261-0.041,1.892-0.06c0.652,0.017,1.299,0.049,1.955,0.049c0.656,0,1.304-0.032,1.955-0.049c0.631,0.019,1.262,0.031,1.892,0.06c0.271,0.012,0.542,0.025,0.813,0.039c2.694,0.139,5.381,0.36,8.054,0.669c0.044,0.005,0.088,0.01,0.132,0.015c3.143,0.367,6.267,0.861,9.369,1.456L267.155,225.988z M287.22,267.333l-7.569-32.856l13.49-26.209c31.256,9.847,58.809,31.047,75.547,59.065H287.22z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M256,346.502c-17.111,0-31.032,13.921-31.032,31.032s13.921,31.032,31.032,31.032s31.032-13.921,31.032-31.032S273.111,346.502,256,346.502z M256,393.57c-8.842,0-16.035-7.194-16.035-16.036c0-8.842,7.193-16.036,16.035-16.036s16.036,7.193,16.036,16.036S264.842,393.57,256,393.57z"/>
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
                        <h4>PRO EXPERTISE</h4>
                        <p>Access to best performing professionals as per your requirements and needs</p>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                    <div class="pro-icon-padding">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                             style="enable-background:new 0 0 512 512;" xml:space="preserve"><g>
                                <g>
                                    <g>
                                        <path d="M459.099,213.332c6.735-11.011,9.273-24.113,6.992-37.046c-2.279-12.932-9.146-24.377-19.242-32.42c2.564-12.65,0.468-25.83-6.098-37.2c-6.564-11.372-16.929-19.778-29.169-23.884c-1.917-12.766-8.396-24.435-18.455-32.875c-9.928-8.328-22.596-12.777-35.574-12.461c-6.169-11.342-16.25-20.092-28.588-24.582c-5.886-2.143-12.021-3.229-18.238-3.229c-6.669,0-13.271,1.261-19.456,3.685C281.598,4.776,269.134,0,256,0c-13.135,0-25.599,4.776-35.274,13.322c-6.186-2.425-12.786-3.685-19.455-3.685c-6.217,0-12.353,1.087-18.235,3.228c-12.339,4.49-22.42,13.24-28.588,24.582c-12.965-0.331-25.65,4.132-35.577,12.462c-10.059,8.44-16.536,20.109-18.453,32.874c-12.237,4.107-22.604,12.512-29.172,23.886c-6.563,11.372-8.66,24.551-6.098,37.199c-10.095,8.043-16.96,19.487-19.24,32.42c-2.282,12.932,0.256,26.036,6.992,37.046c-6.736,11.009-9.273,24.112-6.993,37.044c2.281,12.932,9.146,24.377,19.241,32.42c-2.562,12.649-0.466,25.83,6.099,37.204c6.565,11.372,16.932,19.778,29.169,23.883c1.919,12.762,8.397,24.429,18.456,32.872c9.928,8.329,22.624,12.776,35.577,12.462c6.167,11.34,16.247,20.092,28.587,24.584c5.885,2.142,12.019,3.227,18.235,3.227c6.669,0,13.271-1.261,19.457-3.685c9.674,8.546,22.139,13.322,35.271,13.324c0,0,0.002,0,0.004,0c13.132-0.002,25.594-4.778,35.268-13.324c6.188,2.425,12.789,3.685,19.458,3.685c6.217,0,12.35-1.086,18.236-3.227c12.339-4.492,22.419-13.243,28.588-24.584c12.948,0.325,25.648-4.132,35.576-12.463c10.059-8.441,16.536-20.109,18.455-32.871c12.238-4.105,22.604-12.511,29.171-23.884c6.562-11.373,8.658-24.553,6.096-37.203c10.096-8.044,16.962-19.488,19.244-32.42C468.371,237.444,465.834,224.34,459.099,213.332z M445.081,246.671c-1.668,9.467-7.438,17.607-15.827,22.334c-4.581,2.582-6.597,8.12-4.748,13.045c3.388,9.012,2.573,18.957-2.232,27.281c-4.806,8.325-13.01,14.002-22.509,15.574c-5.189,0.86-8.979,5.374-8.923,10.635c0.1,9.626-4.067,18.691-11.429,24.871c-5.755,4.827-13.05,7.486-20.546,7.486c-1.985,0-3.981-0.185-5.932-0.55c-5.171-0.971-10.275,1.978-12.023,6.941c-3.2,9.082-10.215,16.176-19.246,19.464c-8.981,3.267-19.075,2.297-27.257-2.539c-4.531-2.68-10.332-1.654-13.671,2.411c-6.11,7.438-15.128,11.706-24.739,11.708c-9.614-0.002-18.633-4.27-24.746-11.71c-2.09-2.542-5.143-3.893-8.246-3.893c-1.855,0-3.728,0.483-5.423,1.485c-8.179,4.835-18.279,5.804-27.253,2.54c-9.032-3.289-16.046-10.383-19.246-19.465c-1.748-4.96-6.854-7.904-12.021-6.942c-1.952,0.367-3.949,0.551-5.935,0.551c-7.495,0-14.791-2.659-20.544-7.485c-7.363-6.18-11.531-15.247-11.43-24.872c0.055-5.261-3.733-9.775-8.923-10.635c-9.499-1.572-17.704-7.249-22.509-15.572c-4.805-8.328-5.62-18.271-2.234-27.284c1.85-4.925-0.165-10.463-4.749-13.045c-8.387-4.726-14.155-12.867-15.824-22.334c-1.668-9.466,0.966-19.087,7.232-26.396c3.424-3.995,3.424-9.889,0-13.884c-6.266-7.31-8.901-16.932-7.232-26.399c1.669-9.467,7.438-17.607,15.824-22.334c4.584-2.582,6.6-8.121,4.749-13.044c-3.387-9.012-2.573-18.956,2.233-27.279c4.807-8.325,13.012-14.002,22.511-15.576c5.189-0.86,8.978-5.374,8.923-10.635c-0.1-9.63,4.066-18.696,11.427-24.873c5.755-4.828,13.05-7.487,20.543-7.487c1.985,0,3.982,0.186,5.934,0.551c5.179,0.967,10.277-1.978,12.024-6.941c3.2-9.083,10.213-16.176,19.247-19.463c8.973-3.269,19.071-2.3,27.251,2.538c4.529,2.678,10.332,1.652,13.671-2.411C237.367,25.6,246.386,21.334,256,21.334c9.613,0,18.63,4.267,24.739,11.705c3.338,4.065,9.139,5.088,13.671,2.412c8.179-4.836,18.273-5.808,27.257-2.537c9.034,3.286,16.048,10.379,19.248,19.462c1.748,4.962,6.852,7.912,12.024,6.941c1.95-0.365,3.946-0.55,5.931-0.55c7.493,0,14.789,2.658,20.544,7.486c7.362,6.178,11.53,15.244,11.43,24.873c-0.057,5.261,3.733,9.775,8.923,10.635c9.498,1.573,17.705,7.249,22.509,15.575c4.806,8.323,5.619,18.267,2.234,27.279c-1.852,4.925,0.164,10.463,4.748,13.045c8.387,4.726,14.156,12.867,15.825,22.333c1.668,9.468-0.966,19.089-7.233,26.401c-3.423,3.994-3.421,9.888,0.002,13.882C444.115,227.583,446.751,237.205,445.081,246.671z"/>
                                        <path d="M299.126,81.543c5.596,1.831,11.622-1.222,13.454-6.821c1.832-5.599-1.222-11.623-6.821-13.455c-26.663-8.722-55.259-10.282-82.7-4.509c-70.738,14.882-122.89,75.687-126.826,147.869c-0.321,5.883,4.189,10.911,10.071,11.232c0.198,0.011,0.394,0.016,0.59,0.016c5.625,0,10.332-4.402,10.642-10.086c3.41-62.557,48.608-115.257,109.916-128.154C251.236,72.632,276.017,73.983,299.126,81.543z"/>
                                        <path d="M405.693,210.803c-5.89-0.317-10.911,4.188-11.231,10.07c-3.41,62.556-48.609,115.255-109.916,128.153c-23.786,5.004-48.569,3.654-71.672-3.907c-5.596-1.833-11.622,1.221-13.455,6.82c-1.833,5.599,1.221,11.624,6.82,13.455c16.114,5.274,32.938,7.931,49.787,7.931c11.023,0,22.059-1.137,32.913-3.422c70.74-14.881,122.891-75.687,126.826-147.868C416.085,216.153,411.575,211.124,405.693,210.803z"/>
                                        <path d="M119.899,239.891c-1.132-5.781-6.729-9.555-12.515-8.421c-5.781,1.13-9.552,6.734-8.422,12.515c0.578,2.955,1.255,5.961,2.014,8.937c1.23,4.825,5.568,8.035,10.33,8.035c0.871,0,1.758-0.108,2.642-0.333c5.709-1.455,9.156-7.262,7.702-12.971C120.987,245.063,120.4,242.452,119.899,239.891z"/>
                                        <path d="M392.099,186.771c0.994,5.091,5.456,8.624,10.457,8.624c0.679,0,1.366-0.065,2.059-0.201c5.781-1.13,9.552-6.733,8.424-12.514c-0.581-2.972-1.261-5.981-2.017-8.945c-1.458-5.707-7.263-9.151-12.977-7.693c-5.707,1.459-9.152,7.268-7.692,12.976C391.008,181.589,391.595,184.197,392.099,186.771z"/>
                                        <path d="M362.666,490.666H149.329c-5.89,0-10.667,4.776-10.667,10.667c0,5.89,4.777,10.667,10.667,10.667h213.337c5.89,0,10.667-4.777,10.667-10.667C373.332,495.442,368.556,490.666,362.666,490.666z"/>
                                        <path d="M199.452,281.979c-0.947,4.161,0.679,8.486,4.131,10.995c1.862,1.354,4.063,2.036,6.271,2.036c1.885,0,3.775-0.498,5.464-1.505l40.683-24.266l40.682,24.266c3.665,2.187,8.28,1.978,11.733-0.531c3.452-2.509,5.079-6.833,4.131-10.995l-10.503-46.194l35.646-31.192c3.213-2.811,4.44-7.265,3.121-11.324c-1.318-4.059-4.929-6.941-9.179-7.327l-47.177-4.284l-18.65-43.541c-1.679-3.923-5.537-6.466-9.804-6.466c-4.269,0-8.125,2.544-9.806,6.466l-18.651,43.541l-47.174,4.284c-4.25,0.386-7.861,3.267-9.18,7.327c-1.318,4.059-0.092,8.512,3.12,11.323l35.647,31.197L199.452,281.979z M207.096,204.937l28.712-2.607c3.903-0.354,7.297-2.82,8.841-6.422l11.353-26.498l11.351,26.498c1.544,3.602,4.938,6.068,8.84,6.422l28.713,2.607l-21.694,18.983c-2.95,2.58-4.245,6.572-3.377,10.393l6.392,28.114l-24.759-14.768c-1.683-1.004-3.576-1.506-5.465-1.506c-1.891,0-3.781,0.502-5.465,1.506l-24.76,14.767l6.393-28.108c0.868-3.822-0.427-7.811-3.376-10.393L207.096,204.937z"/>
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
                        <h4>PRO RESOURCES</h4>
                        <p>Get dedicated customer support throughout your project</p>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                    <div class="pro-icon-padding">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 489.6 489.6"
                             style="enable-background:new 0 0 489.6 489.6;" xml:space="preserve"><g>
                                <g>
                                    <path d="M394.8,261.5V81.7c0-24.9-20.3-45.2-45.2-45.2H45.2C20.3,36.5,0,56.8,0,81.7v179.8c0,24.9,20.3,45.2,45.2,45.2h12.9v54.2c0,10,8.1,18.1,18.2,18.1l0,0c5.2,0,10.2-2.3,13.7-6.3l57.1-66.1h202.6C374.5,306.7,394.8,286.4,394.8,261.5z M141.4,282.2c-3.6,0-6.9,1.5-9.3,4.2l-49.6,57.3v-49.3c0-6.8-5.5-12.3-12.3-12.3h-25c-11.4,0-20.7-9.3-20.7-20.7V81.7c0-11.4,9.3-20.7,20.7-20.7h304.4c11.4,0,20.7,9.3,20.7,20.7v179.8c0,11.4-9.3,20.7-20.7,20.7L141.4,282.2L141.4,282.2z"/>
                                    <path d="M399.7,446.8c3.5,4.1,8.5,6.3,13.6,6.3c2.1,0,4.3-0.4,6.4-1.2c7.2-2.7,11.8-9.3,11.8-17v-54.2h12.9c24.9,0,45.2-20.3,45.2-45.2V155.7c0-24.9-20.3-45.2-45.2-45.2c-6.8,0-12.3,5.5-12.3,12.2c0,6.8,5.5,12.3,12.3,12.3c11.4,0,20.7,9.3,20.7,20.7v179.8c0,11.4-9.3,20.7-20.7,20.7h-25.1c-6.8,0-12.3,5.5-12.3,12.3v49.3l-49.6-57.3c-2.3-2.7-5.7-4.2-9.3-4.2h-184c-6.8,0-12.3,5.5-12.3,12.3s5.5,12.3,12.3,12.3h178.4L399.7,446.8z"/>
                                    <circle cx="197.4" cy="175.9" r="14.6"/>
                                    <circle cx="246.3" cy="175.9" r="14.6"/>
                                    <circle cx="148.5" cy="175.9" r="14.6"/>
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
                        <h4>PRO STANDARD</h4>
                        <p>With Pro services, quality images/videosa are promised</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Photolinga banner -->
    <div class="container-fluid jobs-top-margin">
        <div class="row">
            <div class="col-xl-12 profile-bg">
                <div class="profile-bg-height1">
                    <img src="{{ asset('images/banner.jpg') }}" alt="" class="img-fluid">
                    <div class="profile-banner1"></div>

                    <div class="container profile-name1">
                        <div class="row">
                            <div class="col-xl-12 text-center">
                                <h4 class="text-center do-heading1 pro-heading2">Pro Expertise: Work with a perfect
                                    fit</h4>
                                <h5 class="text-center do-heading2 pro-heading1">We pick the professionals with quality and dedication as well as their experience and aim in moving forward</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- banner-description -->
    <div class="container-fluid jobs-top-margin">
        <div class="container">
            <div class="row double-margin">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <h1 class="pro-service-heading">Pro Resources: Dedicated to your project</h1>
                    <p class="pro-service-desc">We focus on finding experts with the skills you need. You also get dedicated support to help you in getting excellent service throughout till the final payment and final delivery of work</p>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-text-center-left col-12 hidden-on-mobile">
                    {{--  <svg id="pro-service" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 325.9 253.4"><circle fill="#F2F2F2" stroke="#F4F4F4" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="176.1" cy="132.7" r="70.8"/><circle fill="none" stroke="#F2F2F2" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="176.1" cy="132.7" r="70.8"/><path fill="#F2F2F2" stroke="#909090" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M210.1 113.7c0-18.6-15.1-33.7-33.7-33.7s-33.7 15.1-33.7 33.7l6.4 1c-.1-15.2 12.2-27.5 27.4-27.5h.1c15.1 0 27.5 12 27.5 27.1l6-.6z"/><path fill="#D8D8D8" d="M228.9 182.3l-.1-.5c-.1-.4-.8-.7-1.1-.9-.7-.6-17.7-13.6-35.7-14.3V156c9-5.4 13-14.6 13-24.6V115c0-16.1-12-26.7-28.1-26.7-7.8 0-14.9 1-20.3 6.6-5.4 5.5-8.2 12.8-8.2 20.5v16.9c0 10.6 4.6 19.1 12.6 23.9v11.1c-15 .1-26.7 4.6-35.5 13.4-.4.4-.8.9-.6 1.4.1.3.2.5.2.7v.4c0 .4.7.8 1 1.1 13.8 13.4 32.1 20.8 50.9 20.8 19.4 0 37.7-7.6 51.4-21.5.3-.3.6-.8.5-1.3z"/><path fill="#D8D8D8" stroke="#909090" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M226.4 182.1h.4c-7.1-7.4-18.8-14-36.1-14v-12.9c8.2-5 13.3-13.9 13.3-23.8V115c0-15.1-12.4-27.1-27.5-27.1h-.1c-15.2 0-27.5 12.3-27.4 27.5l.2 16.9c0 9.7 4.7 18.2 12.8 23v13.3h-.8c-17.2 0-28.3 5.9-35.4 13.1l.4.2v1.1"/><path fill="#F2F2F2" stroke="#909090" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M143.9 138.1h-2.7c-4.1 0-6.3-5.7-6.3-12.8 0-7.1 2.4-12.8 6.3-12.8h2.7"/><path fill="#00E6FF" stroke="#909090" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M142.8 112.6h1.8c2 0 3.7 1.6 3.7 3.7v18.2c0 2-1.6 3.7-3.7 3.7h-1.8"/><path fill="none" stroke="#B2B2B2" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M208.6 138.7c0 1.2-.3 2.4-.8 3.4-1.2 2.4-3.8 3.7-6.5 3.7h-22.4"/><path fill="#B2B2B2" d="M190.9 147.7v-3.8h-2.6c-.7-1.9-2.5-3.2-4.6-3.3H181c-2.8-.1-5.1 2.2-5.2 5-.1 2.8 2.2 5.1 5 5.2h2.7c2.1 0 3.9-1.2 4.7-3l2.7-.1z"/><path fill="#F2F2F2" stroke="#909090" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M209 112.6h2.7c4.1 0 6.3 5.7 6.3 12.8 0 7.1-2.4 12.8-6.3 12.8H209"/><path fill="#00E6FF" stroke="#909090" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M210.1 138.1h-1.8c-2 0-3.7-1.6-3.7-3.7v-18.2c0-2 1.6-3.7 3.7-3.7h1.8"/><path fill="#FFF" stroke="#909090" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M319.5 24.9h-116v53h22v11.6l16.2-11.6h77.8z"/><path fill="none" stroke="#B2B2B2" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M212.3 52.3h97.6m-97.6 14.3h95m-95-7.1h89.2"/><path fill="#FFF" stroke="#B2B2B2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M230.304 9.729l34.068-5.427 5.396 33.871-34.07 5.427z"/><path fill="#F2F2F2" stroke="#B2B2B2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M235.799 13.714l24.39-3.886 3.87 24.293-24.39 3.885z"/><path fill="#FFF" stroke="#B2B2B2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M254.69 1.047l36.646 5.776-5.745 36.45-36.647-5.776z"/><path fill="#B0E44F" d="M279.3 23.5l-8.2 7.1-6-12-8.5 8.5-2.2 6.3 27.2 4.3 1.2-9.3z"/><path fill="none" stroke="#B2B2B2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M275.4 36.4l-10.3-17.8-9.5 9.5m16 1.7l7.7-6.2 3.5 4.8"/><circle fill="#00E6FF" cx="274.4" cy="16.5" r="3.7"/><path fill="none" stroke="#B2B2B2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M258.699 6.437l27.164 4.282-4.266 27.065-27.164-4.281z"/><path fill="#FFF" stroke="#909090" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M321.5 248.7c1.6 0 2.9-1.3 2.9-2.9V187H212.7v58.8c0 1.6 1.3 2.9 2.9 2.9h105.9z"/><path fill="#E0E0E0" stroke="#909090" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M317.2 176.4h-97.4c-4 0-7.2 3.2-7.2 7.2v3.5h111.7v-3.5c0-4-3.2-7.2-7.1-7.2z"/><path fill="#00E6FF" stroke="#00E6FF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M266.9 229.3c1.7 0 3.2 1.4 3.2 3.2 0 1.2-.7 2.2-1.6 2.8 1.1 1.3 2.5 2.3 4.1 2.9.3-1.5 1.5-2.6 3.1-2.6s2.9 1.1 3.1 2.6c1.6-.6 3-1.6 4.1-2.9-1-.5-1.6-1.6-1.6-2.8 0-1.7 1.4-3.2 3.2-3.2.2 0 .4 0 .7.1v-.2c0-2-.6-3.8-1.6-5.3-.6.6-1.4.9-2.2.9-1.7 0-3.2-1.4-3.2-3.2 0-.5.1-1.1.4-1.5-.9-.3-1.9-.4-2.8-.4-1 0-1.9.2-2.8.4.2.4.4 1 .4 1.5 0 1.7-1.4 3.2-3.2 3.2-.9 0-1.7-.4-2.2-.9-1 1.5-1.6 3.3-1.6 5.3v.2s.3-.1.5-.1z"/><path fill="#6FDA44" stroke="#6FDA44" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M278.1 212.1c2.4-2.8 2.8-6.7 1.3-9.8l-5.4 6.3c-1.3 1.5-3.6 1.7-5.1.4-1.5-1.3-1.7-3.6-.4-5.1l5.4-6.3c-3.3-1-7.1 0-9.5 2.8-2.4 2.8-2.8 6.7-1.3 9.8L246 229.7c-1.3 1.5-1.1 3.8.4 5.1s3.8 1.1 5.1-.4l17.1-19.5c3.3 1 7.1 0 9.5-2.8z"/><circle fill="#FFF" stroke="#FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="275.7" cy="229.2" r="1.8"/><path fill="#FFF" stroke="#909090" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M136.3 51.2V83H57.8V37.2h64.7"/><path fill="none" stroke="#909090" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M57.8 37.2L97 63.5 124.4 45"/><circle fill="#6FDA44" stroke="#6FDA44" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="135.4" cy="38.2" r="13"/><path fill="#FFF" stroke="#FFF" stroke-miterlimit="10" d="M134.6 36.1l-1.3.3-.4-1.4 2.2-.7h1.2v7.8h-1.7v-6z"/><path fill="#FFF" stroke="#909090" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M1.5 251.9h128v-90h-21v-13.6l-16.2 13.6H1.5z"/><path fill="none" stroke="#BEBEBE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M51.8 187.2l5.5 5.5m0-5.5l-5.5 5.5m40.1 24.9l7.6 7.6m0-7.6l-7.6 7.6"/><path fill="none" stroke="#00E6FF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M92.7 182.5l8-.1-28.9 28.9-14-8.2-30.5 33.8m73.5-54.5v8.3"/><circle fill="none" stroke="#BEBEBE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="2.0823,5.2056" cx="112.3" cy="177.4" r="4.6"/><path fill="none" stroke="#BEBEBE" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M21 178.9h-8m8 12h-8m8 14h-8m8 12h-8m8 13h-8"/><path fill="none" stroke="#55AE26" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M27.5 176.4v61.5H117"/></svg>  --}}
                    <img style="width: 80%" src="{{ asset('images/pro-service.jpg') }}" alt="">
                </div>
            </div>

            <div class="row double-margin">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 jobs-top-margin col-12 col-text-center hidden-on-mobile">
                    {{--  <svg id="pro-service" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 425.5 306.7"><circle fill="none" stroke="#2c004f" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="220.1" cy="167" r="138"/><circle fill="#FFF" stroke="#E0E0E0" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="320.2" cy="267.3" r="32.9"/><circle fill="#FFF" cx="319.8" cy="267.3" r="28"/><path fill="none" stroke="#E0E0E0" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M314.1 227.2c-2.4-1.8-3.9-4.7-3.9-7.9 0-5.5 4.4-9.9 9.9-9.9s9.9 4.4 9.9 9.9c0 3.1-1.4 5.9-3.7 7.7"/><circle fill="none" stroke="#E0E0E0" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="320.2" cy="267.3" r="28"/><path d="M320.2 248.9v-3.5m0 43.4v-2.9" fill="none" stroke="#73E6FF" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"/><g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"><path stroke="#B9F2FF" stroke-width="2.773" d="M338.7 267.4h3.5"/><path stroke="#73E6FF" stroke-width="2.25" d="M298.2 267.4h3.5"/></g><path d="M333.3 254.3l2.5-2.5m-31.1 31.1l2.4-2.4m26.2 0l2.5 2.4m-31.1-31.1l2.4 2.5" fill="none" stroke="#73E6FF" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"/><path fill="none" stroke="#E0E0E0" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M291.6 247.9l-2.7-2.8 7.4-7.3 2.7 2.7m23.1-7.4v-3m-4 3v-3m5.7-1.5h-7.5c-1.3 0-2.3-1-2.3-2.3v-.6c0-1.3 1-2.3 2.3-2.3h7.5c1.3 0 2.3 1 2.3 2.3v.6c.1 1.3-1 2.3-2.3 2.3z"/><circle fill="#E0E0E0" cx="320.1" cy="267.5" r="3.1"/><path fill="none" stroke="#E0E0E0" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M307.3 261.1l10.4 5.4m2.4-13.1v12"/><path fill="#F2F2F2" stroke="#909090" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M390.3 184.9h28.4c3.1 0 5.6 2.5 5.6 5.6v104.1c0 3.1-2.5 5.6-5.6 5.6h-76.5c-3.1 0-5.6-2.5-5.6-5.6V190.5c0-3.1 2.5-5.6 5.6-5.6h28.4"/><path fill="#FFF" stroke="#B2B2B2" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M410.3 194.8h4.9v96.5h-69.4v-96.5h4.9"/><path fill="#FFF" stroke="#E0E0E0" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M110.6 247l34.8-11.5c1.9-.6 4 .5 4.6 2.4l12.1 39.3c.6 1.9-.5 4-2.4 4.6l-49.2 16"/><path fill="#E0E0E0" stroke="#E0E0E0" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M154.4 251.9L111.3 266v-10.1l40.4-12.8z"/><path fill="none" stroke="#E0E0E0" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M131 270.1l8.5-2.6"/><path fill="none" stroke="#73E6FF" stroke-width="2.25" stroke-miterlimit="10" d="M41.3 300H25.1c-.8 0-1.4-.6-1.4-1.4v-4c0-.8.6-1.4 1.4-1.4h15.6m.1 0H20.3c-.8 0-1.4-.6-1.4-1.4v-4c0-.8.6-1.4 1.4-1.4h20.5m0 0H23.5c-.8 0-1.4-.6-1.4-1.4v-4c0-.8.6-1.4 1.4-1.4h17.3m0 0H23.5c-.8 0-1.4-.6-1.4-1.4v-4c0-.8.6-1.4 1.4-1.4h17.8m-1.4-.1H19.3c-.8 0-1.4-.6-1.4-1.4v-4.1c0-.8.6-1.4 1.4-1.4h20.6c.8 0 1.4.6 1.4 1.4v4.1c-.1.8-.7 1.4-1.4 1.4zm-20.2 12.9L5.2 299.8c-.4.4-1.1.4-1.5 0l-2.2-2.3c-.4-.4-.4-1.1 0-1.5L16 281.8c.4-.4 1.1-.4 1.5 0l2.2 2.3c.4.4.4 1.1 0 1.5z"/><path fill="none" stroke="#73E6FF" stroke-width="2.25" stroke-miterlimit="10" d="M41.2 265.9H23.5c-.8 0-1.4-.6-1.4-1.4v-4c0-.8.6-1.4 1.4-1.4h17.8"/><path fill="#E0E0E0" stroke="#7D7D7D" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M46.2 235.3v-18.4c0-16.1 13.1-29.2 29.2-29.2s29.2 13.1 29.2 29.2v18.4l-8.5.1v-18.5c0-11.4-9.3-20.7-20.7-20.7-11.4 0-20.7 9.3-20.7 20.7v18.5l-8.5-.1z"/><path fill="#E0E0E0" stroke="#7D7D7D" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M108.3 300H42.6c-1.2 0-2.2-1-2.2-2.2v-60.3c0-1.2 1-2.2 2.2-2.2h65.6c1.2 0 2.2 1 2.2 2.2v60.3c.1 1.2-.9 2.2-2.1 2.2z"/><path fill="#909090" stroke="#909090" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M81.1 262.5c0-3.2-2.6-5.7-5.8-5.6-2.9.1-5.4 2.5-5.5 5.5-.1 2.1 1 3.9 2.6 4.9.7.4.9 1.3.7 2.1l-3.3 9.3h11.3l-3.3-9.3c-.3-.7 0-1.6.7-2 1.6-1.1 2.6-2.9 2.6-4.9z"/><path fill="none" stroke="#EFEFEF" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M85.5 242h15.7c1.4 0 2.6 1.2 2.6 2.6v22.8"/><path fill="#6FDA44" stroke="#6FDA44" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M138.8 272.9c-8.1 0-14.7 6.1-15.6 13.9H81.1v4.9h42.3c1.4 7.2 7.8 12.6 15.4 12.6 8.7 0 15.7-7 15.7-15.7.1-8.6-7-15.7-15.7-15.7zm0 25.5c-5.4 0-9.8-4.4-9.8-9.8s4.4-9.8 9.8-9.8 9.8 4.4 9.8 9.8-4.4 9.8-9.8 9.8z"/><path fill="#6FDA44" stroke="#6FDA44" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M95.1 291.9v6.5h3.8v4.9H81.1v-4.9h3.8v-6.5h2.5v6.5h5.3v-6.5z"/><path fill="#FFF" stroke="#E0E0E0" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M243.5 22.7V78h-46.6v15l-19.1-15h-10.2V22.7z"/><path fill="none" stroke="#E0E0E0" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M177.5 56h55.2m-55.2-10.4h50.4m-50.4 20.7h36.1m-36.1-31h55.2"/><path fill="#F2F2F2" stroke="#7D7D7D" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M210.1 1.1v55.3h47.5v15l19.1-15h10.2V1.1z"/><circle fill="#6FDA44" cx="233.5" cy="29" r="4.3"/><circle fill="#6FDA44" cx="248.5" cy="29" r="4.3"/><circle fill="#6FDA44" cx="263.6" cy="29" r="4.3"/><path fill="#FFF" d="M181.5 39.7l8 5.9-1.8-18.5-37.5 5.3 4.1 35.8L167.7 50l4.9 3.3 8.9-13.6"/><path fill="#E7E7E7" d="M167.7 50l-12.6 17.9.4 2.5 37.6-4.9-2.6-18.8-9-7-8.7 13z"/><path fill="none" stroke="#B2B2B2" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M154.5 69.7L167.7 50l10.7 8.1"/><path fill="none" stroke="#B2B2B2" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M172.6 53.7l8.9-14 9 7"/><circle fill="#73E6FF" cx="160.8" cy="40.6" r="5.2"/><path fill="none" stroke="#B2B2B2" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M149.276 32.618l38.416-5.455 5.456 38.415-38.416 5.456z"/><path fill="none" stroke="#B2B2B2" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M178 20.1l-3.4 12.5c-.5 1.7.5 3.4 2.2 3.9 1.7.5 3.4-.5 3.9-2.2l3.7-13.4c.9-3.1-1-6.3-4.1-7.2-3.1-.9-6.3 1-7.2 4.1l-1 3.5"/><path fill="#FFF" stroke="#E0E0E0" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M167.6 22.7h4.9"/><path fill="none" stroke="#B2B2B2" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M380.8 225.3h24m-46-15.3h41.6m-19.6 23.3h24m-24 8h16.8m-16.8 19.5h24m-24 8h19.6m-19.6 8h24m-48.7-50.5H370v13.9h-13.9z"/><path fill="none" stroke="#6FDA44" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M359.7 230.7l3.4 4.1 10.7-13.2"/><path fill="none" stroke="#B2B2B2" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M356.1 261.7H370v13.9h-13.9z"/><path fill="none" stroke="#6FDA44" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M359.7 266.1l3.4 4 10.7-13.2"/><path fill="#C1C1C1" d="M388.6 185.1c.2-.7.3-1.4.3-2.2 0-4.6-3.7-8.4-8.4-8.4-4.6 0-8.4 3.7-8.4 8.4 0 .8.1 1.5.3 2.2h-19.7v12.6h55.6v-12.6h-19.7z"/><path fill="#909090" d="M380.5 186.1c4.8 0 4.8-7.5 0-7.5s-4.8 7.5 0 7.5z"/><path fill="none" stroke="#E5E5E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M367.5 193.1h38m-42 0h-5m4 0h-4"/><path fill="none" stroke="#909090" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M388.6 185.1c.2-.7.3-1.4.3-2.2 0-4.6-3.7-8.4-8.4-8.4-4.6 0-8.4 3.7-8.4 8.4 0 .8.1 1.5.3 2.2h-19.7v12.6h55.6v-12.6h-19.7z"/></svg>  --}}
                    <img style="width: 80%" src="{{ asset('images/pro-tools.jpg') }}" alt="">
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <h1 class="pro-service-heading">Pro Standard: Get in touch whenever you want</h1>
                    <p class="pro-service-desc"><span style="font-weight:bold"> Collaborate whenever, wherever.</span>
                        With real-time messaging, file sharing, video conferencing, and team permission features,
                        communication among your team is a breeze.</p>
                    <p class="pro-service-desc"><span style="font-weight:bold"> Track work, effortlessly.</span> See
                        screenshots of billed time, check hours logged, and review work milestones.</p>
                    <p class="pro-service-desc"><span style="font-weight:bold"> Pay securely and easily.</span> With
                        Upwork Payment Protection, you only pay for work you authorize. Also enjoy multiple payment
                        options and our secure escrow services.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- banner photo linga  -->
    <div class="container-fluid row-bg-color">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center" style="padding:20px 0">
                    <h5 class="try-photo">Try Photolinga Pro risk-free for your first 30 days. Satisfaction guaranteed.
                        Details.</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid jobs-top-margin">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h1 class="text-center pro-service-heading">How Photolinga Pro Works</h1>
                </div>

                <div class="row text-center jobs-top-margin">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                        <div class="pro-icon-padding">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 version="1.1" id="number" x="0px" y="0px" viewBox="0 0 384 384"
                                 style="enable-background:new 0 0 384 384;" xml:space="preserve"><g>
                                    <g>
                                        <path fill="#F74545"
                                              d="M341.333,0H42.667C19.093,0,0,19.093,0,42.667v298.667C0,364.907,19.093,384,42.667,384h298.667 C364.907,384,384,364.907,384,341.333V42.667C384,19.093,364.907,0,341.333,0z M234.667,298.667H192V128h-42.667V85.333h85.333 V298.667z"
                                              fill="#FFFFFF"/>
                                        <h4>TELL US YOUR REQUIREMENTS</h4>
                                        <p>Let us know your event details and we'll get in touch with you to provide you the best resource possible</p>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                        <div class="pro-icon-padding">
                            <svg version="1.1" id="number" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 384 384"
                                 style="enable-background:new 0 0 384 384;" xml:space="preserve"><g>
                                    <g>
                                        <path d="M341.333,0H42.667C19.093,0,0,19.093,0,42.667v298.667C0,364.907,19.093,384,42.667,384h298.667C364.907,384,384,364.907,384,341.333V42.667C384,19.093,364.907,0,341.333,0z M256,170.667c0,23.573-19.093,42.667-42.667,42.667h-42.667V256H256v42.667H128v-85.333c0-23.573,19.093-42.667,42.667-42.667h42.667V128H128V85.333h85.333C236.907,85.333,256,104.427,256,128V170.667z"/>
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
                            <h4>WE OFFER PERFECTION</h4>
                            <p>We make sure that your event is covered by professionals and deliver you amazing quality work.</p>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                        <div class="pro-icon-padding">
                            <svg version="1.1" id="number" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 384 384"
                                 style="enable-background:new 0 0 384 384;" xml:space="preserve"><g>
                                    <g>
                                        <path d="M341.333,0H42.667C19.093,0,0,19.093,0,42.667v298.667C0,364.907,19.093,384,42.667,384h298.667C364.907,384,384,364.907,384,341.333V42.667C384,19.093,364.907,0,341.333,0z M256,160c0,17.707-14.293,32-32,32c17.707,0,32,14.293,32,32v32c0,23.573-19.093,42.667-42.667,42.667H128V256h85.333v-42.667h-42.667v-42.667h42.667V128H128V85.333h85.333C236.907,85.333,256,104.427,256,128V160z"/>
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
                            <h4>GET BEST RESULTS</h4>
                            <p>Your Photolinga support team is available to support you throughout the process</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ready to find pro -->
    <div class="container-fluid row-bg-color">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center" style="padding:20px 0">
                    <h1 class="ready-pro">Ready to find your Pro?</h1>
                    <button class="btn ready-btn" data-toggle="modal" data-target="#myModal"
                            style="margin-top:0!important">Get Started
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection