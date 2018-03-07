<script>

  export default{
 props:[ 'skillSet' ],
  data(){
   return {
    rating:0,
    loading: false,
    query: '',
    city:'',
    country:'',
    skill:'',
    skillname:'',
    deleteskill:'',
    Sloading: false,
    skillList: [],
    results: [],
    photographerList: [],
    keyword:[]
   }
  },
   mounted(){
   this.keyword.push('All');
   this.loading=true;
   axios.get('/allPhotographers').then(
    response => {
    this.loading=false;
    this.photographerList=response.data;
    });
  },
  methods: {
   autoComplete(){
   this.Sloading=true;
    this.results = [];
    if(this.query.length > 1){
     axios.get('/search/photographer',{params: {query: this.query}}).then(response => {
       this.Sloading=false;
      this.results = response.data;
     });
    }
    },
     removeSkill( index,skill ){
         this.keyword.splice(index, 1);
   },
   Photographer()
   {
   this.loading=true;
  this.photographerList=[];
   axios.get('/browsePhotographer',{params: {city: this.city,country: this.country,keyword:this.keyword,rating:this.rating}}).then(response => 
   {
   console.log(response.data);
       this.loading=false;
        this.photographerList=response.data;
   });
   },
    skillSelected(result){
    document.getElementById('searchResult').style.display="none";
    this.keyword.push(result.name);
    }
  }
  }
</script>