export default {
    props:[],
    data: function() {
        return {
            orderId: 0,
        };
    },
    mounted: function () {
        this.getOrders();

        var self = this;
        $('#order-list').on('click', '.btn-remove', function() {
            self.orderId = $(this).attr('data');
            self.removeOrder();
        });
    },
    watch: {
        
    },
    methods: {
        getOrders: function(callback) {
            $('#order-list').dataTable({
                "destroy": true,
                "ajax": {
                    "url": '/internal/orders',
                    "dataSrc": function(json) {
                        let data = [];
                        json.orders.forEach(order => {
                            data.push([
                                order.id,
                                order.order_number,
                                order.buyer.name + '-' + order.buyer.id,
                                order.amount_charged,
                                order.destination.address_1 + ' ' + order.destination.address_2 + ' ' + order.destination.city + ' ' + order.destination.state + ' ' + order.destination.zip + ' ' + order.destination.country,
                                moment(order.created_at.date).format('YYYY-MM-DD'),
                                order.status,
                                ''
                            ]);
                        });

                        if (callback) {
                            callback();
                        }
                        
                        return data;
                    }
                },
                "order": [[ 0, 'desc' ]],
                "columnDefs": [{
                    targets: [7],
                    orderable: false,
                    searchable: false
                }],
                "createdRow": function (row, data, index) {
                    var statuses = {
                        0: ['Not Placed', 'warning'],
                        1: ['Placed', 'warning'],
                        2: ['Shipped', 'success'],
                        3: ['Delivered', 'info'],
                        4: ['Canceled', 'danger']
                    };
                    $('td', row).eq(3).html('').append(
                        numeral(data[3]).format('$0,0.00')
                    );
                    $('td', row).eq(6).html('').append(
                        '<span class="badge badge-outline-' + statuses[data[6]][1] + '">' + statuses[data[6]][0] + '</span>'
                      );
                    $('td', row).eq(7).addClass('text-nowrap').html('').append(
                        '<button type="button" class="btn btn-default btn-xs icon-btn md-btn-flat article-tooltip btn-remove" data="' + data[0] + '" title="Remove"><i class="ion ion-md-close"></i></button>'
                    );
                }
            });
        },
        removeOrder: function() {
            var self = this;
            bootbox.confirm({
                message: 'Are you sure remove this order?',
                className: 'bootbox-sm',
                callback: function(result) {
                    if (result) {
                        $('#order-list').block({
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
                        axios.delete('/internal/order/' + self.orderId)
                        .then((response) => {
                            self.getOrders(function() {
                                $('#order-list').unblock();
                            });
                        })
                        .catch((error) => {
                            $('#order-list').unblock();
                        });
                    }
                },
            });
        },
    }
}