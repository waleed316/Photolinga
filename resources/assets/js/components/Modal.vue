<template>
    <sweet-modal ref="modal" icon="error" title="Oh No...">
        <ul class="alert alert-danger">
            <!-- <li v-for="item in this.errors" v-text="item"></li> -->
        </ul>
        <button class="btn btn-danger" slot="button">Got it</button>
    </sweet-modal>
    <!--<transition name="modal">-->
    <!--<div class="modal-mask">-->
    <!--<div class="modal-wrapper">-->
    <!--<div class="modal-container">-->

    <!--<div class="modal-header">-->
    <!--<slot name="header">-->
    <!--default header-->
    <!--</slot>-->
    <!--</div>-->

    <!--<div class="modal-body">-->
    <!--<slot name="body">-->
    <!--default body-->
    <!--</slot>-->
    <!--</div>-->

    <!--<div class="modal-footer">-->
    <!--<slot name="footer">-->
    <!--default footer-->
    <!--<button class="modal-default-button" @click="$emit('close')">-->
    <!--OK-->
    <!--</button>-->
    <!--</slot>-->
    <!--</div>-->
    <!--</div>-->
    <!--</div>-->
    <!--</div>-->
    <!--</transition>-->
</template>
<script>
  export default {
    mounted(){
//      console.log(this.$refs.modal.open());
    }
  };
</script>