'use strict';

var MNGUser = function() {
    let datatable;
    var userDatatable = function() {
        datatable = $('#user_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '/user/dt',
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
                input: $('#user_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'id',
                title: 'User ID',
            }, {
                field: 'name',
                title: 'Name'
            }, {
                field: 'email',
                title: 'E-mail',
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    let edit = ` <a href="user/edit/${row.id}" class="btn btn-sm btn-clean btn-icon mr-1" title="Edit">
                    <i class="fa fas fa-edit text-primary icon-nm"></i></a>`;
                    if (row.disabled == 1) {
                        return edit;
                    } else {
                        return edit + `<a href="#" class="btn btn-sm btn-clean btn-icon delete-user" data-id="${row.id}" title="Delete">
                        <i class="fa far fa-trash-alt text-dark-50 icon-nm"></i></a> `;
                    }
                },
            }],

        });

        $('#user_datatable_search_query').on('keyup', function() {
            if ($(this).val().length > 2) {
                datatable.search($(this).val(), 'name');
            }
        });

    };

    let deleteUser = function() {
        $('body').on('click', '.delete-user', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Do you want to delete this user?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Save`,
                denyButtonText: `Cancel`,
            }).then((result) => {
                if (result.isConfirmed) {
                    return $.post(`user/delete/${$(this).data('id')}`, function(response) {
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
            userDatatable();
            deleteUser();
        },
    };
}();

jQuery(document).ready(function() {
    MNGUser.init();
});