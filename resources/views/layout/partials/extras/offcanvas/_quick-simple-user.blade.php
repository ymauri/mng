@php
	$direction = config('layout.extras.user.offcanvas.direction', 'right');
@endphp
 {{-- User Panel --}}
<div id="kt_quick_user" class="offcanvas offcanvas-{{ $direction }} p-10">
	{{-- Header --}}
	<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
		<h3 class="font-weight-bold m-0">
			User Profile
		</h3>
		<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
			<i class="ki ki-close icon-xs text-muted"></i>
		</a>
	</div>

	{{-- Content --}}
    <div class="offcanvas-content pr-5 mr-n5">
		{{-- Header --}}
        <div class="d-flex align-items-center mt-5">
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
                    {{ Auth::user()->name }}
				</a>
                <div class="text-muted mt-1">
                    Pendiente el Rol
                </div>
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
								{{ Metronic::getSVG("media/svg/icons/Communication/Mail-notification.svg", "svg-icon-lg svg-icon-primary") }}
							</span>
                            <span class="navi-text text-muted text-hover-primary"> {{ Auth::user()->email }}</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>

		{{-- Separator --}}
		<div class="separator separator-dashed mt-8 mb-5"></div>

		<div class="navi navi-spacer-x-0 p-0">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">{{ __('Logout') }}</button>
            </form>
		</div>
    </div>
</div>
