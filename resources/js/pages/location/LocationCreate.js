export default {
    props: {
        location: {
            type: Object,
            default: function() {
                return {
                    location_name: '',
                    name: '',
                    email: '',
                    phone: '',
                    address_1: '',
                    address_2: '',
                    city: '',
                    state: '',
                    postal_code: '',
                };
            }
        }
    },
    data: function() {
        return {
            states: [
                {id:"AL", text:"Alabama", country: 'US'},
                {id:"AK", text:"Alaska", country: 'US'},
                {id:"AS", text:"American Samoa", country: 'US'},
                {id:"AZ", text:"Arizona", country: 'US'},
                {id:"AR", text:"Arkansas", country: 'US'},
                {id:"CA", text:"California", country: 'US'},
                {id:"CO", text:"Colorado", country: 'US'},
                {id:"CT", text:"Connecticut", country: 'US'},
                {id:"DE", text:"Delaware", country: 'US'},
                {id:"DC", text:"District Of Columbia", country: 'US'},
                {id:"FM", text:"Federated States Of Micronesia", country: 'US'},
                {id:"FL", text:"Florida", country: 'US'},
                {id:"GA", text:"Georgia", country: 'US'},
                {id:"GU", text:"Guam", country: 'US'},
                {id:"HI", text:"Hawaii", country: 'US'},
                {id:"ID", text:"Idaho", country: 'US'},
                {id:"IL", text:"Illinois", country: 'US'},
                {id:"IN", text:"Indiana", country: 'US'},
                {id:"IA", text:"Iowa", country: 'US'},
                {id:"KS", text:"Kansas", country: 'US'},
                {id:"KY", text:"Kentucky", country: 'US'},
                {id:"LA", text:"Louisiana", country: 'US'},
                {id:"ME", text:"Maine", country: 'US'},
                {id:"MH", text:"Marshall Islands", country: 'US'},
                {id:"MD", text:"Maryland", country: 'US'},
                {id:"MA", text:"Massachusetts", country: 'US'},
                {id:"MI", text:"Michigan", country: 'US'},
                {id:"MN", text:"Minnesota", country: 'US'},
                {id:"MS", text:"Mississippi", country: 'US'},
                {id:"MO", text:"Missouri", country: 'US'},
                {id:"MT", text:"Montana", country: 'US'},
                {id:"NE", text:"Nebraska", country: 'US'},
                {id:"NV", text:"Nevada", country: 'US'},
                {id:"NH", text:"New Hampshire", country: 'US'},
                {id:"NJ", text:"New Jersey", country: 'US'},
                {id:"NM", text:"New Mexico", country: 'US'},
                {id:"NY", text:"New York", country: 'US'},
                {id:"NC", text:"North Carolina", country: 'US'},
                {id:"ND", text:"North Dakota", country: 'US'},
                {id:"MP", text:"Northern Mariana Islands", country: 'US'},
                {id:"OH", text:"Ohio", country: 'US'},
                {id:"OK", text:"Oklahoma", country: 'US'},
                {id:"OR", text:"Oregon", country: 'US'},
                {id:"PW", text:"Palau", country: 'US'},
                {id:"PA", text:"Pennsylvania", country: 'US'},
                {id:"PR", text:"Puerto Rico", country: 'US'},
                {id:"RI", text:"Rhode Island", country: 'US'},
                {id:"SC", text:"South Carolina", country: 'US'},
                {id:"SD", text:"South Dakota", country: 'US'},
                {id:"TN", text:"Tennessee", country: 'US'},
                {id:"TX", text:"Texas", country: 'US'},
                {id:"UT", text:"Utah", country: 'US'},
                {id:"VT", text:"Vermont", country: 'US'},
                {id:"VI", text:"Virgin Islands", country: 'US'},
                {id:"VA", text:"Virginia", country: 'US'},
                {id:"WA", text:"Washington", country: 'US'},
                {id:"WV", text:"West Virginia", country: 'US'},
                {id:"WI", text:"Wisconsin", country: 'US'},
                {id:"WY", text:"Wyoming", country: 'US'}
            ]
        };
    },
    mounted: function () {
        this.initValidation();
    },
    watch: {
        
    },
    methods: {
        showToast: function(type, title, msg) {
            toastr[type](msg, title, {
                positionClass: 'toast-top-right',
                preventDuplicates: true,
                newestOnTop: true
              });
        },
        initValidation: function() {
            $('#validation-form').validate({
                rules: {
                    'input-location-name': {
                        required: true
                    },
                    'input-name': {
                        required: true
                    },
                    'input-email': {
                        required: true,
                        email: true
                    },
                    'input-phone': {
                        required: true
                    },
                    'input-address1': {
                        required: true
                    },
                    'input-city': {
                        required: true
                    },
                    'input-state': {
                        required: true
                    },
                    'input-zip': {
                        required: true
                    },
                },
                errorPlacement: function errorPlacement(error, element) {
                    var $parent = $(element).parents('.form-group');
                    if ($parent.find('.jquery-validation-error').length) { return; }
                    $parent.append(
                        error.addClass('jquery-validation-error small form-text invalid-feedback')
                    );
                },
                highlight: function(element) {
                    var $el = $(element);
                    $el.addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
                }
            });
        },
        save: function() {
            if (!$('#validation-form').valid()) {
                return;
            }

            $('#input-form').block({
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
            var ladda = Ladda.create(document.querySelector('.ladda-button'));
            ladda.start();

            var self = this;
            axios.post(
                '/internal/address', 
                this.location
            ).then((response) => {
                if (response.data.id) {
                    axios.post('/internal/location', {
                        address_id: response.data.id,
                        name: self.location.location_name
                    }).then((response) => {
                        $('#input-form').unblock();
                        ladda.stop();
                        window.history.go(-1);  
                    }).catch((error) => {
                        $('#input-form').unblock();
                        ladda.stop();
                    });
                } else {
                    $('#input-form').unblock();
                    ladda.stop();
                }
            }).catch((error) => {
                $('#input-form').unblock();
                ladda.stop();
                self.showToast('error', 'Error', 'Please input deliverable address.');
            });
        }
    }
}