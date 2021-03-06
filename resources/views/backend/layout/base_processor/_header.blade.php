<div id="kt_header" class="header header-fixed">
    <!--begin::Header Wrapper-->
    <div class="header-wrapper rounded-top-xl d-flex flex-grow-1 align-items-center">
        <!--begin::Container-->
        <div class="container-fluid d-flex align-items-center justify-content-end justify-content-lg-between flex-wrap">
            <!--begin::Menu Wrapper-->
            <div class="header-menu-wrapper header-menu-wrapper-left py-lg-2" id="kt_header_menu_wrapper">
                <!--begin::Menu-->
                <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                    <!--begin::Nav-->
                    <ul class="menu-nav">
                        <li class="menu-item {{ (request()->is('processor')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('processor.dashboard') }}" class="menu-link">
                                <span class="menu-text">Dashboard</span>
                            </a>
                        </li>

                        <li class="menu-item {{ (request()->is('processor/client*')) ? ' menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ url('processor/client')}}" class="menu-link">
                                <span class="menu-text">Clients</span>
                            </a>
                        </li>

                        <li class="menu-item {{ (request()->is('processor/service')) ? ' menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ url('processor/service') }}" class="menu-link">
                                <span class="menu-text">Services</span>
                            </a>
                        </li>

                        <li class="menu-item {{ (request()->is('processor/completed-service')) ? ' menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ url('processor/completed-service') }}" class="menu-link">
                                <span class="menu-text">Completed</span>
                            </a>
                        </li>

                        <li class="menu-item {{ (request()->is('processor/finance')) ? ' menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ url('processor/finance') }}" class="menu-link">
                                <span class="menu-text">Finance</span>
                            </a>
                        </li>

                        

                    </ul>
                    
                    
                    <!--end::Nav-->
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Menu Wrapper-->
            <!--begin::Toolbar-->
            {{-- <div class="d-flex align-items-center py-3">
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                    <a href="#" class="btn btn-dark font-weight-bold px-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Create</a>
                    <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-md dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi navi-hover">
                            <li class="navi-header font-weight-bold py-4">
                                <span class="font-size-lg">Choose Label:</span>
                                <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                            </li>
                            <li class="navi-separator mb-3 opacity-70"></li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-success">Customer</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-danger">Partner</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-warning">Suplier</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-primary">Member</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-dark">Staff</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-separator mt-3 opacity-70"></li>
                            <li class="navi-footer py-4">
                                <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                                <i class="ki ki-plus icon-sm"></i>Add new</a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                </div>
                <!--end::Dropdown-->
            </div> --}}
            <!--end::Toolbar-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Header Wrapper-->
</div>