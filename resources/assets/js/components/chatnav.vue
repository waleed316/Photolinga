<template>
<div>
 <div class="chatbox" :id=id>
           <div class="header">
                <p class="chat-name mb-0" onclick="maximize(this)"><i class="fa fa-circle mr-1 online-green"></i> {{chating[0]['name']}}</p>
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
                        <img src="/images/person-2.jpg" alt="" class="chat-img"><span class="badge badge-default" :class=chat.class>{{chat.message}}</span>
                    </div> 
                    </div>
                    <div class="chatting">
                        <div class="form-group mb-0">
                            <textarea id="send_chat" style="resize:none" @keyup.enter="sendMsg" v-model="message">
                            </textarea>
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
    if(this.conversation_id > 0)
    {
    console.log("mounted");
    console.log(this.id);
    axios.get('/chatWithId',{params: {id:this.id}}).then(response => {
    console.log(this.id);
    console.log(response.data);
      this.chating=[];
      this.chating = response.data;
     });
    }
    else
    {
    axios.get('/chatWithId',{params: {id:this.id}}).then(response => {
    //console.log(response.data);
      this.chating=[];
      this.chating = response.data;
     });
     }
    },
    methods: {
    markRead(){
        console.log("Mark convo read");
    },
      sendMsg() {
      axios.post('/chat',{params: {message: this.message,id:this.id}}).then(response=>{
      console.log(response.data);
      this.chating.push({message:this.message,class:'user2',id:'user'});      
    //  event(new SendMessage(this.response.data));
      this.message='';
    //  document.getElementById("msg").innerHTML = response.data.params.message;

      });
      }
    }
   
  };
</script>