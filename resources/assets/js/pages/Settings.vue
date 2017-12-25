<script>
  export default {
    props: [ 'contact_info','currentUser' ],

    data() {
      return {
        editing: false,
        showAccount: true,
        showSecurity: false,
        showNotifications: false,
        account: {
          name: this.currentUser.name,
          email: this.currentUser.email,
          skype: this.contact_info.skype,
          address: this.contact_info.address,
          contact_number: this.contact_info.contact_number,
          city: this.contact_info.city,
          country: this.contact_info.country,
        },
      };
    },

    mounted() {
      console.log('Logging settings account');
      console.log(this.account);
    },

    methods: {
      updateAccountSettings() {
        console.log(this.account);
        axios.patch('/settings/account', {
          'name': this.account.name,
          'email': this.account.email,
          'skype': this.account.skype,
          'address': this.account.address,
          'contact_number': this.account.contact_number,
          'city': this.account.city,
          'country': this.account.country,
        }).then(response => {
          console.log(response);
          flash('Account Setting updated.');
        }, err => {
          console.log('Logging error: ');
          console.error(err.response);
          flash('Error while processing request');
        });
      },
    },
  };
</script>