export default {
    props: {
        accountId: {
            type: String
        }
    },
    data: function() {
        return {
            userId: 0,
            email: null,
        };
    },
    mounted: function () {
        if (this.accountId) {
            this.getUsersUnderAccount();
        } else {
            this.getAllUsers();
        }

        var self = this;
        $('#user-list').on('click', '.btn-remove', function() {
            self.userId = $(this).attr('data');
            self.removeUser();
        });
        $('#user-list').on('click', '.btn-reset-password', function() {
            self.email = $(this).attr('data');
            self.resetPassword();
        });
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
        getUsersUnderAccount: function(callback) {
            $('#user-list').dataTable({
                "destroy": true,
                "ajax": {
                    url: '/internal/account/' + this.accountId + '/users',
                    dataSrc: function(json) {
                        let data = [];
                        json.users.forEach(user => {
                            data.push([
                                user.id,
                                user.name,
                                user.email,
                                user.phone,
                                moment(user.created_at.date).format('YYYY-MM-DD'),
                                '',
                            ]);
                        });

                        if (callback) {
                            callback();
                        }
                        
                        return data;
                    }
                },
                "columnDefs": [{
                    targets: [5],
                    orderable: false,
                    searchable: false
                }],
                "createdRow": function (row, data, index) {
                    var isRtl = $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl';
                    $('td', row).eq(1).html('').append(
                        '<a href="users/' + data[0] + '">' + data[1] + '</a>'
                    );

                    $('td', row).eq(5).addClass('text-center text-nowrap').html('').append(
                    '<button type="button" class="btn btn-default btn-xs icon-btn md-btn-flat user-tooltip" title="Edit" onclick="window.location=\'users/' + data[0] + '/edit\'"><i class="ion ion-md-create"></i></button>&nbsp;&nbsp;' +
                    '<div class="btn-group">' +
                        '<button type="button" class="btn btn-default btn-xs icon-btn md-btn-flat dropdown-toggle hide-arrow user-tooltip" title="Actions" data-toggle="dropdown"><i class="ion ion-ios-settings"></i></button>' +
                        '<div class="dropdown-menu' + (isRtl ? '' : ' dropdown-menu-right') + '">' +
                        '<a class="dropdown-item" href="/' + data[0] + '">View user</a>' +
                        '<a class="dropdown-item btn-remove" href="javascript:void(0)" data="' + data[0] + '">Remove</a>' +
                        '<a class="dropdown-item btn-reset-password" href="javascript:void(0)" data="' + data[2] + '">Reset Password</a>' +
                        '</div>' +
                    '</div>'
                    );
                }
            });
        },
        getAllUsers: function(callback) {
            $('#user-list').dataTable({
                "destroy": true,
                "ajax": {
                    url: '/internal/users',
                    dataSrc: function(json) {
                        let data = [];
                        json.users.forEach(user => {
                            data.push([
                                user.id,
                                user.name,
                                user.email,
                                user.phone,
                                moment(user.created_at.date).format('YYYY-MM-DD'),
                                '',
                            ]);
                        });

                        if (callback) {
                            callback();
                        }
                        
                        return data;
                    }
                },
                "columnDefs": [{
                    targets: [5],
                    orderable: false,
                    searchable: false
                }],
                "createdRow": function (row, data, index) {
                    var isRtl = $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl';
                    $('td', row).eq(1).html('').append(
                        '<a href="users/' + data[0] + '">' + data[1] + '</a>'
                    );

                    $('td', row).eq(5).addClass('text-center text-nowrap').html('').append(
                    '<button type="button" class="btn btn-default btn-xs icon-btn md-btn-flat user-tooltip" title="Edit" onclick="window.location=\'users/' + data[0] + '/edit\'"><i class="ion ion-md-create"></i></button>&nbsp;&nbsp;' +
                    '<div class="btn-group">' +
                        '<button type="button" class="btn btn-default btn-xs icon-btn md-btn-flat dropdown-toggle hide-arrow user-tooltip" title="Actions" data-toggle="dropdown"><i class="ion ion-ios-settings"></i></button>' +
                        '<div class="dropdown-menu' + (isRtl ? '' : ' dropdown-menu-right') + '">' +
                        '<a class="dropdown-item" href="/' + data[0] + '">View user</a>' +
                        '<a class="dropdown-item btn-remove" href="javascript:void(0)" data="' + data[0] + '">Remove</a>' +
                        '<a class="dropdown-item btn-reset-password" href="javascript:void(0)" data="' + data[2] + '">Reset Password</a>' +
                        '</div>' +
                    '</div>'
                    );
                }
            });
        },
        removeUser: function() {
            var self = this;
            bootbox.confirm({
                message: 'Are you sure remove this user?',
                className: 'bootbox-sm',
                callback: function(result) {
                    if (result) {
                        $('#user-list').block({
                            message: '<div class="sk-wave sk-primary"><div class="sk-rect sk-rect1"></div> <div class="sk-rect sk-rect2"></div> <div class="sk-rect sk-rect3"></div> <div class="sk-rect sk-rect4"></div> <div class="sk-rect sk-rect5"></div></div>',
                            css: {
                                backgroundColor: 'transparent',
                                border: '0'
                            },
                            overlayCSS: {
                                backgroundColor: '#fff',
                                opacity: 0.8
                            }
                        });
                        axios.delete('/internal/user/' + self.userId)
                        .then((response) => {
                            if (self.accountId) {
                                self.getUsersUnderAccount(function() {
                                    $('#user-list').unblock();
                                });
                            } else {
                                self.getAllUsers(function() {
                                    $('#user-list').unblock();
                                });
                            }
                        })
                        .catch((error) => {
                            $('#user-list').unblock();
                        });
                    }
                },
            });
        },
        resetPassword: function() {
            $('#user-list').block({
                message: '<div class="sk-wave sk-primary"><div class="sk-rect sk-rect1"></div> <div class="sk-rect sk-rect2"></div> <div class="sk-rect sk-rect3"></div> <div class="sk-rect sk-rect4"></div> <div class="sk-rect sk-rect5"></div></div>',
                css: {
                    backgroundColor: 'transparent',
                    border: '0'
                },
                overlayCSS: {
                    backgroundColor: '#fff',
                    opacity: 0.8
                }
            });
            var self = this;
            axios.post('/internal/password/create', {
                email: this.email
            }).then((response) => {
                $('#user-list').unblock();
                self.showToast('success', 'Reset Password', 'We have sent an email successfully.');

            }).catch((error) => {
                $('#user-list').unblock();
                self.showToast('error', 'Reset Password', 'We have failed to send an email.');
            });
        },
    }
}