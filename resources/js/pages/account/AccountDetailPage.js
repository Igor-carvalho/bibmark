export default {
    props: {
        accountId: {
            type: Number,
            required: true
        }
    },
    data: function() {
        return {
            name: '',
            isNameChange: false,
            logo: '',
            background_image: '',
            image_to_change: '',
            errors: []
        };
    },
    mounted: function () {
        this.getAccountDetails(this.accountId);
    },
    watch: {

    },
    methods: {
        getAccountDetails(id) {
            axios.get('/internal/account/'+id)
                .then(response => {
                    console.log(response.data);
                    this.name = response.data.name;
                    this.logo = response.data.logo;
                    this.background_image = response.data.background_image;

                })
                .catch(error => {
                    console.log(error.response);
                })
        },
        browseExistsFileUpdate(type, id) {
            $("#"+type+id).click();
        },
        onExistsFileChanged(e, type) {
            if (e.target.files[0].type.match('image.*')){
                this.image_to_change = '';
                this.image_to_change = e.target.files[0];
                this.updateAwsImage(type);
            }

            console.log(e.target.files[0]);
        },
        updateAwsImage(type) {
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
            let formData = new FormData();
            formData.append('image', this.image_to_change);
            formData.append('type', 'profile');
            axios.post('/internal/image/upload', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then((response) => {
                console.log(response.data.url);
                this.updateAccountDetails(type, response.data.url);

            }).catch((error) => {
                console.log(error.response);
                $('#main').unblock();
            });
        },
        updateAccountDetails(type, url) {
            let formData = new FormData();
            formData.append('id', this.accountId);
            formData.append('name', this.name);
            if (type === 'logo'){
                formData.append( type , url);
                formData.append('background_image', this.background_image ? this.background_image : '');
            }else if(type === 'background_image') {
                formData.append( type , url);
                formData.append('logo', this.logo ? this.logo : '');
            }else {
                formData.append('logo', this.logo ? this.logo : '');
                formData.append('background_image', this.background_image ? this.background_image : '');
            }

            window.axios.post('/internal/account', formData)
                .then(response => {
                    console.log(response.data);
                    this.image_to_change = '';
                    this.errors = [];
                    this.getAccountDetails(this.accountId);
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
                $("h1>input").removeAttr("disabled");
                $("h1>input").focus();
            } else {
                $("h1>input").prop("disabled", true);
                this.isNameChange = false;
                this.updateAccountDetails(null, null);

            }

        }

    }
}