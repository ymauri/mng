"use strict";
window.MNG = function() {

    let flash = function(message, type = null, title = '') {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        switch (type) {
            case 'success':
                toastr.success(title, message);
                return;
            case 'error':
                toastr.error(title, message);
                return;
            case 'warning':
                toastr.warning(title, message);
                return;
            default:
                toastr.info(title, message);
                return;
        }
    }

    return {
        flash: flash,
    };
}();