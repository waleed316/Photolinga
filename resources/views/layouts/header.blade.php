<nav class="navbar navbar-toggleable-md navbar-inverse bg-faded navbar-bg-color">

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon navbar-text-color"></span>
    </button>
    <a class="navbar-brand" href="index.php">
        <img src="{{ asset('images/logoblack.png') }}" alt="Photolinga" class="d-inline-block align-top img-fluid  navbar-logo">
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <form class="form-inline">
                <div class="input-group form-search">
                    <input type="text" class="form-control navbar-search" placeholder="Find Services">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary navbar-search-btn" type="button">Go</button>
                    </span>
                </div>
            </form>
        </div>

        @auth()
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                <ul class="navbar-nav mr-auto navbar-text-color justify-content-end">

                    <li class="nav-item">
                        <a class="nav-link " href="post.php">Post a job<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="true" aria-expanded="false">1000 PKR</a>
                        <div class="dropdown-menu dropdown-menu-zero-padding">
                            <h5 class="dropdown-heading">Balance</h5>
                            <a class="dropdown-item" href="#">PKR</a>
                            <tr class="dropdown-item">
                                <td><a class="deposit-text" href="#">Deposit Funds</a></td>
                                <td><a class="amount-num" href="#">1000</a></td>
                            </tr>
                            <!-- <a class="dropdown-item amount-num" href="#">1000</a>
                            <a class="dropdown-item deposit-text" href="#">Deposit Funds</a> -->
                            <div class="dropdown-divider navbar-divider"></div>
                            <h5 class="dropdown-heading">Manage</h5>
                            <a class="dropdown-item" href="#">Withdraw money</a>
                            <a class="dropdown-item" href="#">Transaction history</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="true" aria-expanded="false">Message</a>
                        <div class="dropdown-menu dropdown-menu-zero-padding dropdown-menu-message-padding">
                            <h5 class="dropdown-heading">Messages</h5>

                            <table class="table table-responsive table-hover"
                                   style="padding:5px 20px 0 20px;margin-bottom:0">
                                <tbody>
                                    <ul class="message-list">

                                        <li>
                                            <tr>
                                                <td class="img-top-padding"><a href="#" class="message-anchor"><img
                                                                src="images/person-2.jpg" alt=""
                                                                class="message-profile"></a></td>
                                                <td>
                                                    <a href="#" class="message-anchor">
                                                        <h6 class="message-head">Salman Tariq</h6>
                                                        <h6 class="message-last-seen">Last Message</h6>
                                                    </a>
                                                </td>
                                                <TD class="message-hidden"></TD>
                                                <td class="message-hidden"></td>
                                                <td class="message-time-align"><a href="#" class="message-anchor"><h6
                                                                class="message-time">1 Day ago</h6></a></td>
                                            </tr>
                                        </li>
                                        <li>
                                            <tr>
                                                <td colspan="5" class="text-center"><a href="#" class="see-message">See
                                                        all
                                                        messages</a></td>
                                            </tr>
                                        </li>
                                    </ul>
                                </tbody>
                            </table>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="true" aria-expanded="false">Notifications</a>
                        <div class="dropdown-menu dropdown-menu-zero-padding dropdown-menu-message-padding">

                            <h5 class="dropdown-heading">Notifications</h5>

                            <table class="table table-responsive table-hover"
                                   style="padding:5px 20px 0 20px;margin-bottom:0">
                                <tbody>
                                    <ul class="message-list">

                                        <li>
                                            <tr>
                                                <td class="img-top-padding"><a href="#" class="message-anchor"><img
                                                                src="images/person-2.jpg" alt=""
                                                                class="message-profile"></a></td>
                                                <td>
                                                    <a href="#" class="message-anchor">
                                                        <h6 class="notification-head"><span
                                                                    class="person-name">Salman Tariq</span> awarded you
                                                            their job <span class="event-title"> Cover an Event</span>
                                                        </h6>
                                                    </a>
                                                </td>
                                                <!-- <TD class="message-hidden"></TD><td class="message-hidden"></td> -->
                                                <td class="message-time-align"><a href="#" class="message-anchor"><h6
                                                                class="notification-time">1 Day ago</h6></a></td>
                                            </tr>
                                        </li>

                                        <li>
                                            <tr>
                                                <td colspan="5" class="text-center"><a href="#" class="see-message">See
                                                        all
                                                        notifications</a></td>
                                            </tr>
                                        </li>
                                    </ul>
                                </tbody>
                            </table>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="true" aria-expanded="false"><img src="{{ asset('images/person-2.jpg') }}"
                                                                           alt=""
                                                                           class="img-fluid avatar rounded"></a>
                        <div class="dropdown-menu dropdown-menu-zero-padding-last">
                            <h5 class="dropdown-heading">Salman Tariq</h5>
                            <a class="dropdown-item" href="account.php">Setting</a>
                            <a class="dropdown-item invite-clr" href="#">Invite Friend and get 500 PKR </a>
                            <div class="dropdown-divider navbar-divider"></div>
                            <a class="dropdown-item" href="#">Help</a>
                            <a class="dropdown-item" href="#">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        @endauth

        @guest()
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                <ul class="navbar-nav mr-auto navbar-text-color justify-content-end">
                    <li class="nav-item">
                        <a href="/login" class="nav-link">
                            Sign In
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">
                            Join
                        </a>
                    </li>
                </ul>
            </div>

        @endguest
    </div>
</nav>