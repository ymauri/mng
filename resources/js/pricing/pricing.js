'use strict';

var MNGPricing = function() {
    let initSelect = function() {
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
    }

    return {
        init: function() {
            initSelect();
        },
    };
}();

jQuery(document).ready(function() {
    MNGPricing.init();
});