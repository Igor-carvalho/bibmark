export default {
    props:[],
    data: function() {
        return {
            charityId: 0,
        };
    },
    mounted: function () {
        this.getCharities();

        var self = this;
        $('#charity-list').on('click', '.btn-remove', function() {
            self.charityId = $(this).attr('data');
            self.removeCharity();
        });
    },
    watch: {
        
    },
    methods: {
        getCharities: function(callback) {
            $('#charity-list').dataTable({
                "destroy": true,
                "ajax": {
                    url: '/internal/charities',
                    dataSrc: function(json) {
                        let data = [];
                        json.charities.forEach(charity => {
                            data.push([
                                charity.id,
                                charity.name,
                                charity.logo,
                                charity.background_image,
                                charity.balance,
                                moment(charity.created_at.date).format('YYYY-MM-DD'),
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
                    targets: [2, 3, 6],
                    orderable: false,
                    searchable: false
                }],
                "createdRow": function (row, data, index) {
                    var isRtl = $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl';
                    $('td', row).eq(1).html('').append(
                        '<a href="charities/' + data[0] + '">' + data[1] + '</a>'
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
                    $('td', row).eq(6).addClass('text-center text-nowrap').html('').append(
                    '<button type="button" class="btn btn-default btn-xs icon-btn md-btn-flat user-tooltip" title="Edit" onclick="window.location=\'charities/' + data[0] + '/edit\'"><i class="ion ion-md-create"></i></button>&nbsp;&nbsp;' +
                    '<div class="btn-group">' +
                        '<button type="button" class="btn btn-default btn-xs icon-btn md-btn-flat dropdown-toggle hide-arrow user-tooltip" title="Actions" data-toggle="dropdown"><i class="ion ion-ios-settings"></i></button>' +
                        '<div class="dropdown-menu' + (isRtl ? '' : ' dropdown-menu-right') + '">' +
                        '<a class="dropdown-item" href="charities/' + data[0] + '">View charity</a>' +
                        '<a class="dropdown-item btn-remove" href="javascript:void(0)" data="' + data[0] + '">Remove</a>' +
                        '</div>' +
                    '</div>'
                    );
                }
            });
        },
        removeCharity: function() {
            var self = this;
            bootbox.confirm({
                message: 'Are you sure remove this charity?',
                className: 'bootbox-sm',
                callback: function(result) {
                    if (result) {
                        $('#charity-list').block({
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
                        axios.delete('/internal/charity/' + self.charityId)
                        .then((response) => {
                            self.getCharities(function() {
                                $('#charity-list').unblock();
                            });
                        })
                        .catch((error) => {
                            $('#charity-list').unblock();
                        });
                    }
                },
            });
        }
    }
}