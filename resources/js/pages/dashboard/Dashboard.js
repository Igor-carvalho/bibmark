export default {
    name: "Dasboard",
    props: {
        isAdmin: {
            type: Number
        },
        userId: {
            type: Number
        }
    },
    data: function () {
        return {
            userAccounts: {},
            userCharities: {},
            userEvents: {},
            totalAccounts: {},
            totalCharities: {},
            totalEvents: {},
            totalUsers: {},
        };
    },
    mounted() {
        this.getUserProps(this.userId);
    },
    methods: {
        getUserProps(id) {
            axios.get('/internal/user/'+id+'/dashboard_achievements')
                .then(response => {
                    if (!this.isAdmin) {
                        this.userAccounts = JSON.parse(response.data.user_accounts);
                        this.userCharities = JSON.parse(response.data.user_charities);
                        this.userEvents = JSON.parse(response.data.user_events);

                        if (this.userAccounts.length === 1  && this.userCharities.length === 0 && this.userEvents.length === 0) {
                            window.location.replace('/dashboard/account/' + this.userAccounts[0].id + '/home');
                        } else if (this.userAccounts.length === 0 && this.userCharities.length === 1 && this.userEvents.length === 0) {
                            window.location='/dashboard/charity/'+ this.userAccounts[0].id +'/home';
                        } else if (this.userAccounts.length === 0 && this.userCharities.length === 0 && this.userEvents.length === 1) {
                            window.location='/dashboard/event/'+ this.userEvents[0].id +'/home';
                        }

                    } else {
                        this.totalAccounts = JSON.parse(response.data.total_accounts);
                        this.totalCharities = JSON.parse(response.data.total_charities);
                        this.totalEvents = JSON.parse(response.data.total_events);
                        this.totalUsers = JSON.parse(response.data.total_users);
                    }

                })
                .catch(errors => {
                     //console.log(errors.response);
                });

        }
    }
}