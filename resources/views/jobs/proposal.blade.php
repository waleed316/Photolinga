<proposal :data="{{ $proposal }}" inline-template v-cloak>
    <li>
        <div class="row details-bg-white panel">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-4">
                        <div class="comments-images ml-1 mt-3">
                            <a href="{{ $proposal->owner->profile() }}">
                                @if($proposal->owner->avatar_path)
                                    <img
                                            src="{{ asset($proposal->owner->avatar_path) }}"
                                            class="freelance-margin img-fluid rounded-circle"
                                            alt="">
                                @else
                                    <img src="{{ asset('images/person-2.jpg') }}"
                                         class="freelance-margin img-fluid rounded-circle"
                                         alt="">
                                @endif
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-9 col-md-8 col-sm-9 col-8 mt-4 px-0">
                        <h6 class="details-freelance-name mb-1">
                            <a href="{{ $proposal->owner->profile() }}">{{ $proposal->owner->name }}</a>
                        </h6>
                        <div v-if="editing">
                            <textarea class="form-control" v-model="body"></textarea>

                            <div class="btn btn-xs btn-danger" @click="update">Update</div>
                            <div class="btn btn-xs btn-link" @click="editing = false">Cancel</div>
                        </div>


                        @can('view',$proposal)
                            <a href="{{ $proposal->path() }}" class="btn-sm viev-all">View
                                Proposal</a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-6 no-padding-on-sm">
                <div class="freelance-year-btn mt-4">
                    <a href="#" class="freelance-reput">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-6">
                <div class="freelance-biding mt-3">
                    <div v-if="editing">
                        <input type="number" class="form-control" name="amount" v-model="amount"><span> PKR</span>
                    </div>
                    <div v-else>
                        <p class="freeware">&nbsp;<span v-text="amount">PKR</span></p>
                    </div>
                </div>
            </div>
            @can('update',$proposal)
                <div class="panel-footer level">
                    <button class="btn-sm btn mr-1 ml-1" @click="editing = true">Edit</button>
                    <button class="btn-sm btn btn-danger mr-1" @click="destroy">Delete</button>
                </div>
            @endcan
        </div>
    </li>
</proposal>