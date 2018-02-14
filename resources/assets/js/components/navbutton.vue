<template>
<div>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Message</a>
    <div class="dropdown-menu dropdown-menu-zero-padding dropdown-menu-message-padding">
        <h5 class="dropdown-heading">Messages</h5>
    
        <table class="table table-responsive table-hover" style="padding:5px 20px 0 20px;margin-bottom:0" >
            <tbody>
                <ul class="message-list">

                    <li v-for="list in navList">
           <a href="#" v-on:click="display(list.id)" :data-id=list.id>{{list.name}}</a>
           </li> 
                </ul>
            </tbody>
        </table>
         
    </div>
  </li>
  <div class="mycontainer">
  <div v-for="chat1 in chats">
  <chatnav :id=chat1.id></chatnav>
  <!-- <div v-for="chat1 in chats">
 <div :id=chat1.id class="chatbox">
              <div class="header">
                <p class="chat-name mb-0" onclick="maximize(this)"><i class="fa fa-circle mr-1 online-green"></i> User Name</p>
              <div class="buttons">
                    <a onclick="minimize(this)"  class="minimize"><i class="fa fa-window-minimize"></i></a>
                    <a onclick="closewindow(this)" class="close"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="hidden-body">
                 <div class="project-name"><a href="#" class="project-hyperlink">Proposal Id {{chat1.id}}</a></div>
                            <div class="body" id="chat_body">
                                 {{chat1.name}}
                                  <div v-for="chat in chating">
                               <div :class=chat.id>
                                    <span class=" badge badge-default" :class=chat.class>{{chat.message}} </span>
                                </div>
                               </div>
                               <div class="chatting">
                                    <div class="form-group mb-0">
                                      <textarea id="send_chat" style="resize:none" @keyup.enter="sendMsg" v-model="message"></textarea>
                                   </div>
                             </div>
                              </div>
                              </div>
                              </div>
  </div>
  </div>-->
  <!--<div v-for="chat1 in chats">
      //<div class="chatbox" :id=chat1.id>
        //   <div class="header">
          //      <p class="chat-name mb-0" onclick="maximize(this)"><i class="fa fa-circle mr-1 online-green"></i> {{chating[0]['name']}}</p>
            /    <div class="buttons">
             //       <a onclick="minimize(this)"  class="minimize"><i class="fa fa-window-minimize"></i></a>
               //     <a onclick="closewindow(this)" class="close"><i class="fa fa-times"></i></a>
                //</div>
          //  </div>
           // <div class="hidden-body">
             //    <div class="project-name"><a href="#" class="project-hyperlink">Project Name</a></div>
               //             <div class="body" id="chat_body">
                               
                 //              <div v-for="chat in chating">
                   //             <div :class=chat.id>
                     //               <span class=" badge badge-default" :class=chat.class>{{chat.message}} </span>
                       //         </div>
                         //       </div>
                           //     </div>
                           // <div class="chatting">
                             //       <div class="form-group mb-0">
                            //          <textarea id="send_chat" style="resize:none" @keyup.enter="sendMsg" v-model="message"></textarea>
                                //    </div>
                             </div>
                </div>
            </div>
          </div> 
      </div>         

                    <div>  
                  
                    
   </div>-->
  </div>
  </div>
  </div>
</template>
<script>
 export default {
    props: [ 'id'],
    data() {
      return {
      Vchat:false,
      navList:[],
      chating:[],
      chats:[],
      };
    },

    mounted(){
     axios.get('/navList').then(response => {
     this.navList=response.data;
     this.chats=response.data;
     console.log("NavList");
    console.log(this.navList);
    console.log("Chat");
    console.log(this.chats);

    });
   //  if(this.conversation_id > 0)
   // {
 //   console.log("mounted");
  //  console.log(this.id);
 //   axios.get('/chatWithId',{params: {id:this.id}}).then(response => {
  //  console.log(this.id);
   // console.log(response.data);
    //  this.chating=[];
  // this.chating = response.data;
   //  });
   // }
   // else
   //{
  //  axios.get('/chatWithId',{params: {id:this.id}}).then(response => {
  //  console.log(response.data);
   //   this.chating=[];
    //  this.chating = response.data;
   //  });
    // }
     },
    methods: {
  //  ShowConvo(abc)
  //  {
    //  display(abc);
    //  axios.get('/chatWithId',{params: {id:this.id}}).then(response => {
   // console.log(response.data);
    //  this.chating=[];
     // this.chating = response.data;
  //   });
  //  },
 display(id) {
   // var disp = ($(id).data('id'));
var disp=id;
    if ($.inArray(disp, box_id) === -1) {
        box_id.push(disp);
    } else {
        box_id = box_id.filter(item => item !== disp);
    }
    console.log(box_id);

    if (box_id.length == 1) {
        console.log("Array lenght 1");
        $('#' + disp).css({ 'display': 'block', 'right': '5%' });

    } else if (box_id.length == 2) {
        console.log("Array lenght 2");

        $('#' + disp).css({ 'display': 'block', 'right': '360px' });
    }
    else if (box_id.length == 3) {
        console.log("Array lenght 2");

        $('#' + disp).css({ 'display': 'block', 'right': '800px' });
    }
    console.log("disp value");

    console.log(disp);
     axios.get('/chatWithId',{params: {id:disp}}).then(response => {
   console.log(response.data);
      this.chating=[];
      this.chating = response.data;
    });
},

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