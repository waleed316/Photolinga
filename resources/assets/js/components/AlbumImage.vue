<template v-cloak>
<div>
<div v-for="(Images, index) in AlbumImage" class="upload-box">
<a id="dd" href="#" data-toggle="tooltip" data-placement="top" title="Delete">
    <i class="fa fa-times" v-on:click="removeImage(index,Images)"></i>
  </a>
<img  :src="'../storage/Uploads/'+Images.path" class="img-fluid portfolio-imgages" alt="" v-on:click="removeImage(index,Images)">
</div>
</div>
</template>
<script>
 export default{
 props:[ 'albumid' ],
  data(){
   return {
   AlbumImage:[],
   }
  },
  mounted(){
   axios.get('/album/show/'+this.albumid).then(
    response => {
    console.log('from album response');
    console.log(response.data);
    this.AlbumImage=response.data;
    });
 },
  methods: {
    removeImage( index,image ){
    axios.post('/remove/image',{param:{name:image.path}}).then( response=> {
      this.AlbumImage.splice(index, 1);
   });
    }
    }
 }
</script>