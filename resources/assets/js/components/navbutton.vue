<template>
<div>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Message<span class="badge badge-info">{{navList[0].allUnread}}</span></a>
    <div class="dropdown-menu dropdown-menu-zero-padding dropdown-menu-message-padding">
        <h5 class="dropdown-heading">Messages</h5>
    
        <table class="table table-responsive table-hover" style="padding:5px 20px 0 20px;margin-bottom:0" >
            <tbody>
                <ul class="message-list">
                <div v-if="haveMsg">
                     <li v-for="list in navList">
                                        <tr>
                                            <td class="img-top-padding"><a href="#" class="message-anchor"><img src="images/person-2.jpg" alt="" class="message-profile"></a></td>
                                            <td>
                                                <a href="#" v-on:click="display(list.id)" :data-id=list.id class="message-anchor">

                                                    <h6 class="message-head">{{list.name}}<span class="badge badge-info">{{list.unread}}</span></h6>
                                                   
                                                </a>    
                                            </td>
                                            <TD class="message-hidden"></TD>
                                        </tr>
                                    </li>
                                    </div>
                                 
                                    <div v-else>
                                    <li>
                                    No messages
                                    </li>
                                    </div>
                </ul>
            </tbody>
        </table>
         
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
      haveMsg:true,
      navList:[],
      chating:[],
      chats:[],
      };
    },

    mounted(){
    axios.get('/navList').then(response => {
    // console.log("response Data");

    // console.log(response.data[0].hasOwnProperty('id'));
    if(response.data[0].hasOwnProperty('id'))
     {
     this.haveMsg=true;
     this.navList=response.data;
     this.chats=response.data;
     console.log("NavList");
    console.log(this.navList);
    this.unread=this.navList[0].allUnread;
    console.log("Chat");
    console.log(this.chats);
    }
   else
    {    
    this.haveMsg=false;
    console.log(response.data[0].allUnread);
    this.unread=response.data[0].allUnread;
    console.log(this.haveMsg);
    }
    });
    
     },
    methods: {
 
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