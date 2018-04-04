<script>
  export default {
    props: [ 'user', 'avatar' ],
    data() {
      return {
        description: this.user.description,
        editing: false,
        image: this.avatar,
        openModal: true,
      };
    },
    mounted() {
//      console.log(this.user);
    },
    methods: {
      onFileChange( e ) {
        var files = e.target.files || e.dataTransfer.files;
        if ( !files.length ) {
          return;
        }
        this.createImage(files[ 0 ]);
      },
      createImage( file ) {
        var image = new Image();
        var reader = new FileReader();
        var vm = this;

        reader.onload = ( e ) => {
          vm.image = e.target.result;
        };
        reader.readAsDataURL(file);
      },
      updateDescription() {
        if ( this.description == '' ) {
          flash('Description can not be empty','danger');
          return;
        }
        axios.patch('/profiles/' + this.user.id, { description: this.description }).then(response => {
          console.log(response);
          flash('Overview updated');
          this.editing = false;
        });
      },
      cancelEditing() {
        this.description = this.user.description;
        this.editing = false;
      },
      openPortfolioModal() {
        this.$refs.portfolio_modal.open();
      },
    },
  };
</script>