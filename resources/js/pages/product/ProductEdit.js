export default {
    props: {
        product: {
            type: Object,
            default: function() {
                return {
                    name: '',
                    description: '',
                    image: '',
                    price: '',
                };
            }
        }
    },
    data: function() {
        return {
            image: null,
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
                    },
                    'input-description': {
                        required: true
                    },
                    'input-price': {
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
        selectImage: function() {
            this.image = this.$refs.file1.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#product-image').attr('src', e.target.result);
            };
            reader.readAsDataURL(this.image);
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
                    callback(true, response.data.url);
                }).catch((error) => {
                    callback(false, null);
                });
            }
        },
        uploadProductImage: function(callback) {
            if (this.image) {
                var self = this;
                this.uploadImage('profile', this.image, '#image-input', function(success, url) {
                    if (success) {
                        self.product.image = url;
                    } else {
                        self.showToast('error', 'Upload Failed', 'Unable to upload product image.');
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

            console.log(this.product);
            var self = this;
            this.uploadProductImage(function(success) {
                if (success) {
                    axios.post('/internal/product', self.product)
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
        }
    }
}