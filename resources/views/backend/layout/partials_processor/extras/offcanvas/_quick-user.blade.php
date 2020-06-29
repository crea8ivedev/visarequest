@php
	$direction = config('layout_processor.extras.user.offcanvas.direction', 'right');
@endphp
 {{-- User Panel --}}
<div id="kt_quick_user" class="offcanvas offcanvas-{{ $direction }} p-10">
	{{-- Header --}}
	<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
		<h3 class="font-weight-bold m-0">
			User Profile
			<!-- <small class="text-muted font-size-sm ml-2">12 messages</small> -->
		</h3>
		<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
			<i class="ki ki-close icon-xs text-muted"></i>
		</a>
	</div>

	{{-- Content --}}
    <div class="offcanvas-content pr-5 mr-n5">
		{{-- Header --}}
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
            @if(Auth::user()->profile_image != "" && file_exists( public_path().'/images/uploads/profile/'.Auth::user()->profile_image))
                <div class="symbol-label" style="background-image:url({{asset("public/images/uploads/profile/".Auth::user()->profile_image)}})"></div>
            @else
               <div class="symbol-label" style="background-image:url({{asset('media/users/300_21.jpg') }})">
               </div>
            @endif
			<i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
					{{ Auth::user()->name }}
				</a>
                <div class="text-muted mt-1">
					Visa Request Processor
                </div>
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
								{{ Metronic::getSVG("public/media/svg/icons/Communication/Mail-notification.svg", "svg-icon-lg svg-icon-primary") }}
							</span>
                            <span class="navi-text text-muted text-hover-primary">{{ Auth::user()->email }}</span>
                        </span>
                    </a>
                    <a href="{{ route('processor.logout') }}"
	                    onclick="event.preventDefault();
	                                document.getElementById('logout-form').submit();">
	                    Logout
	                </a>


                	<form id="logout-form" action="{{ route('processor.logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                	</form>
                </div>
            </div>
        </div>

		{{-- Separator --}}
		<div class="separator separator-dashed mt-8 mb-5"></div>

		{{-- Nav --}}
		<div class="navi navi-spacer-x-0 p-0">
		    {{-- Item --}}
		    <a href="{{ route('processor.profile') }}" class="navi-item">
		        <div class="navi-link">
		            <div class="symbol symbol-40 bg-light mr-3">
		                <div class="symbol-label">
							{{ Metronic::getSVG("public/media/svg/icons/General/Notification2.svg", "svg-icon-md svg-icon-success") }}
						</div>
		            </div>
		            <div class="navi-text">
		                <div class="font-weight-bold">
		                    My Profile
		                </div>
		                <div class="text-muted">
		                    Account settings and more
		                    <span class="label label-light-danger label-inline font-weight-bold">update</span>
		                </div>
		            </div>
		        </div>
		    </a>
		    
		</div>

		{{-- Separator --}}
		<div class="separator separator-dashed my-7"></div>

		
		</div>
    </div>
</div>
