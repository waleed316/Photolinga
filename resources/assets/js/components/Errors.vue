<template>
    <sweet-modal ref="errors_modal" icon="error" title="Oh No...">
        <ul class="alert alert-danger">
            <li v-for="item in this.errors" v-text="item"></li>
        </ul>
        <button slot="button" class="btn btn-danger" @click="$refs.errors_modal.close()">Got it</button>
    </sweet-modal>
</template>

<script>
  export default {
    props: [ 'errors' ],

    data() {
      return {};
    },

    computed: {
      showModal() {
        if ( Object.keys(this.errors).length ) {
          this.$refs.errors_modal.open();
        }
      },
    },

    mounted() {
      console.log(this.errors.avatar);
      if ( this.showModal ) {
        this.$refs.errors_modal.open();
      }
    },

  };
</script>
