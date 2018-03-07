<template>

<div>
<div v-if="conversation_id > 0">

<a class="btn" id="chat" onclick="display(this)" :data-id=id>
<!--{{uName}}-->
View chat 
</a>
</div>
<div v-else>

<a class="btn-sm viev-all" id="chat" onclick="display(this)" :data-id=id v-on:click="markRead">
 Chat
</a>
</div>
<div class="mycontainer">
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
                  <div v-for="chat in chating" v-if="chating[0].id">
                  
                    <div :class=chat.id>
                      <img :src="chat.avatar" alt="" class="chat-img" v-if="chat.avatar">
                      <img src="/images/person-2.jpg" alt="" class="chat-img" v-else><span class="badge badge-default" :class=chat.class>{{chat.message}}</span>
                    </div> 
                  </div>
                </div>
                <div class="chatting">
                    <div class="form-group mb-0">
                        <textarea id="send_chat" style="resize:none"  v-model="message">
                        </textarea>
                        <button class="btn btn-danger" v-on:click="sendMsg" :id="'snd-'+id">Send</button>
                    </div>
                </div>
            </div>
        </div>


        <!--<a href="#" class="btn-sm viev-all"  data-toggle="modal" data-target="#exampleModal">
        Chat
        </a>-->
    </div>
    </div>
</template>
<script>
  export default {

    props: [ 'userid', 'jobid', 'id', 'conversation_id' ],
    data() {
      return {
        message: '',
        edit: false,
        chating: [],
      };
    },
    mounted() 
    {
        axios.get('/chatWithId', { params: { id: this.id } }).then(response => {
          this.chating = [];
          this.chating = response.data;
        });

      // if(this.chating.length > 0)
      //  {
      //  setInterval(this.realTimeChat, 15000); 

        //}
      
    },
    methods: {
      realTimeChat(){
         axios.get('/chatWithId',{params: {id:this.id}}).then(response => {
      this.chating=[];
      this.chating = response.data;
     });
      },
      markRead() {
        axios.get('/markRead', { params: { id: this.id } }).then(response => {
          console.log('From Mark read');
        });
      },
      sendMsg() {
        this.message = this.message.trim();
        if ( this.message.length > 0 ) {
          document.getElementById('snd-' + this.id).disabled = true;

          axios.post('/chat', { params: { message: this.message, id: this.id } }).then(response => {
            document.getElementById('snd-' + this.id).disabled = false;
            if (this.chating[0].hasOwnProperty('id')) 
            {
              this.chating.push({ message: this.message, class: 'user2', id: 'user' });
            }
            else
            {
                this.chating[0]['message']=this.message;
                this.chating[0]['class']='user2';
                this.chating[0]['id']='user';             
          //      Event.$emit('click');
            }
             this.message = '';
        setInterval(this.realTimeChat, 15000); 


          });
        }
      },
    },

  };
</script>