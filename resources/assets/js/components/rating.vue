<template>
<div>
<div class="modal fade" :id="'exampleModal-'+jobid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content rating-modal">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body m-0">
*Please give review
      
  <star-rating v-model="rating" 
                    v-bind:increment="0.5" 
             v-bind:max-rating="5" 
             v-bind:show-rating="false"
             inactive-color="#b296c5" 
             active-color="#2c004f" 
             v-bind:star-size="35" @rating-selected ="setRating">
</star-rating>
  <i  v-show="loading" class="fa fa-spinner fa-spin"></i>

<div v-if="rating == 0">
<button class="btn btn-update btn-sm" v-on:click="saveRating" data-dismiss="modal" disabled>Update</button>
</div>
<div v-else>
<button class="btn btn-update btn-sm" v-on:click="saveRating" data-dismiss="modal">Update</button>
</div>
 </div>
    </div>
  </div>
</div>

<div>
            <div v-if="freelancer"> 
               <div v-if="isComplete"> 
                  <button type="button" class="btn job-completed" data-toggle="modal" style="float: right;">
                           Completed
                    </button>
                    </div>
                    <div v-else>   
                    <button type="button" class="btn job-complete" data-toggle="modal" :data-target="'#exampleModal-'+jobid" style="float: right;" :id="'compModel-'+jobid">
                           {{ comp }}
                    </button>
                    </div> 
                    </div>
  </div>
</div>
</template>
<script>
 export default{
props:[ 'jobid' ],
data(){
return{
    ratings: 0,
    isComplete:'',
    loading:false,
    comp:'Mark as complete',
    freelancer:false,
    rating:0
    }
},
mounted(){
  axios.get('/jobcomplete',{params: {jobid: this.jobid}}).then(
    response =>
    {
  //  console.log(this.jobid);
  //  console.log(response.data[0].freelancerStatus);
   if(response.data[0].freelancerStatus == 'false')
    {
        this.freelancer=false;
    }
    else
    {
    this.freelancer=true;
            if(response.data[0].status == 'complete')
           { 
           this.isComplete=true;
           }
           else
           {
           this.isComplete=false;
           }
        }    });
  
},
methods: {
    setRating(rating){
      this.ratings= rating;
    },
    saveRating(){
    this.loading=true;
    axios.get('/saveRating',{params: {jobid: this.jobid,ratings:this.ratings}}).then(
    response => {
    this.loading=false;
    this.comp="Completed";
    document.getElementById("compModel-"+this.jobid).disabled=true;
    });
    }
  }
  }
</script>