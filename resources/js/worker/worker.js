'use strict';

var MNGWorker = function() {
    let datatable;
    var workerDatatable = function() {
        datatable = $('#worker_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '/staff/dt',
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
                input: $('#worker_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'id',
                title: 'ID',
            }, {
                field: 'name',
                title: 'Name'
            }, {
                field: 'position',
                title: 'Position',
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return ` <a href="staff/edit/${row.id}" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit">
                    <i class="fa fas fa-edit text-primary"></i></a>
                        <a href="#" class="btn btn-sm btn-clean btn-icon delete-worker" data-id="${row.id}" title="Delete">
                        <i class="fa far fa-trash-alt text-danger"></i></a> `;
                },
            }],

        });

        $('#worker_datatable_search_query').on('keyup', function() {
            if ($(this).val().length > 2) {
                datatable.search($(this).val(), 'name');
            }
        });

    };

    let deleteWorker = function() {
        $('body').on('click', '.delete-worker', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Do you want to delete this staff member?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Save`,
                denyButtonText: `Cancel`,
            }).then((result) => {
                if (result.isConfirmed) {
                    return $.post(`staff/delete/${$(this).data('id')}`, function(response) {
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
            workerDatatable();
            deleteWorker();
        },
    };
}();

jQuery(document).ready(function() {
    MNGWorker.init();
});