@extends('layouts.master')

@section('content')

    @include('layouts.nav')

    <settings-view inline-template :contact_info="{{ auth()->user()->contactInformation }}"
                   :current-user="{{ auth()->user() }}">
        <div class="container-fluid post-bg-color">
            <div class="container">
                <div class="row jobs-top-padding">
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12">
                        <ul class="account-list">
                            <li><a href="/settings" class="account-items activated">Account</a></li>
                            {{--<li><a href="/settings/security" class="account-items">Security</a></li>--}}
                            {{--<li><a href="notific.php" class="account-items">Notification</a></li>--}}
                        </ul>
                    </div>

                    <div class="col-xl-10- col-lg-9 col-md-9 col-sm-12 account-bg-color">
                        <div class="container account-form-padding">
                            {{--<form action="/settings/account" method="POST">--}}
                            {{--{{ csrf_field() }}--}}
                            {{--                                {{ method_field('PATCH') }}--}}

                            <h6 class="update-profile text-right">Need to update your profile? <a
                                        href="{{ route('profile',auth()->user()) }}"
                                        class="goto-profile">Go
                                    To My Profile</a></h6>
                            <h6 class="form-heading">Public Information</h6>
                            <div class="form-group row">
                                <label for="full_name"
                                       class="form-label-color col-12 col-xl-3 col-lg-3 col-md-4 col-form-label">Full
                                    Name</label>
                                <div class="col-12 col-xl-9 col-lg-9 col-md-8">
                                    <input class="form-control form-input-border" type="text" name="name"
                                           placeholder="Full Name"
                                           id="full_name" name="full_name" v-model="account.name"
                                           required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="form-label-color col-12 col-xl-3 col-lg-3 col-md-4 col-form-label">Email</label>
                                <div class="col-12 col-xl-9 col-lg-9 col-md-8">
                                    <input class="form-control form-input-border" type="email" name="email"
                                           placeholder="Email"
                                           id="email" v-model="account.email"
                                           required>
                                </div>
                            </div>
                            <hr>

                            <h6 class="form-heading">Location</h6>

                            <div class="form-group row">
                                <label for="skype"
                                       class="form-label-color col-12 col-xl-3 col-lg-3 col-md-4 col-form-label">Skype
                                    (Optional)</label>
                                <div class="col-12 col-xl-9 col-lg-9 col-md-8">
                                    <input class="form-control form-input-border" type="text"
                                           placeholder="Skype Id (Optional)" id="skype" name="skype"
                                           v-model="account.skype"
                                           required
                                    >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contact-number"
                                       class="form-label-color col-12 col-xl-3 col-lg-3 col-md-4 col-form-label">Contact
                                    Number</label>
                                <div class="col-12 col-xl-9 col-lg-9 col-md-8">
                                    <input class="form-control form-input-border" type="number"
                                           placeholder="Contact Number" id="contact-number" name="contact_number"
                                           v-model="account.contact_number"
                                           required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address"
                                       class="form-label-color col-12 col-xl-3 col-lg-3 col-md-4 col-form-label">Address</label>
                                <div class="col-12 col-xl-9 col-lg-9 col-md-8">
                                    <input class="form-control form-input-border" type="text" placeholder="Address"
                                           id="address" name="address"
                                           v-model="account.address" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city"
                                       class="form-label-color col-12 col-xl-3 col-lg-3 col-md-4 col-form-label">City</label>
                                <div class="col-12 col-xl-9 col-lg-9 col-md-8">
                                    <input class="form-control form-input-border" type="text" placeholder="City"
                                           id="city" name="city"
                                           v-model="account.city" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country"
                                       class="form-label-color col-12 col-xl-3 col-lg-3 col-md-4 col-form-label">Country</label>
                                <div class="col-12 col-xl-9 col-lg-9 col-md-8">
                                    {{--<input type="hidden" value="pakistan" name="country" id="country" class="form-control form-input-border">--}}
                                    {{--<p class="form-control form-input-border" style="color: #000 !important;">Pakistan</p>--}}
                                    <select name="country" id="country" class="form-control form-input-border"
                                            v-model="account.country">
                                        <option selected value="pakistan">Pakistan</option>
                                    </select>
                                </div>
                            </div>

                            {{--<hr>--}}

                            {{--<h6 class="form-heading">Deactivate Account</h6>--}}

                            {{--<div class="form-group row">--}}
                            {{--<label for="reason"--}}
                            {{--class="form-label-color col-12 col-xl-3 col-lg-3 col-md-4 col-form-label">I am--}}
                            {{--leaving becuase..</label>--}}
                            {{--<div class="col-12 col-xl-9 col-lg-9 col-md-8">--}}
                            {{--<select class="form-control">--}}
                            {{--<option value="">Choose a reason</option>--}}
                            {{--</select>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group row">
                                <div class="col-xl-12">
                                    <button type="button" @click="updateAccountSettings"
                                            class="save-changes-btn pull-right btn btn-primary">Save
                                        Changes
                                    </button>
                                </div>
                            </div>
                            {{--</form>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </settings-view>

@endsection