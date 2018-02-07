<template>
<div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     	<div v-for="chat in chating">
     	<div :id=chat.class>
     	<span> {{chat.time}} {{chat.sender}}:</span>
     	<p> {{chat.message}} </p>

     	</div>
     	<br>
     	<br>
     	</div>
            <input type="text" name="message" v-model="message">
            <button class="btn btn-primary" v-on:click="sendMsg">Send</button>

            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

                        <a href="#" class="btn-sm viev-all"  data-toggle="modal" data-target="#exampleModal">
                        Chat
                        </a>
</div>
</template>
<script>
 export default {

    props: [ 'userid','jobid' ],
    data() {
      return {
      message:'',
      id:'',
      edit:false,
      chating:[]
      };
    },
    mounted(){
    axios.get('/chatList',{params: {jobid: this.jobid,userid: this.userid}}).then(response => {
    console.log(response.data);
      this.chating = response.data;
    //  document.getElementById('right').style.float="right";
    //  document.getElementById('left').style.float="left";

     });
    },
    methods: {
      sendMsg() {
      axios.post('/chat',{params: {message: this.message,id:this.id,jobid:this.jobid,userid:this.userid}}).then(response=>{
      console.log(response.data);
      document.getElementById("msg").innerHTML = response.data.params.message;

      });
      }
    },
  };
</script>