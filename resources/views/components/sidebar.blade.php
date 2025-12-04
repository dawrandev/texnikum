    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="index.html"> <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" /> <span
                        class="logo-name">{{ __('Otika') }}</span>
                </a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">{{ __('Main') }}</li>
                <li class="dropdown active">
                    <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>{{ __('Dashboard') }}</span></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="folder"></i><span>{{ __('Categories') }}</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('categories.index') }}">{{ __('All Categories') }}</a></li>
                        <li><a class="nav-link" href="{{ route('categories.create') }}">{{ __('Create Categories') }}</a></li>
                    </ul>
                </li>
            </ul>
        </aside>
    </div>