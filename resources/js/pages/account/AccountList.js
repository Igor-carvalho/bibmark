export default {
    props:[],
    data: function() {
        return {
            accountId: 0,
        };
    },
    mounted: function () {
        this.getAccounts();

        var self = this;
        $('#account-list').on('click', '.btn-remove', function() {
            self.accountId = $(this).attr('data');
            self.removeAccount();
        });
    },
    watch: {
        
    },
    methods: {
        getAccounts: function(callback) {
            $('#account-list').dataTable({
                "destroy": true,
                "ajax": {
                    url: '/internal/accounts',
                    dataSrc: function(json) {
                        let data = [];
                        json.accounts.forEach(account => {
                            data.push([
                                account.id,
                                account.name,
                                account.logo,
                                account.background_image,
                                account.balance,
                                account.budget,
                                moment(account.created_at.date).format('YYYY-MM-DD'),
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
                    targets: [2, 3, 7],
                    orderable: false,
                    searchable: false
                }],
                "createdRow": function(row, data, index) {
                    var isRtl = $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl';
                    $('td', row).eq(1).html('').append(
                        '<a href="accounts/' + data[0] + '">' + data[1] + '</a>'
                    );
                    if (data[2]) {
                        $('td', row).eq(2).html('').append(
                            '<img style="width: 80px; height: 80px; object-fit: contain;" src="' + data[2] + '" />'
                        );
                    }
                    if (data[3]) {
                        $('td', row).eq(3).html('').append(
                            '<img style="width: 80px; height: 80px; object-fit: contain;" src="' + data[3] + '" />'
                        );
                    }
                    $('td', row).eq(7).addClass('text-center text-nowrap').html('').append(
                    '<button type="button" class="btn btn-default btn-xs icon-btn md-btn-flat user-tooltip" title="Edit" onclick="window.location=\'accounts/' + data[0] + '/edit\'"><i class="ion ion-md-create"></i></button>&nbsp;&nbsp;' +
                    '<div class="btn-group">' +
                        '<button type="button" class="btn btn-default btn-xs icon-btn md-btn-flat dropdown-toggle hide-arrow user-tooltip" title="Actions" data-toggle="dropdown"><i class="ion ion-ios-settings"></i></button>' +
                        '<div class="dropdown-menu' + (isRtl ? '' : ' dropdown-menu-right') + '">' +
                        '<a class="dropdown-item" href="accounts/' + data[0] + '">View account</a>' +
                        '<a class="dropdown-item btn-remove" href="javascript:void(0)" data="' + data[0] + '">Remove</a>' +
                        '</div>' +
                    '</div>'
                    );
                }
            });
        },
        removeAccount: function() {
            var self = this;
            bootbox.confirm({
                message: 'Are you sure remove this account?',
                className: 'bootbox-sm',
                callback: function(result) {
                    if (result) {
                        $('#account-list').block({
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
                        axios.delete('/internal/account/' + self.accountId)
                        .then((response) => {
                            self.getAccounts(function() {
                                $('#account-list').unblock();
                            });
                        })
                        .catch((error) => {
                            $('#account-list').unblock();
                        });
                    }
                },
            });
        }
    }
}