<script>
  export default {

    data() {
      return {
        body: '',
        amount: 0,
      };
    },

    computed: {
      bidAmount() {
        return (this.amount * 1 + this.projectFee * 1);
      },
      projectFee() {
        return this.amount * 0.1;
      },
    },

  };
</script>