<template>
 <div id="app">
  <input type="text" placeholder="Skill" v-model="query" v-on:keyup="autoComplete" class="form-control">
  <div v-if="results.length">
   <ul class="list-group" id="searchResult">
          <a v-on:click="skillSelected(result)" v-for="result in results">
              <li class="list-group-item list-group-item-action">
                      {{ result.name }}
              </li>
          </a>
  
   </ul>

  </div>
   <div class="right-sec">
                    <p class="tags-required">
                    <i  v-show="loading" class="fa fa-spinner fa-spin"></i>
                   <div v-for="(skill, index) in skillList">
                       <a class="required-skills" v-on:click="removeSkill(index,skill)" >
                       {{skill.name}}<i class="fa fa-times" aria-hidden="true"></i>
                      </a>
                    </div>
                    </p>
                  </div>
    
 </div>
</template>
<script>
 export default{
 props:[ 'skillSet' ],
  data(){
   return {
   
    query: '',
    skill:'',
    skillname:'',
    loading: false,
    deleteskill:'',
    skillList: [],
    results: [],
    skills:[]
   }
  },
  mounted(){
   axios.get('/skillList').then(
    response => {
    console.log(response.data);
    this.skillList=response.data;
    });
  },
  methods: {
   autoComplete(){
    this.results = [];
    if(this.query.length > 1){
     axios.get('/search',{params: {query: this.query}}).then(response => {
      this.results = response.data;
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
    this.loading= true;
    axios.get('/skill/store',{params: {skill:result.id,skillname:result.name}}).then(response => {
    this.loading= false;
    this.skillList.push(response.data.skill);
    });
    }
  
  }
 }
</script>