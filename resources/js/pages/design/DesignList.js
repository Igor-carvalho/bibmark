export default {
    props:[],
    data: function() {
        return {
            designId: 0,
        };
    },
    mounted: function () {
        this.getDesigns();

        var self = this;
        $('#design-list').on('click', '.btn-remove', function() {
            self.designId = $(this).attr('data');
            self.removeDesign();
        });
    },
    watch: {
        
    },
    methods: {
        getDesigns: function(callback) {
            $('#design-list').dataTable({
                "destroy": true,
                "ajax": {
                    "url": '/internal/designs',
                    "dataSrc": function(json) {
                        let data = [];
                        json.designs.forEach(design => {
                            data.push([
                                design.id,
                                design.name,
                                moment(design.created_at.date).format('YYYY-MM-DD'),
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
                    targets: [3],
                    orderable: false,
                    searchable: false
                }],
                "createdRow": function (row, data, index) {
                    $('td', row).eq(3).addClass('text-nowrap').html('').append(
                        '<button type="button" class="btn btn-default btn-xs icon-btn md-btn-flat article-tooltip btn-remove" data="' + data[0] + '" title="Remove"><i class="ion ion-md-close"></i></button>'
                    );
                }
            });
        },
        removeDesign: function() {
            var self = this;
            bootbox.confirm({
                message: 'Are you sure remove this design?',
                className: 'bootbox-sm',
                callback: function(result) {
                    if (result) {
                        $('#design-list').block({
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
                        axios.delete('/internal/design/' + self.designId)
                        .then((response) => {
                            self.getDesigns(function() {
                                $('#design-list').unblock();
                            });
                        })
                        .catch((error) => {
                            $('#design-list').unblock();
                        });
                    }
                },
            });
        },
    }
}