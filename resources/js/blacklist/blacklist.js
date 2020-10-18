'use strict';

var MNGBlacklist = function() {
    let datatable;
    var blacklistDatatable = function() {
        datatable = $('#blacklist_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '/blacklist/dt',
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
                input: $('#blacklist_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'id',
                title: 'ID',
                width: 40
            }, {
                field: 'name',
                title: 'Name'
            }, {
                field: 'email',
                title: 'Email',
            }, {
                field: 'listing.value',
                title: 'Listing',
            }, {
                field: 'checkin',
                title: 'Checkin',
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 95,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return ` <a href="blacklist/edit/${row.id}" class="btn btn-sm btn-clean btn-icon mr-1" title="Edit">
                                <i class="fa icon-nm fas fa-edit text-primary"></i></a>
                                <a href="#" class="btn btn-sm btn-clean btn-icon delete-blacklist" data-id="${row.id}" title="Delete">
                                <i class="fa far fa-trash-alt text-dark-50 icon-nm"></i></a>`;
                },
            }],

        });

        $('#blacklist_datatable_search_query').on('keyup', function() {
            if ($(this).val().length > 2) {
                datatable.search($(this).val(), 'name');
            }
        });

    };

    let deleteBlacklist = function() {
        $('body').on('click', '.delete-blacklist', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Do you want to delete this blacklist item?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Save`,
                denyButtonText: `Cancel`,
            }).then((result) => {
                if (result.isConfirmed) {
                    return $.post(`blacklist/delete/${$(this).data('id')}`, function(response) {
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
            blacklistDatatable();
            deleteBlacklist();
        },
    };
}();

jQuery(document).ready(function() {
    MNGBlacklist.init();
});