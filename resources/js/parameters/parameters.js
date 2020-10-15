'use strict';

var MNGParameters = function() {
    let datatable;
    var parametersDatatable = function() {
        datatable = $('#parameters_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '/parameters/dt',
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
                input: $('#parameters_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'id',
                title: 'ID',
            }, {
                field: 'label',
                title: 'Description'
            }, {
                field: 'valstring',
                title: 'Value'
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return `
                        <a href="parameters/edit/${row.id}" class="btn btn-sm btn-clean btn-icon mr-1" title="Edit">
                        <i class="fa fas fa-edit text-primary icon-nm"></i></a>
                        <a href="#" class="btn btn-sm btn-clean btn-icon delete-parameters" data-id="${row.id}" title="Delete">
                        <i class="fa far fa-trash-alt text-dark-50 icon-nm"></i></a> `;
                },
            }],

        });

        $('#parameters_datatable_search_query').on('keyup', function() {
            if ($(this).val().length > 2) {
                datatable.search($(this).val(), 'name');
            }
        });

    };

    let deleteParameter = function() {
        $('body').on('click', '.delete-parameters', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Do you want to delete this parameter?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Save`,
                denyButtonText: `Cancel`,
            }).then((result) => {
                if (result.isConfirmed) {
                    return $.post(`parameters/delete/${$(this).data('id')}`, function(response) {
                        let messageType = 'error';
                        if (response.status == "OK") {
                            messageType = 'success';
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
            parametersDatatable();
            deleteParameter();
        },
    };
}();

jQuery(document).ready(function() {
    MNGParameters.init();
});