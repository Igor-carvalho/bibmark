export default {
    props:[],
    data: function() {
        return {
            eventId: 0,
        };
    },
    mounted: function () {
        this.getEvents();

        var self = this;
        $('#event-list').on('click', '.btn-remove', function() {
            self.eventId = $(this).attr('data');
            self.removeEvent();
        });
    },
    watch: {
        
    },
    methods: {
        getEvents: function(callback) {
            $('#event-list').dataTable({
                "destroy": true,
                "ajax": {
                    url: '/internal/events',
                    dataSrc: function(json) {
                        let data = [];
                        json.events.forEach(event => {
                            data.push([
                                event.id,
                                event.name,
                                event.rev_share,
                                event.balance,
                                moment(event.created_at.date).format('YYYY-MM-DD'),
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
                createdRow: function (row, data, index) {
                    var isRtl = $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl';
                    $('td', row).eq(1).html('').append(
                        '<a href="events/' + data[0] + '">' + data[1] + '</a>'
                    );                    
                    $('td', row).eq(5).addClass('text-center text-nowrap').html('').append(
                    '<button type="button" class="btn btn-default btn-xs icon-btn md-btn-flat user-tooltip" title="Edit" onclick="window.location=\'events/' + data[0] + '/edit\'"><i class="ion ion-md-create"></i></button>&nbsp;&nbsp;' +
                    '<div class="btn-group">' +
                        '<button type="button" class="btn btn-default btn-xs icon-btn md-btn-flat dropdown-toggle hide-arrow user-tooltip" title="Actions" data-toggle="dropdown"><i class="ion ion-ios-settings"></i></button>' +
                        '<div class="dropdown-menu' + (isRtl ? '' : ' dropdown-menu-right') + '">' +
                        '<a class="dropdown-item" href="events/' + data[0] + '">View event</a>' +
                        '<a class="dropdown-item btn-remove" href="javascript:void(0)" data="' + data[0] + '">Remove</a>' +
                        '</div>' +
                    '</div>'
                    );
                }
            });
        },
        removeEvent: function() {
            var self = this;
            bootbox.confirm({
                message: 'Are you sure remove this event?',
                className: 'bootbox-sm',
                callback: function(result) {
                    if (result) {
                        $('#event-list').block({
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
                        axios.delete('/internal/event/' + self.eventId)
                        .then((response) => {
                            self.getEvents(function() {
                                $('#event-list').unblock();
                            });
                        })
                        .catch((error) => {
                            $('#event-list').unblock();
                        });
                    }
                },
            });
        }
    }
}