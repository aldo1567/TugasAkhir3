<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-jedi text-danger"></i></div>
                    Core Management
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link @yield('dashboard-active')" href="{{route('dashboard.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt text-warning"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link @yield('user-active')" href="{{route('user.index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-user-circle text-white" aria-hidden="true"></i></div>
                            &nbsp;User
                        </a>
                        <a class="nav-link @yield('workday-active')" href="{{route('workDay.index')}}">
                            <div class="sb-nav-link-icon"><i class="far fa-calendar-alt text-primary"></i></div>
                            &nbsp;WorkDay
                        </a>
                        <a class="nav-link @yield('session-active')" href="{{route('session.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-briefcase-medical text-danger"></i></div>
                            &nbsp;Session
                        </a>
                        <a class="nav-link @yield('status-active')" href="{{route('status.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-info text-success"></i></div>
                            &nbsp;&nbsp;&nbsp;Status
                        </a>
                        <a class="nav-link @yield('booking-active')" href="{{route('admin.booking')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open text-info"></i></div>
                            &nbsp;Booking
                        </a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs text-warning"></i></div>
                    Interface Management
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link @yield('company-active')" href="{{route('company.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-building text-danger"></i></div>
                            &nbsp;&nbsp;Company Profile
                        </a>
                        <a class="nav-link @yield('feature-active')" href="{{route('feature.index')}}">
                            <div class="sb-nav-link-icon"><i class="far fa-file-alt text-primary"></i></div>
                            &nbsp; &nbsp;Feature
                        </a>
                        <a class="nav-link @yield('doctor-active')" href="{{route('doctor.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-md text-info"></i></div>
                            &nbsp;&nbsp;Doctor
                        </a>
                        <a class="nav-link @yield('quality-active')" href="{{route('quality.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-vials text-warning"></i></div>
                            &nbsp;Quality
                        </a>
                        <a class="nav-link @yield('available-active')" href="{{route('available.index')}}">
                            <div class="sb-nav-link-icon"><i class="far fa-clock text-success"></i></div>
                            &nbsp;&nbsp;Available
                        </a>
                        <a class="nav-link @yield('about-active')" href="{{route('about.index')}}">
                            <div class="sb-nav-link-icon"><i class="far fa-question-circle text-info"></i></div>
                            &nbsp;&nbsp;About
                        </a>
                        <a class="nav-link @yield('contact-active')" href="{{route('admin.contact')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-inbox text-white"></i></div>
                            &nbsp;&nbsp;Contact
                        </a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{Auth::user()->name}}
        </div>
    </nav>
</div>
