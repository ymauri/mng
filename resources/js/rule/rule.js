'use strict';

var MNGRule = function() {
    let datatable;
    var ruleDatatable = function() {
        if ($('#role_datatable').length > 0) {
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
                        field: 'active',
                        title: 'Status',
                        template: function(row) {
                            if (parseInt(row.active) == 1) {
                                return `<span class="label label-light-info label-pill label-inline">Enable</span>`;
                            }
                            return '<span class="label label-light-danger label-pill label-inline"> Disable</span>';
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
                            return `
                            <a href="rule/edit/${row.id}" class="btn btn-sm btn-clean btn-icon mr-1" title="Edit">
                            <i class="fa fas fa-edit text-primary icon-nm"></i></a>
                            <a href="#" class="btn btn-sm btn-clean btn-icon delete-rule" data-id="${row.id}" title="Delete">
                            <i class="fa far fa-trash-alt text-dark-50 icon-nm"></i></a> `;
                        },
                    }
                ],

            });

            $('#role_datatable_search_query').on('keyup', function() {
                if ($(this).val().length > 2) {
                    datatable.search($(this).val(), 'name');
                }
            });
        }
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

    let initForm = function() {
        if ($('#listings').length > 0) {
            $('#listings').select2({
                closeOnSelect: false
            });
        }

        if ($('#listings').length > 0) {
            $('#daterange').daterangepicker({
                buttonClasses: ' btn',
                applyClass: 'btn-primary',
                cancelClass: 'btn-secondary',
                locale: {
                    format: 'YYYY-MM-DD',
                    separator: ' to '
                },
                startDate: moment($('#begin').val(), 'YYYY-MM-DD'),
                endDate: moment($('#ends').val(), 'YYYY-MM-DD'),
                minDate: moment().subtract(2, 'years'),
                maxDate: moment().add(2, 'years'),
                ranges: {
                    'Today': [moment(), moment()],
                    'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
                    'Next 7 Days': [moment().add(6, 'days'), moment()],
                    'Next 30 Days': [moment().add(29, 'days'), moment()],
                    'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
                }
            }).on('apply.daterangepicker', function(ev, picker) {
                $('#begin').val(picker.startDate.format('YYYY-MM-DD'));
                $('#ends').val(picker.endDate.format('YYYY-MM-DD'));
            });;
        }

        if ($('#time').length > 0) {
            $('#time').timepicker({
                timeFormat: 'HH:mm'
            });
        }

        $('input[name="ishook"]').on('click', function() {
            if ($(this).val() === "1") {
                $('#daterange').closest('div').hide(300);
                $('#time').closest('div').hide(300);
            } else {
                $('#daterange').closest('div').show(300);
                $('#time').closest('div').show(300);
            }
        });
    }

    return {
        init: function() {
            ruleDatatable();
            deleteRule();
            initForm();
        },
    };
}();

jQuery(document).ready(function() {
    MNGRule.init();
});