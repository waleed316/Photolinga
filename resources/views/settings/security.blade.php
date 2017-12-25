@extends('layouts.master')

@section('content')

    @include('layouts.nav')

    <settings-view inline-template :current-user="{{ auth()->user() }}">

        <div class="container-fluid post-bg-color">
            <div class="container">
                <div class="row jobs-top-padding">
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12">
                        <ul class="account-list">
                            <li><a href="/settings" class="account-items">Account</a></li>
                            <li><a href="/settings/security" class="account-items activated">Security</a></li>
                            <li><a href="/settings/notification" class="account-items">Notification</a></li>
                        </ul>
                    </div>

                    <div class="col-xl-10- col-lg-9 col-md-9 col-sm-12 account-bg-color">
                        <div class="container account-form-padding">
                            <form action="/password/reset">

                                <h6 class="form-heading">Password</h6>
                                <div class="form-group row">
                                    <label for="set_password"
                                           class="form-label-color col-12 col-xl-3 col-lg-3 col-md-4 col-form-label">Set
                                        Password</label>
                                    <div class="col-12 col-xl-9 col-lg-9 col-md-8">
                                        <input class="form-control form-input-border" type="text" placeholder="Password"
                                               id="set_password" name="set_password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="confirm_password"
                                           class="form-label-color col-12 col-xl-3 col-lg-3 col-md-4 col-form-label">confirm-password</label>
                                    <div class="col-12 col-xl-9 col-lg-9 col-md-8">
                                        <input class="form-control form-input-border" type="text"
                                               placeholder="Confirm Password" id="confirm_password"
                                               name="confirm_password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-xl-12">
                                        <button type="submit" class="save-changes-btn pull-right btn btn-primary">Save
                                            Changes
                                        </button>
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group row">
                                    <label for="confirm-password"
                                           class="form-heading col-12 col-xl-3 col-lg-3 col-md-3 col-form-label">Phone
                                        Verification</label>
                                    <div class="col-12 col-xl-6 col-lg-6 col-md-6">
                                        <h6 class="form-text">Your phone number is not verified with Photolinga
                                            Click "Verify Now" to complete phone verification
                                        </h6>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3">
                                        <button type="submit" class="save-changes-btn pull-right btn btn-primary">Verify
                                            Now
                                        </button>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="confirm-password"
                                           class="form-heading col-12 col-xl-3 col-lg-3 col-md-3 col-form-label">Security
                                        Question</label>
                                    <div class="col-12 col-xl-6 col-lg-6 col-md-6">
                                        <h6 class="form-text">By creating a security question, you will add an
                                            additional layer of protection for your revenue withdrawals and for changing
                                            your password</h6>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3">
                                        <button type="submit" class="save-changes-btn pull-right btn btn-primary">Set
                                        </button>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </settings-view>

@endsection