'use strict';

var MNGRule = function() {
    let datatable;
    var ruleDatatable = function() {
        datatable = $('#role_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '/rule/dt',
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
                input: $('#role_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'priority',
                title: 'Priority',
                width: 60
            }, {
                field: 'name',
                title: 'Name'
            }, {
                field: 'ishook',
                title: 'Type',
                template: function(row) {
                    return row.ishook ? 'Hook' : 'Cron Job';
                },
            }, {
                field: 'action',
                title: 'Action',
                template: function(row) {
                    return row.action == 'listing_lower_price' ? "Rise price" : 'Lower price'
                }
            }, {
                field: 'actionvalue',
                title: 'Value',
                width: 60,
                template: function(row) {
                    return `${row.actionvalue} (${row.unit == 'percentage' ? '%' : '€'})`;
                }
            }, {
                field: 'status',
                title: 'Status',
                template: function(row) {
                    if (row.status) {
                        return `<span class="label label-light-info label-pill label-inline">Enable</span>`;
                    }
                    return '<span class="label label-light-danger label-pill label-inline"> Disable</span>';
                },
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return `
                        <a href="rule/edit/${row.id}" class="btn btn-sm btn-clean btn-icon mr-1" title="Edit">
                        <i class="fa fas fa-edit text-primary icon-nm"></i></a>
                        <a href="#" class="btn btn-sm btn-clean btn-icon delete-rule" data-id="${row.id}" title="Delete">
                        <i class="fa far fa-trash-alt text-dark-50 icon-nm"></i></a> `;
                },
            }],

        });

        $('#role_datatable_search_query').on('keyup', function() {
            if ($(this).val().length > 2) {
                datatable.search($(this).val(), 'name');
            }
        });

    };

    let deleteRule = function() {
        $('body').on('click', '.delete-rule', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Do you want to delete this rule?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Save`,
                denyButtonText: `Cancel`,
            }).then((result) => {
                if (result.isConfirmed) {
                    return $.post(`rule/delete/${$(this).data('id')}`, function(response) {
                        let messageType = 'error';
                        if (response.status == "OK") {
                            messageType = 'success';
                        } else if (response.status == "WARNING") {
                            messageType = 'warning';
                        }
                        MNG.flash(response.message, messageType);
                        datatable.reload();
                    });
                }
            });
        });
    };

    return {
        init: function() {
            ruleDatatable();
            deleteRule();
        },
    };
}();

jQuery(document).ready(function() {
    MNGRule.init();
});