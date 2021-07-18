'use strict';

var MNGHotel = function() {
    let datatable;
    var hotelDatatable = function() {
        datatable = $('#hotel_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '/hotel/dt',
                    },
                },
                pageSize: 31,
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true,
            },

            // layout definition
            layout: {
                scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
                minHeight: null, // datatable's body's fixed height
                footer: false, // display/hide footer
            },

            // column sorting
            sortable: true,

            // toolbar
            toolbar: {
                // toolbar placement can be at top or bottom or both top and bottom repeated
                placement: ['bottom'],

                // toolbar items
                items: {
                    // pagination
                    pagination: {
                        // page size select
                        pageSizeSelect: [5, 10, 20, 31, 50], // display dropdown to select pagination size. -1 is used for "ALl" option
                    },
                },

            },

            search: {
                input: $('#hotel_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                    field: 'id',
                    title: 'ID',
                }, {
                    field: 'dated',
                    title: 'Form date',
                    template: function(row) {
                        if (row.dated && moment(row.dated).isValid()) {
                            return moment(row.dated).format('DD-MM-YYYY');
                        }
                        return '';
                    },

                }, {
                    field: 'updated_at',
                    title: 'Updated At',
                    template: function(row) {
                        if (row.updated_at && moment(row.updated_at).isValid()) {
                            return moment(row.updated_at).format('DD-MM-YYYY');
                        }
                        return '';
                    },
                },
                {
                    field: 'finished_at',
                    title: 'Finished At',
                    template: function(row) {
                        if (row.finished_at && moment(row.finished_at).isValid()) {
                            return moment(row.finished_at).format('DD-MM-YYYY');
                        }
                        return '';
                    },
                },
                {
                    field: 'Actions',
                    title: 'Actions',
                    sortable: false,
                    width: 125,
                    overflow: 'visible',
                    autoHide: false,
                    template: function(row) {
                        return ` <a href="hotel/edit/${row.id}" class="btn btn-sm btn-clean btn-icon mr-1" title="Edit">
                                <i class="fa icon-nm fas fa-edit text-primary"></i></a>`;
                    },
                }
            ],

        });

        $('#hotel_datatable_search_query')
            .val(moment().format('MM-YYYY'))
            .prop("readonly", true)
            .datepicker({
                format: 'mm-yyyy',
                viewMode: "months",
                minViewMode: "months"
            })
            .on('change', function() {
                if ($(this).val().length > 2) {
                    datatable.search($(this).val(), 'name');
                }
            });
    };

    return {
        init: function() {
            hotelDatatable();
        },
    };
}();

jQuery(document).ready(function() {
    MNGHotel.init();
});