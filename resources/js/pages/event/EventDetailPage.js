export default {
    props: {
        eventId: {
            type: Number,
            required: true
        }
    },
    data: function() {
        return {
            name: '',
            errors: [],
            isLoaded: false
        };
    },
    mounted: function () {
        this.getEventDetails(this.eventId);
    },
    watch: {

    },
    methods: {
        getEventDetails(id) {
            $('.profile-picture').block({
                message: '<div style="border-radius: 50px;"><div class="sk-fading-circle"><div class="sk-circle1 sk-circle"></div><div class="sk-circle2 sk-circle"></div><div class="sk-circle3 sk-circle"></div><div class="sk-circle4 sk-circle"></div><div class="sk-circle5 sk-circle"></div><div class="sk-circle6 sk-circle"></div><div class="sk-circle7 sk-circle"></div><div class="sk-circle8 sk-circle"></div><div class="sk-circle9 sk-circle"></div><div class="sk-circle10 sk-circle"></div><div class="sk-circle11 sk-circle"></div><div class="sk-circle12 sk-circle"></div></div></div>',
                css: {
                    backgroundColor: 'transparent',
                    border: '0'
                },
                overlayCSS:  {
                    backgroundColor: 'black',
                    opacity: 0.8,
                    'border-radius': '50%'
                }
            });
            $('.profile-banner').block({
                message: '<div class="sk-fading-circle"><div class="sk-circle1 sk-circle"></div><div class="sk-circle2 sk-circle"></div><div class="sk-circle3 sk-circle"></div><div class="sk-circle4 sk-circle"></div><div class="sk-circle5 sk-circle"></div><div class="sk-circle6 sk-circle"></div><div class="sk-circle7 sk-circle"></div><div class="sk-circle8 sk-circle"></div><div class="sk-circle9 sk-circle"></div><div class="sk-circle10 sk-circle"></div><div class="sk-circle11 sk-circle"></div><div class="sk-circle12 sk-circle"></div></div>',
                css: {
                    backgroundColor: 'transparent',
                    border: '0'
                },
                overlayCSS:  {
                    backgroundColor: 'black',
                    opacity: 0.8
                }
            });
            axios.get('/internal/event/'+id)
                .then(response => {
                    console.log(response.data);
                    this.name = response.data.name;
                    this.isLoaded = true;
                    $('#dummy').ready(function() {
                        $('.profile-picture').unblock();
                        $('.profile-banner').unblock();
                    });
                    $('h1>input').unblock();
                })
                .catch(error => {
                    console.log(error.response);
                    this.isLoaded = true;
                    $('#main').unblock();
                    $('.profile-picture').unblock();
                    $('.profile-banner').unblock();
                    $('h1>input').unblock();
                })
        },
        updateEventDetails() {
            let formData = new FormData();
            formData.append('id', this.eventId);
            formData.append('name', this.name);

            window.axios.post('/internal/event', formData)
                .then(response => {
                    console.log(response.data);
                    this.errors = [];
                    this.getEventDetails(this.eventId);
                    $('#main').unblock();
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    console.log(error.response);
                    $('#main').unblock();
                });
        },
        allowChangeName() {
            this.updateEventDetails();
            $('#closeBtn').click();
        }

    }
}