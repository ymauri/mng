'use strict';

var MNGReservations = function() {
    let datatable;
    var reservationsDatatable = function() {
        datatable = $('#reservations_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '/reservations/dt',
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
            order: [
                [0, "desc"]
            ],

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
                input: $('#reservations_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'id',
                title: 'ID',
                width: 40
            }, {
                field: 'listings.value',
                title: 'Listing',
                width: 50
            }, {
                field: 'name',
                title: 'Name',
                width: 125
            }, {
                field: 'time',
                title: 'Checkin'
            }, {
                field: 'checkout.time',
                title: 'Checkout',
                template: function(row) {
                    if (row.checkout) {
                        return row.checkout.time;
                    }
                    return '<span class="label label-light-danger label-pill label-inline"> No info.</span>';
                },
            }, {
                field: 'nights',
                title: 'Nights',
                width: 45
            }, {
                field: 'guests',
                title: 'Guests',
                width: 50
            }, {
                field: 'status',
                title: 'Status',
                template: function(row) {
                    if (row.status == 'confirmed') {
                        return '<span class="label label-light-success label-pill label-inline">Confirmed</span>';
                    } else {
                        return `<span class="label label-light-danger label-pill label-inline">Canceled ${row.canceldat ? "at "+ row.canceldat : ''}</span>`;
                    }
                }
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 55,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return `<a href="reservations/show/${row.id}" class="btn btn-sm btn-clean btn-icon mr-1" title="Edit">
                        <i class="fa far fa-eye  text-primary icon-nm"></i></a> `;
                },
            }]
        });

        $('#reservations_datatable_search_query').on('keyup', function() {
            if ($(this).val().length > 2) {
                datatable.search($(this).val(), 'name');
            }
        });

    };
    return {
        init: function() {
            reservationsDatatable();
        },
    };
}();

jQuery(document).ready(function() {
    MNGReservations.init();
});