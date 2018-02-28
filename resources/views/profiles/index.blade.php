@extends('layouts.master') @section('content') @include('layouts.nav')

<!-- main section -->
<photographersearch inline-template="inline-template">

<div class="container-fluid all-jos">
    <div class="bluuur"></div>
    <div class="container">
            <div v-cloak="v-cloak">
                <div class="row all-jobs">
                    <div class="col-xl-12">
                        <div class="jobs-flex">
                            <!-- <div class="first-box"> <h1 class="cat-heading">Category</h1> <div
                            class="form-group"> <select class="form-control form-control-sm"
                            id="category_select"> <option>All</option> </select> </div> </div> -->

                            <div class="first-box">
                                <h1 class="cat-heading">Countries</h1>
                                <div class="form-group cat-form mb-2">
                                    <!-- <select > <option selected value="pakistan">Pakistan</option> </select> -->
                                    <select
                                        class="form-control form-control-sm"
                                        name="country"
                                        id="country"
                                        v-model="country">
                                        <option value="">Pakistan</option>
                                    </select>
                                    <!-- <i class="fa fa-search cat-search" v-on:click="Photographer"></i> -->
                                </div>
                                <h1 class="cat-heading">City</h1>
                                <div class="form-group cat-form mb-2">
                                    <!-- <select name="city" id="city" v-model="city"> <option value="">All</option>
                                    @foreach($cities as $city1) <option
                                    value="{{$city1->city}}">{{$city1->city}}</option> @endforeach </select> -->
                                    <select
                                        class="form-control form-control-sm"
                                        name="city"
                                        id="city"
                                        v-model="city">
                                        <option value="">All</option>
                                        <option>Faisalabad</option>
                                        <option>Islamabad</option>
                                        <option>Karachi</option>
                                        <option>Lahore</option>
                                        <option>Multan</option>
                                        <option>Peshawar</option>
                                        <option>Quetta</option>
                                        <option>Hyderabad</option>
                                    </select>
                                    <!-- <i class="fa fa-search cat-search" v-on:click="Photographer"></i> -->
                                </div>
                            </div>
                            <div class="first-box">
                                <h1 class="cat-heading">Feedback Rating</h1>
                                <div class="form-group">
                                    <select class="form-control form-control-sm" id="feedback" v-model="rating">
                                        <option selected="selected" value="">1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="first-box">
                                <h1 class="cat-heading">Skills</h1>
                                <div class="form-group cat-form mb-2">

                                    <input
                                        type="text"
                                        placeholder="Keyword"
                                        v-model="query"
                                        v-on:keyup="autoComplete"
                                        class="form-control form-control-sm category-input">
                                    <div v-if="results.length">
                                        <ul class="list-group" id="searchResult">
                                            <i v-show="Sloading" class="fa fa-spinner fa-spin"></i>

                                            <a v-on:click="skillSelected(result)" v-for="result in results">
                                                <li class="list-group-item list-group-item-action">
                                                    @{{ result.name }}
                                                </li>
                                            </a>

                                        </ul>
                                    </div>
                                </div>

                                <p class="tags-required">
                                    <div v-for="(skill, index) in keyword">
                                        <a class="required-skills" v-on:click="removeSkill(index,skill)">
                                            @{{skill}}
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </p>

                            </div>
                            <div class="search-button">
                                <button class="btn btn-md">Search</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-xl-12">
                        <h1 class="jobs-num">
                            <span>@{{ photographerList.length }}</span>
                            Profiles</h1>
                    </div>
                </div>

            </div>
            <div class="container-fluid pt-3 post-bg-color">
                <div class="container">
                    <div style="text-align: center;">
                        <i v-show="loading" class="fa fa-spinner fa-spin"></i>
                    </div>
                    <div class="row jos-details">
                        <div class="col-xl-12">
                            <ul class="p-list">

                                <li v-for="photographer12 in photographerList">
                                    <div class="profile-box">
                                        <div class="profile-upper-box">
                                            <div class="profile-image">
                                                <img :src="photographer12.avatar_path" class="rounded-circle" alt="">
                                            </div>
                                            <div class="p-name-section">
                                                <h1 class="details-freelance-name">
                                                    @{{ photographer12.name }}
                                                </h1>
                                                <h6 class="details-freelance-desig">Senior Graphic - Web Designer
                                                </h6>
                                            </div>
                                            <a v-bind:href="'/profiles/'+photographer12.id" class="btn-sm viev-all">View Profile</a>
                                        </div>
                                        <div class="profile-lower-box">
                                            <div class="p-left-section">
                                                <div class="p-rating-section">
                                                    <ul class="r-list">
                                                        <!-- @{{ photographer12.rating }} -->
                                                        <star-rating
                                                            v-bind:increment="0.5"
                                                            v-bind:read-only="true"
                                                            :rating="photographer12.rating"
                                                            v-bind:max-rating="5"
                                                            v-bind:round-start-rating="false"
                                                            v-bind:show-rating="false"
                                                            inactive-color="#b296c5"
                                                            active-color="#290740"
                                                            v-bind:star-size="13">
                                                            <!-- <li><a href="#"><i class="fa fa-star"></i></a></li> <li><a href="#"><i
                                                            class="fa fa-star"></i></a></li> <li><a href="#"><i class="fa
                                                            fa-star"></i></a></li> <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li> -->
                                                        </ul>
                                                    </div>
                                                    <div class="p-year">
                                                        <h6 class="year">2+ Years</h6>
                                                    </div>
                                                </div>
                                                <div class="p-right-section">
                                                    <p class="tags-required mt-0">
                                                        <a style="display:inline-block;margin-right:5px; padding:0px 3px;" href="#" class="required-skills" v-for="skill12 in photographer12.skills ">@{{ skill12.name}}</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- </p> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </photographersearch>

    </div>

</div>
</div>

@endsection