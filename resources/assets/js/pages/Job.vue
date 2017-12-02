<script>
  import Proposals from '../components/Proposals.vue';
  import NewProposal from '../components/NewProposal.vue';

  export default {
    props: [ 'initialProposalsCount' ],

    components: { Proposals, NewProposal },

    data() {
      return {
        proposalsCount: this.initialProposalsCount,
        showBidForm: false,
        bidButtonText: 'Bid',
      };
    },

    methods: {
      toggleBidForm() {
        this.showBidForm = !this.showBidForm;
        this.bidButtonText = this.showBidForm ? 'Cancel' : 'Bid';
      },
    },
  };
</script>