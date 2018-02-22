<template>
<div>
 <div class="chatbox" :id=id>
           <div class="header">
                <p class="chat-name mb-0" onclick="maximize(this)"><i class="fa fa-circle mr-1"></i> {{chating[0]['name']}}</p>
                <div class="buttons">
                    <a onclick="minimize(this)"  class="minimize"><i class="fa fa-window-minimize"></i></a>
                    <a onclick="closewindow(this)" class="close"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="hidden-body">
                <div class="project-name"><a href="#" class="project-hyperlink">{{chating[0]['project']}}</a></div>
                <div class="body" id="chat_body">
                  <div v-for="chat in chating">
                    <div :class=chat.id>

                       <img :src="chat.avatar" alt="" class="chat-img" v-if="chat.avatar">

                        <img src="/images/person-2.jpg" alt="" class="chat-img" v-else><span class="badge badge-default" :class=chat.class>{{chat.message}}</span>
                    </div> 
                    </div>
                    <div class="chatting">
                        <div class="form-group mb-0">
                            <textarea id="send_chat" style="resize:none"  v-model="message">
                            </textarea>

                            <button class="btn btn-danger" v-on:click="sendMsg" id="snd">Send</button>
                        </div>
                </div>
                </div>
            </div>
        </div> 


                        <!--<a href="#" class="btn-sm viev-all"  data-toggle="modal" data-target="#exampleModal">
                        Chat
                        </a>-->
</div>
</template>
<script>
 export default {

    props: ['id'],
    data() {
      return {
      message:'',
      edit:false,
      chating:[]
      };
    },
    mounted(){
    axios.get('/chatWithId',{params: {id:this.id}}).then(response => {
    console.log(response.data);
      this.chating=[];
      this.chating = response.data;
      setInterval(this.realTime, 15000); 


     });
    },
    methods: {
    realTime(){
    axios.get('/chatWithId',{params: {id:this.id}}).then(response => {
    //console.log(response.data);
      this.chating=[];
      this.chating = response.data;
     });

    },
    markRead(){
    axios.get('/markRead',{params: {id:this.id}}).then(response => {
    console.log("From Mark read");
    console.log(response.data);
    });
    },
      sendMsg() {
       this.message= this.message.trim();
      if(this.message.length > 0)
      {
      axios.post('/chat',{params: {message: this.message,id:this.id}}).then(response=>{
      this.markRead();
      console.log(response.data);
      this.chating.push({message:this.message,class:'user2',id:'user'});      
      this.message='';
      });
      }
      },
    }
   
  };
</script>