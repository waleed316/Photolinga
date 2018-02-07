<template>
    <li>
        <div class="row details-bg-white panel panel-success">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-4">
                        <div class="comments-images ml-1 mt-3">
                            <!--<a :href="'/profiles/' + data.owner.id">-->
                            <img v-if="data.owner.avatar_path" :src="data.owner.avatar_path" :alt="data.owner.name"
                            class="freelance-margin img-fluid rounded-circle">
                            <img v-else src="/images/person-2.jpg" :alt="data.owner.name"
                                 class="freelance-margin img-fluid rounded-circle">
                            <!--<img :src="userAvatar"-->
                            <!--class="freelance-margin img-fluid rounded-circle"-->
                            <!--:alt="data.owner.name">-->
                            <!--</a>-->
                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-9 col-md-8 col-sm-9 col-8 mt-4 px-0">
                        <h6 class="details-freelance-name mb-1">
                            <a :href="data.owner.id" v-text="this.data.owner.name"></a>
                        </h6>
                        <p class="details-freelance-desig mb-1">Sensdssior Graphic - Web Designer</p>
                        <div v-if="editing">
                            <textarea class="form-control" v-model="body"></textarea>

                            <div class="btn btn-xs btn-danger" @click="update">Update</div>
                            <div class="btn btn-xs btn-link" @click="editing = false">Cancel</div>
                        </div>


                        <a v-if="canView" :href="'/proposals/' + this.id" class="btn-sm viev-all">
                            View Proposal
                        </a>
                        <div v-if="canView">
                        <chat v-bind:userid=data.user_id v-bind:jobid=data.job_id></chat>
                        </div>
                                           </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-6 no-padding-on-sm">
                <div class="freelance-year-btn mt-4">
                  <star-rating 
                    v-bind:increment="0.5" 
                    v-bind:read-only="true"
                    :rating=data.owner.rating  
             v-bind:max-rating="5" 
             v-bind:round-start-rating="false"
             v-bind:show-rating="false"
             inactive-color="#b296c5" 
             active-color="#290740" 
             v-bind:star-size="15">
             </star-rating>
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
            <div class="panel-footer level" v-if="canUpdate">
                <button class="btn-sm btn mr-1 ml-1" @click="editing = true">Edit</button>
                <button class="btn-sm btn btn-danger mr-1" @click="destroy">Delete</button>
            </div>
        </div>
    </li>
</template>

<script>
 import chat from './chat.vue';
  export default {
    props: [ 'data' ],
    components: { chat },

    data() {
      return {
        editing: false,
        id: this.data.id,
        userid:this.data.user_id,
        jobid:this.data.job_id,
        message:'',
        amount: this.data.amount,
        body: this.data.body,
      };
    },

    computed: {
      userAvatar() {
        return this.data.user.avatar_path ? this.data.user.avatar_path : '/images/person-2.jpg';
      },

      canUpdate() {
        return this.authorize(user => this.data.owner.id == user.id);
      },

      canView() {
        return this.authorize(user => user.id == this.data.job.contractor_id);
      },
    },

    methods: {
      update() {
        axios.patch('/proposals/' + this.id, {
          body: this.body,
          amount: this.amount,
        });

        this.editing = false;
        flash('Your proposal has been updated');
      },

      destroy() {
        axios.delete('/proposals/' + this.id);

        this.$emit('deleted', this.id);

        flash('Your Proposal has been deleted');

//        $(this.$el).fadeOut(300, () => {
//          flash('Your Proposal has been deleted');
//        });

      },
      sendMsg() {
      axios.post('/chat',{params: {message: this.message,id:this.id,jobid:this.jobid,userid:this.userid}}).then(response=>{
      console.log(response.data);
      document.getElementById("msg").innerHTML = response.data.params.message;

      });
      }
    },
  };
</script>