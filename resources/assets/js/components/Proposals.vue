<template>
    <div>
        <div v-for="(proposal, index) in items">
            <proposal :data="proposal" @deleted="remove(index)" v-cloak></proposal>
        </div>
    </div>
</template>

<script>
  import Proposal from './Proposal.vue';

  export default {
    props: [ 'proposals' ],
    components: { Proposal },

    data() {
      return {
        items: this.proposals,
      };
    },

    methods: {
      remove( index ) {
        console.log('Removing item at index ' + index);
        this.items.splice(index, 1);

        this.$emit('removed');
      },
    },
  };
</script>