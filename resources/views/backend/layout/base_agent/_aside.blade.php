<div class="aside aside-left d-flex flex-column" id="kt_aside">
    <!--begin::Brand-->
    <div class="aside-brand d-flex flex-column align-items-center flex-column-auto pt-18 pb-10">
        <!--begin::Logo-->
            
        <div class="btn p-0 symbol symbol-60 " href="?page=index" id="kt_quick_user_toggle">
            <div class="symbol-label">
                <img alt="Logo" class="h-75 align-self-end" src="{{ asset('public/images/logo.png') }}"/>
               
            </div>
        </div>
        <!--end::Logo-->
    </div>

    <!--end::Brand-->
    <!--begin::Nav Wrapper-->
    <div class="aside-nav d-flex flex-column align-items-center flex-column-fluid pb-10">
        <!--begin::Nav-->
        <ul class="nav flex-column">
               
            <!--begin::Item-->
            <li class="nav-item mb-2" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Dashboard">
                <a href="{{ route('agent.dashboard') }}" class="nav-link btn btn-icon btn-hover-text-primary btn-lg {{ (request()->is('agent')) ? 'active' : '' }}">
                    <span class="svg-icon svg-icon-xxl">
                         {{ Metronic::getSVG('public/images/icons/Layout-4-blocks.svg') }}
                    </span>
                </a>
            </li>
           
        
            <li class="nav-item mb-2" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="" data-original-title="Services">
                <a href="{{ url('agent/service') }}" class="nav-link btn btn-icon btn-hover-text-primary btn-lg {{ (request()->is('agent/service')) ? 'active' : '' }}" data-toggle="tab" data-target="#kt_aside_tab_3" role="tab" aria-selected="true">
                     <span class="svg-icon svg-icon-xxl">
                         {{ Metronic::getSVG('public/images/icons/service.svg') }}
                    </span>
                </a>
            </li>
            <!--end::Item-->
        </ul>
        <!--end::Nav-->
    </div>
    <!--end::Nav Wrapper-->

    <!--begin::Footer-->
    <div class="aside-footer d-flex flex-column align-items-center flex-column-auto py-8">
        <!--begin::Notifications-->
        <a href="#" class="btn btn-icon btn-hover-text-primary btn-lg mb-1 position-relative" id="kt_quick_notifications_toggle" data-toggle="tooltip" data-placement="right" data-container="body"  title="Notifications">
            <span class="svg-icon svg-icon-xxl">
                 {{ Metronic::getSVG('public/images/icons/Layers.svg') }}
            </span>
            <span class="label label-sm label-light-danger label-rounded font-weight-bolder position-absolute top-0 right-0 mt-1 mr-1">3</span>
        </a>
        <!--end::Notifications-->
    </div>
    <!--end::Footer-->
</div>