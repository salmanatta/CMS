<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <!-- <form class="d-none d-sm-inline-block">
        <div class="input-group input-group-navbar">
            <input type="text" class="form-control" placeholder="Search projects…" aria-label="Search">
            <button class="btn" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search align-middle"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </button>
        </div>
    </form> -->
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
                    <div class="position-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle align-middle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                        <span class="indicator">4</span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
                    <div class="dropdown-menu-header">
                        <div class="position-relative">
                            4 New Messages
                        </div>
                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
{{--                                    <img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Ashley Briggs">--}}
                                </div>
                                <div class="col-10 ps-2">
                                    <div class="text-dark">Ashley Briggs</div>
                                    <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
                                    <div class="text-muted small mt-1">15m ago</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
{{--                                    <img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="Carl Jenkins">--}}
                                </div>
                                <div class="col-10 ps-2">
                                    <div class="text-dark">Carl Jenkins</div>
                                    <div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
                                    <div class="text-muted small mt-1">2h ago</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
{{--                                    <img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Stacie Hall">--}}
                                </div>
                                <div class="col-10 ps-2">
                                    <div class="text-dark">Stacie Hall</div>
                                    <div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
                                    <div class="text-muted small mt-1">4h ago</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
{{--                                    <img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Bertha Martin">--}}
                                </div>
                                <div class="col-10 ps-2">
                                    <div class="text-dark">Bertha Martin</div>
                                    <div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
                                    <div class="text-muted small mt-1">5h ago</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="#" class="text-muted">Show all messages</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                    <div class="position-relative">
                        @if(auth()->user()->unreadnotifications->count())
                            <span class="indicator">{{ auth()->user()->unreadnotifications->count() }}</span>
                        @endif
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell-off align-middle"><path d="M13.73 21a2 2 0 0 1-3.46 0"></path><path d="M18.63 13A17.89 17.89 0 0 1 18 8"></path><path d="M6.26 6.26A5.86 5.86 0 0 0 6 8c0 7-3 9-3 9h14"></path><path d="M18 8a6 6 0 0 0-9.33-5"></path></svg>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                    <div class="dropdown-menu-header">
                        {{ auth()->user()->unreadnotifications->count() }} New Notifications
                    </div>
                    <div class="list-group">
                        @foreach(auth()->user()->unreadnotifications as $notification)
                        <a href="{{ url('read-ticket/'.$notification->id.'/'.$notification->data['ticketId']) }}" class="list-group-item">
                                <div class="col-10">
                                    <div class="text-dark">{{ $notification->data['uname'] }}</div>
                                    <div class="text-muted small mt-1">{{$notification->data['subject']}}</div>
                                    <div class="text-muted small mt-1">{{ $notification->data['priority'] }}</div>
                                </div>
                            @endforeach
                        </a>
{{--                        <a href="#" class="list-group-item">--}}
{{--                            <div class="row g-0 align-items-center">--}}
{{--                                <div class="col-2">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell text-warning"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>--}}
{{--                                </div>--}}
{{--                                <div class="col-10">--}}
{{--                                    <div class="text-dark">Lorem ipsum</div>--}}
{{--                                    <div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>--}}
{{--                                    <div class="text-muted small mt-1">6h ago</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <a href="#" class="list-group-item">--}}
{{--                            <div class="row g-0 align-items-center">--}}
{{--                                <div class="col-2">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home text-primary"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>--}}
{{--                                </div>--}}
{{--                                <div class="col-10">--}}
{{--                                    <div class="text-dark">Login from 192.186.1.1</div>--}}
{{--                                    <div class="text-muted small mt-1">8h ago</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <a href="#" class="list-group-item">--}}
{{--                            <div class="row g-0 align-items-center">--}}
{{--                                <div class="col-2">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus text-success"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>--}}
{{--                                </div>--}}
{{--                                <div class="col-10">--}}
{{--                                    <div class="text-dark">New connection</div>--}}
{{--                                    <div class="text-muted small mt-1">Anna accepted your request.</div>--}}
{{--                                    <div class="text-muted small mt-1">12h ago</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
                    </div>
{{--                    <div class="dropdown-menu-footer">--}}
{{--                        <a href="#" class="text-muted">Show all notifications</a>--}}
{{--                    </div>--}}
                </div>
            </li>
        <form action="{{ route('logout') }}" method="POST">
        <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings align-middle"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <span class="text-dark">Sign Out</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    @csrf()
                    <button type="submit" class="dropdown-item">Sign out</button>
                </div>
        </li>
        </form>
        </ul>
    </div>
</nav>
