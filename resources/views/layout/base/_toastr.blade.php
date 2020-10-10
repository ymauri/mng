

{{-- Toastr --}}
<script src="{{ asset("js/helpers.js") }}" type="text/javascript"></script>

@if(session('flash_message_notification'))
    <input type="hidden" value="{{ session('flash_level_notification') }}" id="flash_level_notification">
    <input type="hidden" value="{{ session('flash_message_notification') }}" id="flash_message_notification">
    <script>
        MNG.flash($("#flash_message_notification").val(), $('#flash_level_notification').val());
        $("#flash_message_notification").val("");
        $('#flash_level_notification').val("");
    </script>
@endif
{{ session()->forget(['flash_message_notification', 'flash_level_notification']) }}
