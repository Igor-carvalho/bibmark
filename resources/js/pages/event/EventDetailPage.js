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
            isNameChange: false,
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
            $('#main').block({
                message: '<div class="sk-wave sk-primary"><div class="sk-rect sk-rect1"></div> <div class="sk-rect sk-rect2"></div> <div class="sk-rect sk-rect3"></div> <div class="sk-rect sk-rect4"></div> <div class="sk-rect sk-rect5"></div></div>',
                css: {
                    backgroundColor: 'transparent',
                    border: '0'
                },
                overlayCSS:  {
                    backgroundColor: '#fff',
                    opacity: 0.8
                }
            });
            axios.get('/internal/event/'+id)
                .then(response => {
                    console.log(response.data);
                    this.name = response.data.name;
                    this.isLoaded = true;
                    $('#main').unblock();
                })
                .catch(error => {
                    console.log(error.response);
                    this.isLoaded = true;
                    $('#main').unblock();
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
            if (!this.isNameChange) {
                this.isNameChange = true;
                $("h1>input").removeAttr("disabled").focus();
            } else {
                $("h1>input").prop("disabled", true);
                this.isNameChange = false;
                this.updateEventDetails();

            }

        }

    }
}