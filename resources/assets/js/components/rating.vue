<template>
<div>
  <star-rating v-model="rating" 
                    v-bind:increment="0.5" 
             v-bind:max-rating="5" 
             v-bind:show-rating="false"
             inactive-color="#b296c5" 
             active-color="#290740" 
             v-bind:star-size="20" @rating-selected ="setRating">
</star-rating>
  <i  v-show="loading" class="fa fa-spinner fa-spin"></i>

<div v-if="rating == 0">
<button class="btn btn-info" v-on:click="saveRating" data-dismiss="modal" disabled>Update</button>
</div>
<div v-else>
<button class="btn btn-info" v-on:click="saveRating" data-dismiss="modal">Update</button>
</div>
*Please give review
</div>
</template>
<script>
 export default{
props:[ 'jobid' ],
data(){
return{
    ratings: 0,
    loading:false,
    rating:0
    }
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
    });
   	}
  }
  }
</script>