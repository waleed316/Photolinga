@extends('layouts.master')

@section('content')

    @include('layouts.nav')

    <!-- Privacy policy section -->
    <div class="container-fluid px-0 pt-4">
        <div class="container px-0">
            <div class="row mx-0">
                <div class="col-xl-12 privacy-section">
                    <h1 class="privacy-heading">Privacy Policy</h1>
                    <h3 class="overview-heading">Overview</h3>
                    <p class="privacy-desc">
                        Photolinga.com is firmly committed to the privacy of its members. Photolinga.com works hard to
                        earn and keep your trust, so it adheres to the following principles to protect your privacy:
                        <ul class="privacy-list">
                            <li>
                    <p class="privacy-desc">
                        Photolinga.com does not rent or sell your personally identifiable information to third parties.
                    </p>
                    </li>
                    <li>
                        <p class="privacy-desc">
                            Photolinga.com does not share your contact information with other users or third parties
                            without your consent. </p>
                    </li>
                    <li>
                        <p class="privacy-desc">
                            Any personally identifiable information that you provide to Photolinga.com will be secured
                            with industry standard protocols and technology </p>
                    </li>
                    </ul>
                    </p>


                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <h5 class="mb-0">
                                    <a class="overview-heading" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Information Collection <i class="fa fa-chevron-up pull-right"
                                                                  aria-hidden="true"></i>
                                    </a>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-block">
                                    <p class="privacy-desc">
                                        Photolinga.com is an online marketplace that connects customers with
                                        freelancers/photographers. When you visit Photolinga.com you provide two types
                                        of information: personal information you knowingly choose to disclose that is
                                        collected by Photolinga.com and Web Site use information collected by
                                        Photolinga.com as you interact with the Photolinga.com web site (the “Website”).
                                    </p>
                                    <p class="privacy-desc">
                                        When you register with Photolinga.com as a Freelancer or as an Employer, you
                                        provide certain personal information, including, your name, your email address
                                        and your address. Additionally, when you establish your profile as a Freelancer
                                        or as an Employer you will provide information relating to your skills,
                                        experience, education level, compensation, work availability, geographic region
                                        and self-evaluation. Such information does not identify the specificity of the
                                        individual member. Freelancers are not required to, but have the option to
                                        display their contact information (i.e. name, address, email address, etc.) to
                                        Employers who conduct searches of the Photolinga.com database.
                                    </p>
                                    <p class="privacy-desc">
                                        When you enter the Website, Photolinga.com collects your IP address. This
                                        information is gathered for all Photolinga.com visitors. In addition,
                                        Photolinga.com stores certain information from your browser using “cookies.” A
                                        cookie is a piece of data stored on the user’s computer tied to information
                                        about the user. Photolinga.com uses session ID cookies to confirm that users are
                                        logged in. These cookies terminate once the user closes the browser. By default,
                                        Photolinga.com uses a persistent cookie that stores your login ID (but not your
                                        password) to make it easier for you to login when you return to the Website.
                                        Photolinga.com members must have cookies enabled on their browser. Note, Cookie
                                        preferences are set within each browser’s Internet options/preferences.
                                    </p>
                                    <p class="privacy-desc">
                                        If you post an information on a bulletin board, or participate in a public
                                        message board, you should be aware that any personally identifiable information
                                        you choose to provide there can be read, collected, or used by other users of
                                        these forums and could be used to send you unsolicited messages. Photolinga.com
                                        is not responsible for the personally identifiable information you choose to
                                        submit in these forums.
                                    </p>
                                    <p class="privacy-desc">
                                        Photolinga.com is the sole owner of the information collected through the
                                        Website.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo">
                                <h5 class="mb-0">
                                    <a class="collapsed overview-heading" data-toggle="collapse"
                                       data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                       aria-controls="collapseTwo">
                                        Information Use <i class="fa fa-chevron-down pull-right" aria-hidden="true"></i>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="card-block">
                                    <p class="privacy-desc">
                                        Photolinga.com will not sell or rent any collected information to third parties.
                                        Photolinga.com will not share your contact information with other users or third
                                        parties except in connection with possible employment and with your express
                                        consent. All registered Photolinga.com members click the “I AGREE” checkbox on
                                        the registration form to agree to the Photolinga.com Privacy Policy and Terms of
                                        Service. Accordingly, all registered users agree that certain profile
                                        information is accessible to other registered users.
                                    </p>
                                    <p class="privacy-desc">
                                        Photolinga.com records IP addresses for system administration purposes. This
                                        information is used to diagnose server problems, monitor traffic patterns,
                                        analyze trends, administer the website, track member user patterns, and identify
                                        the most popular areas of the website to deliver content most relevant to
                                        registered members. IP addresses are not linked to personally identifiable
                                        information and are only used to gather broad demographic information for
                                        aggregate use, except in the case of fraud.
                                    </p>
                                    <p class="privacy-desc">
                                        Photolinga.com reserves the right to share aggregated demographic information
                                        with its partners and/or advertisers, such information will not be linked to
                                        personal information that identifies registered users, except in the case of
                                        fraud.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                                <h5 class="mb-0">
                                    <a class="collapsed overview-heading" data-toggle="collapse"
                                       data-parent="#accordion" href="#collapseThree" aria-expanded="false"
                                       aria-controls="collapseThree">
                                        Azure Analytics <i class="fa fa-chevron-down pull-right" aria-hidden="true"></i>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="card-block">
                                    <p class="privacy-desc">
                                        We use Azure Analytics tracking to review visitor website activities, including:
                                        page views, source and time spent on our website. The collected information is
                                        depersonalized and is displayed as numbers, meaning it cannot be tracked back to
                                        individuals. This will help to protect your privacy. Using Azure Analytics, we
                                        learn how to give you a better visitor experience
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingFour">
                                <h5 class="mb-0">
                                    <a class="collapsed overview-heading" data-toggle="collapse"
                                       data-parent="#accordion" href="#collapseFour" aria-expanded="false"
                                       aria-controls="collapseFour">
                                        Links <i class="fa fa-chevron-down pull-right" aria-hidden="true"></i>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                                <div class="card-block">
                                    <p class="privacy-desc">
                                        The Website contains links to other websites and is not responsible for the
                                        privacy practices of such websites. Photolinga.com encourages its members to
                                        read the privacy policies of all websites. This privacy statement applies solely
                                        to information collected by Photolinga.com.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingFive">
                                <h5 class="mb-0">
                                    <a class="collapsed overview-heading" data-toggle="collapse"
                                       data-parent="#accordion" href="#collapseFive" aria-expanded="false"
                                       aria-controls="collapseFive">
                                        Security <i class="fa fa-chevron-down pull-right" aria-hidden="true"></i>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive">
                                <div class="card-block">
                                    <p class="privacy-desc">
                                        Photolinga.com takes industry standard protocols and technology to protect
                                        registered user information. Photolinga.com is a Azure Secure Site. All
                                        transactions performed through Photolinga.com are conducted in a Secure Socket
                                        Layer (SSL) session. The Secure Socket Layer encrypts all transaction data for
                                        transmittal in a format that prevents data theft. This process protects all
                                        private information from being disclosed to third parties. While on a secure
                                        page, the lock icon at the bottom of a Web browser (i.e. Firefox or Chrome)
                                        becomes locked.
                                    </p>
                                    <p class="privacy-desc">
                                        Photolinga.com also protects registered user information offline. All registered
                                        user information is restricted within our offices. Servers used to store
                                        personally identifiable information are housed in a secure, supervised
                                        environment. In addition, only Photolinga.com employees who need specific
                                        information to perform a task are granted access to personally identifiable
                                        information.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingsix">
                                <h5 class="mb-0">
                                    <a class="collapsed overview-heading" data-toggle="collapse"
                                       data-parent="#accordion" href="#collapsesix" aria-expanded="false"
                                       aria-controls="collapsesix">
                                        Mandatory Communications <i class="fa fa-chevron-down pull-right"
                                                                    aria-hidden="true"></i>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapsesix" class="collapse" role="tabpanel" aria-labelledby="headingsix">
                                <div class="card-block">
                                    <p class="privacy-desc">
                                        Photolinga.com sends all newly registered users a welcome email to verify their
                                        email addresses. At times, Photolinga.com sends service announcements to its
                                        registered Employers and Freelancers. Registered Users cannot unsubscribe from
                                        service announcements that discuss upcoming changes that affect their
                                        Photolinga.com accounts. In addition, we communicate with registered members via
                                        personal emails or phone calls to provide requested services.
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingseven">
                                <h5 class="mb-0">
                                    <a class="collapsed overview-heading" data-toggle="collapse"
                                       data-parent="#accordion" href="#collapseseven" aria-expanded="false"
                                       aria-controls="collapseseven">
                                        Optional Communications <i class="fa fa-chevron-down pull-right"
                                                                   aria-hidden="true"></i>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseseven" class="collapse" role="tabpanel" aria-labelledby="headingseven">
                                <div class="card-block">
                                    <p class="privacy-desc">
                                        Registered users receive monthly e-newsletters containing information on
                                        Photolinga.com products, services and announcements. Occasionally, registered
                                        users receive e-postcards that highlight special Photolinga.com announcements
                                        and features. Registered users can opt-out of the above listed communications.
                                        Please see our Choice/Opt-out section below.
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingeight">
                                <h5 class="mb-0">
                                    <a class="collapsed overview-heading" data-toggle="collapse"
                                       data-parent="#accordion" href="#collapseeight" aria-expanded="false"
                                       aria-controls="collapseeight">
                                        Notification of Changes <i class="fa fa-chevron-down pull-right"
                                                                   aria-hidden="true"></i>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseeight" class="collapse" role="tabpanel" aria-labelledby="headingeight">
                                <div class="card-block">
                                    <p class="privacy-desc">
                                        Photolinga.com reserves the right to modify this privacy policy at any time, so
                                        please review it frequently. If Photolinga.com alters its Privacy Policy, it
                                        will promptly post all changes in the Employer and Freelancer Announcement
                                        areas. By continuing to use Photolinga.com after changes have been made to this
                                        policy, you are consenting to the changes.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection