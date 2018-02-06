<template>
<div id="app">
<input class="form-control" name="location" type="text" v-model="query" v-on:keyup="autoCompletePlaces" id="searchLoc">
<div v-if="results.length">
   <ul class="list-group" id="searchResult">
          <a v-on:click="skillSelected(result)" v-for="result in results">
              <li class="list-group-item list-group-item-action">
                      {{ result }}
              </li>
          </a>
  
   </ul>
   </div>
</div>
</template>
<script>
export default{
 props:[ 'skillSet' ],
  data(){
   return {
    query: '',
    highlightedPosition: 0,
    skill:'',
    skillname:'',
    loading: false,
    deleteskill:'',
    skillList: [],
    results: [],
    skills:[]
   }
  },
  methods: {
   autoCompletePlaces(){
    this.results = [];
    if(this.query.length > 1){
     axios.get('https://maps.googleapis.com/maps/api/place/autocomplete/json',{params: {input: this.query,key:"AIzaSyDup0HaTwlqPCzO0e549NTKfWDloKUtjwA",components:"country:pk"}}).then(response => {
   //   console.log(response.data.predictions.length);
      var i;
      this.results=[];
      for(i=0 ; i< response.data.predictions.length;i++)
      {
        //    console.log(response.data.predictions[i].description);
            this.results.push(response.data.predictions[i].description);
            }

     });
    }
    },
    removeSkill( index,skill ){
    axios.post('/skill/delete/'+skill.name).then( response=> {
          this.skillList.splice(index, 1);
   });
    },
    skillSelected(result){
    document.getElementById('searchResult').style.display="none";
  //  this.loading= true;
  //  axios.get('/skill/store',{params: {skill:result.id,skillname:result.name}}).then(response => {
   // this.loading= false;
   // this.skillList.push(response.data.skill);
   // });
   document.getElementById("searchLoc").value = result;
    }
  
  }
 }
</script>