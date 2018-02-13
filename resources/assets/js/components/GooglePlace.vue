<template>
<div>
<div class="input-group input-group-lg input-search animated rotateInUpRight" v-if="landing">
  <input name="location" type="text" class="form-control"
                                           placeholder="Search by Location ..." v-on:keyup="autoCompletePlaces" v-model="query" id="Loc">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary btn-search" type="submit">Search</button>
                                        </span>
                                        </div> 
<div class="input-group form-search" v-else>
                            <input type="text" name="location" class="form-control navbar-search"
                                   placeholder="Search by Location" v-on:keyup="autoCompletePlaces" v-model="query" id="Loc">
                            <span class="input-group-btn">
    <button class="btn btn-secondary navbar-search-btn" type="submit">
    <svg version="1.1" id="Capa_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
         y="0px"
         viewBox="0 0 451 451" style="enable-background:new 0 0 451 451;" xml:space="preserve">
    <g>
    <path d="M447.05,428l-109.6-109.6c29.4-33.8,47.2-77.9,47.2-126.1C384.65,86.2,298.35,0,192.35,0C86.25,0,0.05,86.3,0.05,192.3s86.3,192.3,192.3,192.3c48.2,0,92.3-17.8,126.1-47.2L428.05,447c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4C452.25,441.8,452.25,433.2,447.05,428z M26.95,192.3c0-91.2,74.2-165.3,165.3-165.3c91.2,0,165.3,74.2,165.3,165.3s-74.1,165.4-165.3,165.4C101.15,357.7,26.95,283.5,26.95,192.3z"
    />
    </g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    </svg>
    </button>
    </span>
   </div>
                    
                        <ul v-show="loading" class="list-group" style="display:block;">
                   <li class="list-group-item list-group-item-action"> <i class="fa fa-spinner fa-spin"></i></li>

                   </ul>

   <div v-if="results.length" style="display:inline;">
   <ul class="list-group" id="searchResult">
          <a v-on:click="skillSelected(result)" v-for="(result in results">
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
 props:[ 'skillSet','landing' ],
  data(){
   return {
    query: '',
    skill:'',
    skillname:'',
    loading: false,
    skillList: [],
    results: [],
    skills:[]
   }
  },
  methods: {
   autoCompletePlaces(){
    this.results = [];
    this.loading=true;
    if(this.query.length < 1)
    {
    this.loading=false;
    }
    if(this.query.length > 1){
     axios.get('https://maps.googleapis.com/maps/api/place/autocomplete/json',{params: {input: this.query,key:"AIzaSyDup0HaTwlqPCzO0e549NTKfWDloKUtjwA",components:"country:pk"}}).then(response => {
   //   console.log(response.data.predictions.length);
   this.loading=false;
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
    skillSelected(result){
    document.getElementById('searchResult').style.display="none";
    document.getElementById("Loc").value = result;
    },
    
  }
 }
</script>