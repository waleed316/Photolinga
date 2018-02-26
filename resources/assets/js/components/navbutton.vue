<template>
<div>

    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Message<span class="badge badge-mess">{{unread}}</span></a>
    <div class="dropdown-menu dropdown-menu-zero-padding dropdown-menu-message-padding" >
        <h5 class="dropdown-heading">Messages</h5>
    
                <ul class="message-list">
                    <li v-for="list in navList">
                        <a href="#" v-on:click="display(list.id)" :data-id=list.id class="message-anchor">


                            <h6 class="message-head">{{list.name}}<span class="badge badge-message">{{list.unread}}</span></h6>
                            
                        </a>    
                    </li>
                        <li v-if="navList.length == 0">
                          <a href="#" class="message-anchor">
                                                 No new message
                                             </a>
                        </li>                    
                    
                </ul>
         
    </div>
  </li>
  <div class="mycontainer">
  <div v-for="chat1 in chats">
  <chatnav :id=chat1.id></chatnav>
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
      unread:'',
      navList:[],
      chating:[],
      chats:[],
      };
    },
   // created(){
   //     Event.$on('click',() => 
   //     this.userList()
    //    );
  //  },

    mounted(){
     this.userList();
   
     },
    methods: {
        userList(){
     axios.get('/navList').then(response => {
         if(response.data.length)
         {
             this.navList=response.data;
             this.chats=response.data;
             this.unread=this.navList[0].allUnread;
             console.log(this.navList);
         }
     });            

        },
 
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

        $('#' + disp).css({ 'display': 'block', 'right': '655px' });
    }
    console.log("disp value");

    console.log(disp);
   axios.get('/markRead',{params: {id:disp}}).then(response => {
    console.log("From Mark read");
    console.log(response.data);
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