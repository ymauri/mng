'use strict';

var MNGSource = function() {
    let datatable;
    var sourceDatatable = function() {
        datatable = $('#source_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '/source/dt',
                    },
                },
                pageSize: 20, // display 20 records per page
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
                        pageSizeSelect: [5, 10, 20, 30, 50], // display dropdown to select pagination size. -1 is used for "ALl" option
                    },
                },
            },

            search: {
                input: $('#source_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                    field: 'id',
                    title: 'ID',
                }, {
                    field: 'details',
                    title: 'Name'
                }, {
                    field: 'guesty',
                    title: 'Guesty',
                },
                {
                    field: 'isactive',
                    title: 'Active',
                    template: function(row) {
                        return row.isactive ? `<span class="label label-light-success label-pill label-inline">Yes</span>` : `<span class="label label-light-danger label-pill label-inline">No</span>`;
                    },
                },
                {
                    field: 'extrafield',
                    title: 'Extra field',
                    template: function(row) {
                        return row.extrafield ? `<span class="label label-light-success label-pill label-inline">Yes</span>` : `<span class="label label-light-danger label-pill label-inline">No</span>`;
                    },
                }, {
                    field: 'Actions',
                    title: 'Actions',
                    sortable: false,
                    width: 125,
                    overflow: 'visible',
                    autoHide: false,
                    template: function(row) {
                        return ` <a href="source/edit/${row.id}" class="btn btn-sm btn-clean btn-icon mr-1" title="Edit">
                                <i class="fa icon-nm fas fa-edit text-primary"></i></a>`;
                    },
                }
            ],

        });

        $('#source_datatable_search_query').on('keyup', function() {
            if ($(this).val().length > 2) {
                datatable.search($(this).val(), 'name');
            }
        });

    };

    return {
        init: function() {
            sourceDatatable();
        },
    };
}();

jQuery(document).ready(function() {
    MNGSource.init();
});