'use strict';

var MNGPricing = function() {
    let initComponents = function() {
        $('#listings').select2({
            closeOnSelect: false
        });

        // input group and left alignment setup
        $('#daterange').daterangepicker({
            buttonClasses: ' btn',
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',
            locale: {
                format: 'YYYY-MM-DD',
                separator: ' to '
            },
            startDate: moment(),
            endDate: moment().add(6, 'days'),
            minDate: moment(),
            maxDate: moment().add(2, 'years'),
            ranges: {
                'Today': [moment(), moment()],
                'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
                'Next 7 Days': [moment().add(6, 'days'), moment()],
                'Next 30 Days': [moment().add(29, 'days'), moment()],
                'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
            }
        });

        $('body').on('keyup', '.global-price', function() {
            $(".new-price").val($(this).val());
        });
    }

    let filterReservations = function() {
        $("#btn-filter").on('click', function(event) {
            event.preventDefault();
            let button = $(this);
            button.addClass('spinner spinner-white spinner-right');
            $.post('/pricing/filter', $("#filter-data").serializeArray(), function(response) {
                $("#price-data").html(response);
                if ($("#price-data table").length > 0) {
                    $(".btn-update").prop('disabled', false);
                }
                button.removeClass('spinner spinner-white spinner-right');
            });
        });
    }

    let updateListings = function() {
        $(".btn-update").on('click', function(event) {
            event.preventDefault();
            $(".btn-update").addClass('spinner spinner-white spinner-right');
            $.post('/pricing/update', $("#price-data").serializeArray(), function(response) {
                $(".btn-update").removeClass('spinner spinner-white spinner-right');
                let messageType = 'danger';
                if (response.status == "OK") {
                    messageType = 'success';
                } else if (response.status == "WARNING") {
                    messageType = 'warning';
                }
                MNG.flash(response.message, messageType);
                $(".new-price, .global-price").val("");
            });
        });
    }

    return {
        init: function() {
            initComponents();
            filterReservations();
            updateListings();
        },
    };
}();

jQuery(document).ready(function() {
    MNGPricing.init();
});