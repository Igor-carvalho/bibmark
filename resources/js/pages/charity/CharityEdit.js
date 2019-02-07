export default {
    props: {
        charity: {
            type: Object,
            default: function() {
                return {
                    name: '',
                    logo: '',
                    background_image: ''
                };
            }
        }
    },
    data: function() {
        return {
            logo: null,
            background: null,
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
                    'input-name': {
                        required: true
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
        selectLogo: function() {
            this.logo = this.$refs.file1.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#logo-image').attr('src', e.target.result);
            };
            reader.readAsDataURL(this.logo);
        },
        selectBackground: function() {
            this.background = this.$refs.file2.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#background-image').attr('src', e.target.result);
            };
            reader.readAsDataURL(this.background);
        },
        checkImage: function(file, id) {
            if (!file.type.match('image.*')) {
                this.showToast('error', 'Invalid File Type','Please upload files with extension png, jpg, gif or jpeg');
                $(id).val('');
                return false;
            }
            if(file.size > 500 * 1024 * 1024) {
                this.showToast('error', 'File Too Large', 'The file you are uploading is too large');
                $(id).val('');
                return false;
            }

            return true;
        },
        uploadImage: function(type, file, id, callback) {
            if (file && this.checkImage(file, id)) {
                let formData = new FormData();
                formData.append('image', file);
                formData.append('type', type);
                axios.post('/internal/image/upload', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then((response) => {
                    console.log(response.data.url);
                    callback(true, response.data.url);
                }).catch((error) => {
                    callback(false, null);
                });
            }
        },
        uploadLogo: function(callback) {
            if (this.logo) {
                var self = this;
                this.uploadImage('profile', this.logo, '#logo-input', function(success, url) {
                    if (success) {
                        self.charity.logo = url;
                    } else {
                        self.showToast('error', 'Upload Failed', 'Unable to upload logo image.');
                    }
                    callback(success);
                });
            } else {
                callback(true);
            }
        },
        uploadBackground: function(callback) {
            if (this.background) {
                var self = this;
                this.uploadImage('profile', this.background, '#background-input', function(success, url) {
                    if (success) {
                        self.charity.background_image = url;
                    } else {
                        self.showToast('error', 'Upload Failed', 'Unable to upload background image.');
                    }
                    callback(success);
                });
            } else {
                callback(true);
            }
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
            this.uploadLogo(function(success) {
                if (success) {
                    self.uploadBackground(function(success) {
                        if (success) {
                            axios.post('/internal/charity', self.charity)
                                .then((response) => {
                                    $('#input-form').unblock();
                                    ladda.stop();
                                    window.history.go(-1);
                                    
                                })
                                .catch((error) => {
                                    $('#input-form').unblock();
                                    ladda.stop();
                                });
                        } else {
                            $('#input-form').unblock();
                            ladda.stop();
                        }
                    });
                } else {
                    $('#input-form').unblock();
                    ladda.stop();
                }
            });
        }
    }
}