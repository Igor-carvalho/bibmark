export default {
    props:[],
    data: function() {
        return {
            locationId: 0,
        };
    },
    mounted: function () {
        this.getLocations();

        var self = this;
        $('#location-list').on('click', '.btn-remove', function() {
            self.locationId = $(this).attr('data');
            self.removeLocation();
        });
    },
    watch: {
        
    },
    methods: {
        getLocations: function(callback) {
            $('#location-list').dataTable({
                "destroy": true,
                "ajax": {
                    url: '/internal/locations',
                    dataSrc: function(json) {
                        let data = [];
                        json.locations.forEach(location => {
                            data.push([
                                location.id,
                                location.location_name,
                                location.name,
                                location.email,
                                location.phone,
                                location.address_1,
                                location.address_2,
                                location.city,
                                location.state,
                                location.postal_code,
                                location.country,
                                moment(location.created_at.date).format('YYYY-MM-DD'),
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
                    targets: [12],
                    orderable: false,
                    searchable: false
                }],
                createdRow: function (row, data, index) {
                    var isRtl = $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl';
                    $('td', row).eq(1).html('').append(
                        '<a href="locations/' + data[0] + '">' + data[1] + '</a>'
                    );
                    $('td', row).eq(12).addClass('text-nowrap').html('').append(
                        '<button type="button" class="btn btn-default btn-xs icon-btn md-btn-flat article-tooltip btn-remove" data="' + data[0] + '" title="Remove"><i class="ion ion-md-close"></i></button>'
                    );
                }
            });
        },
        removeLocation: function() {
            var self = this;
            bootbox.confirm({
                message: 'Are you sure remove this location?',
                className: 'bootbox-sm',
                callback: function(result) {
                    if (result) {
                        $('#location-list').block({
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
                        axios.delete('/internal/location/' + self.locationId)
                        .then((response) => {
                            self.getLocations(function() {
                                $('#location-list').unblock();
                            });
                        })
                        .catch((error) => {
                            $('#location-list').unblock();
                        });
                    }
                },
            });
        }
    }
}