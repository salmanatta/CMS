<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
                         style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <a class="sidebar-brand" href="index.html">
                                <span class="align-middle me-3">PIC - CMS</span>
                            </a>
                            <ul class="sidebar-nav">
                                <li class="sidebar-item active">
                                    <a data-bs-target="#dashboards" data-bs-toggle="collapse" class="sidebar-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-sliders align-middle">
                                            <line x1="4" y1="21" x2="4" y2="14"></line>
                                            <line x1="4" y1="10" x2="4" y2="3"></line>
                                            <line x1="12" y1="21" x2="12" y2="12"></line>
                                            <line x1="12" y1="8" x2="12" y2="3"></line>
                                            <line x1="20" y1="21" x2="20" y2="16"></line>
                                            <line x1="20" y1="12" x2="20" y2="3"></line>
                                            <line x1="1" y1="14" x2="7" y2="14"></line>
                                            <line x1="9" y1="8" x2="15" y2="8"></line>
                                            <line x1="17" y1="16" x2="23" y2="16"></line>
                                        </svg>
                                        <span class="align-middle">Dashboards</span>
                                    </a>
                                    <ul id="dashboards" class="sidebar-dropdown list-unstyled collapse show"
                                        data-bs-parent="#sidebar">
                                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('showTickets') }}">Add Tickets</a></li>
                                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('closeTickets') }}">Close Tickets</a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-item">
                                    <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square align-middle"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                        <span class="align-middle">Fixed Assets</span>
                                    </a>
                                    <ul id="pages" class="sidebar-dropdown list-unstyled collapse "
                                        data-bs-parent="#sidebar">
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" href="{{ url('item-List') }}">Items</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-item">
                                    <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-layout align-middle">
                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="3" y1="9" x2="21" y2="9"></line>
                                            <line x1="9" y1="21" x2="9" y2="9"></line>
                                        </svg>
                                        <span class="align-middle">Setup</span>
                                    </a>
                                    <ul id="pages" class="sidebar-dropdown list-unstyled collapse "
                                        data-bs-parent="#sidebar">
                                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('newUser') }}">Add User</a>
                                        </li>
                                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('department.index') }}">Department</a>
                                        </li>
                                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('section') }}">Section</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 1261px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar"
                 style="height: 744px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
        </div>
    </div>
</nav>
