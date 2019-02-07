export default {
    props:[],
    data: function() {
        return {
            productId: 0,
        };
    },
    mounted: function () {
        this.getProducts();

        var self = this;
        $('#product-list').on('click', '.btn-remove', function() {
            self.productId = $(this).attr('data');
            self.removeProduct();
        });
        $('#product-list').on('change', '.switcher-input', function() {
            var productId = $(this).attr('data');
            var isAvailable = $(this).prop('checked');
            self.updateAvailability(productId, isAvailable);
        });
    },
    watch: {
        
    },
    methods: {
        getProducts: function(callback) {
            $('#product-list').dataTable({
                "destroy": true,
                "ajax": {
                    "url": '/internal/products',
                    "dataSrc": function(json) {
                        let data = [];
                        json.products.forEach(product => {
                            data.push([
                                product.image,
                                product.name,
                                product.id,
                                product.price,
                                product.slug,
                                product.is_available,
                                moment(product.created_at.date).format('YYYY-MM-DD'),
                                ''
                            ]);
                        });

                        if (callback) {
                            callback();
                        }
                        
                        return data;
                    }
                },
                "columns": [
                    { "data": "1" },
                    { "data": "2" },
                    { "data": "3" },
                    { "data": "4" },
                    { "data": "5" },
                    { "data": "6" },
                    { "data": "7" },
                  ],
                "order": [[ 1, 'desc' ]],
                "columnDefs": [{
                    targets: [6],
                    orderable: false,
                    searchable: false
                }],
                "createdRow": function (row, data, index) {
                    $('td', row).addClass('py-2 align-middle').eq(0).css('min-width', '300px');
                    $('td', row).eq(0).html('').append(
                        '<div class="media align-items-center">' +
                          '<img class="ui-w-40 d-block" src="' + data[0] + '" alt="">' +
                          '<a href="products/' + data[2] + '" class="media-body d-block text-dark ml-3">' + data[1] + '</a>' +
                        '</div>'
                    );
                    $('td', row).eq(2).html('').append(
                        numeral(data[3]).format('$0,0.00')
                    );
                    $('td', row).eq(4).html('').append(
                        '<label class="switcher">' +
                            '<input type="checkbox" class="switcher-input" data="' + data[2] + '" ' + (data[5] == 1 ? 'checked' : '') + '>' +
                            '<span class="switcher-indicator">' +
                                '<span class="switcher-yes"></span>' +
                                '<span class="switcher-no"></span>' +
                            '</span>' +
                        '</label>'
                    );
                    $('td', row).eq(6).addClass('text-nowrap').html('').append(
                        '<button type="button" class="btn btn-default btn-xs icon-btn md-btn-flat article-tooltip btn-remove" data="' + data[2] + '" title="Remove"><i class="ion ion-md-close"></i></button>'
                    );
                }
            });
        },
        removeProduct: function() {
            var self = this;
            bootbox.confirm({
                message: 'Are you sure remove this product?',
                className: 'bootbox-sm',
                callback: function(result) {
                    if (result) {
                        $('#product-list').block({
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
                        axios.delete('/internal/product/' + self.productId)
                        .then((response) => {
                            self.getProducts(function() {
                                $('#product-list').unblock();
                            });
                        })
                        .catch((error) => {
                            $('#product-list').unblock();
                        });
                    }
                },
            });
        },
        updateAvailability: function(productId, isAvailable) {
            var self = this;
            $('#product-list').block({
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
            axios.post('/internal/product', {
                id: productId,
                is_available: isAvailable
            }).then((response) => {
                self.getProducts(function() {
                    $('#product-list').unblock();
                });
            }).catch((error) => {
                $('#product-list').unblock();
            });
        }
    }
}