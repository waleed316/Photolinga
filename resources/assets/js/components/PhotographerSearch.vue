<script>
  export default{
 props:[ 'skillSet' ],
  data(){
   return {
   
    query: '',
    city:'',
    country:'',
    skill:'',
    skillname:'',
    deleteskill:'',
    skillList: [],
    results: [],
    photographerList: [],
    keyword:[]
   }
  },
  methods: {
   autoComplete(){
    this.results = [];
    if(this.query.length > 1){
     axios.get('/search/photographer',{params: {query: this.query}}).then(response => {
      this.results = response.data;
     });
    }
    },
     removeSkill( index,skill ){
         this.keyword.splice(index, 1);
   },
   Photographer()
   {
   axios.get('/browsePhotographer',{params: {city: this.city,country: this.country,keyword:this.keyword}}).then(response => 
   {
        console.log("Before Photographer List");
        console.log(response.data);
        this.photographerList=[];
        this.photographerList.push(response.data);
        console.log("after srcipt");
        console.log(this.photographerList);
 //       this.$router.push('useless'); 
   });
   },
    skillSelected(result){
    document.getElementById('searchResult').style.display="none";
    console.log(result.name);
    this.keyword.push(result.name);
    }
  }
  }
</script>