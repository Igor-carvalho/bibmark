export default {
    props: {
        accountId: {
            type: String
        },
        user: {
            type: Object,
            default: function() {
                return {
                    name: '',
                    email: '',
                    phone: '',
                };
            }
        }
    },
    data: function() {
        return {

        };
    },
    mounted: function() {
        this.initValidation();
    },
    watch: {
        
    },
    methods: {
        initValidation: function() {
            $('#validation-form').validate({
                rules: {
                    'input-name': {
                        required: true
                    },
                    'input-email': {
                        required: true,
                        email: true
                    }
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

            if (this.accountId) {
                this.user.account_id = this.accountId;
                axios.post(
                    '/internal/account/user', 
                    this.user
                ).then((response) => {
                    $('#input-form').unblock();
                    ladda.stop();
                    window.history.go(-1);
                }).catch((error) => {
                    $('#input-form').unblock();
                    ladda.stop();
                });
            } else {
                axios.post(
                    '/internal/user', 
                    this.user
                ).then((response) => {
                    $('#input-form').unblock();
                    ladda.stop();
                    window.history.go(-1);
                }).catch((error) => {
                    $('#input-form').unblock();
                    ladda.stop();
                });
            }

        }
    }
}