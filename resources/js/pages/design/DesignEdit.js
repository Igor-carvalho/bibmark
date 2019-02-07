export default {
    props: {
        design: {
            type: Object,
            default: function() {
                return {
                    name: '',
                    exported_file: '',
                };
            }
        }
    },
    data: function() {
        return {
            exported_file: null,
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
                    'input-exported-file': {
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
        selectExportedFile: function() {
            this.exported_file = this.$refs.file1.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#exported-file').attr('src', e.target.result);
            };
            reader.readAsDataURL(this.exported_file);
        },
        checkFile: function(file, id) {
            if(file.size > 500 * 1024 * 1024) {
                this.showToast('error', 'File Too Large', 'The file you are uploading is too large');
                $(id).val('');
                return false;
            }

            return true;
        },
        uploadFile: function(file, id, callback) {
            if (file && this.checkFile(file, id)) {
                let formData = new FormData();
                formData.append('file', file);
                axios.post('/internal/design/upload', formData, {
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
        uploadExportedFile: function(callback) {
            if (this.exported_file) {
                var self = this;
                this.uploadFile(this.exported_file, '#exported-file-input', function(success, url) {
                    if (success) {
                        self.design.exported_file = url;
                    } else {
                        self.showToast('error', 'Upload Failed', 'Unable to upload exported file.');
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
            this.uploadExportedFile(function(success) {
                if (success) {
                    axios.post(
                        '/internal/design', 
                        self.design
                    ).then((response) => {
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
            });
        }
    }
}