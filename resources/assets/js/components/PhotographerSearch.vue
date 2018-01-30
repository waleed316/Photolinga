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
    abc: '',
    skillList: [],
    results: [],
    photographerList: [],
    keyword:[]
   }
  },
   mounted(){
   this.keyword.push('All');
   axios.get('/allPhotographers').then(
    response => {
    console.log(response.data);
    this.photographerList=response.data;
    });
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
        //this.photographerList=[];
        this.photographerList=response.data;
        console.log("after srcipt");
        console.log(this.photographerList);
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