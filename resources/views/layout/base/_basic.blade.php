@if(config('layout.self.layout') == 'blank')
    <div class="d-flex flex-column flex-root">
        @yield('content')
    </div>
@else
    @include('layout.base._header-mobile')
    <div class="content {{ Metronic::printClasses('content', false) }} d-flex flex-column flex-column-fluid" id="kt_content">
        @include('layout.base._content')
    </div>
@endif

