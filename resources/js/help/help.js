'use strict';

var MNGHelp = function() {
    let datatable;
    var helpDatatable = function() {
        datatable = $('#help_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '/help/dt',
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
                input: $('#help_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'id',
                title: 'ID',
            }, {
                field: 'form',
                title: 'Form',
                template: function(row) {
                    return MNG.__(row.form);
                },
            }, {
                field: 'field',
                title: 'Field',
                template: function(row) {
                    return MNG.__(row.field);
                },
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return ` <a href="help/edit/${row.id}" class="btn btn-sm btn-clean btn-icon mr-1" title="Edit">
                                <i class="fa icon-nm fas fa-edit text-primary"></i></a>
                            <a href="#" class="btn btn-sm btn-clean btn-icon delete-help" data-id="${row.id}" title="Delete">
                        <i class="fa far fa-trash-alt text-dark-50 icon-nm"></i></a> `;
                },
            }],

        });

        $('#help_datatable_search_query').on('keyup', function() {
            if ($(this).val().length > 2) {
                datatable.search($(this).val(), 'name');
            }
        });

    };

    let deleteHelpContent = function() {
        $('body').on('click', '.delete-help', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Do you want to delete this help content?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Save`,
                denyButtonText: `Cancel`,
            }).then((result) => {
                if (result.isConfirmed) {
                    return $.post(`help/delete/${$(this).data('id')}`, function(response) {
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
            helpDatatable();
            deleteHelpContent();
        },
    };
}();

jQuery(document).ready(function() {
    MNGHelp.init();
});
