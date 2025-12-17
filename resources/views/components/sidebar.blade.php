<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard')}}">
                <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" />
                <span class="logo-name">{{ __('Техникум') }}</span>
            </a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('Главное меню') }}</li>

            <li class="dropdown {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i data-feather="monitor"></i>
                    <span>{{ __('Панель управления') }}</span>
                </a>
            </li>

            <li class="dropdown {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="folder"></i>
                    <span>{{ __('Категории') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('categories.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('categories.index') }}">{{ __('Все категории') }}</a>
                    </li>
                    <li class="{{ request()->routeIs('categories.create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('categories.create') }}">{{ __('Создать категорию') }}</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('posts.*') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="file-text"></i>
                    <span>{{ __('Посты') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('posts.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('posts.index') }}">{{ __('Все посты') }}</a>
                    </li>
                    <li class="{{ request()->routeIs('posts.create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('posts.create') }}">{{ __('Создать пост') }}</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('videos.*') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="video"></i>
                    <span>{{ __('Видео') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('videos.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('videos.index') }}">{{ __('Все видео') }}</a>
                    </li>
                    <li class="{{ request()->routeIs('videos.create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('videos.create') }}">{{ __('Создать видео') }}</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('interactive-services.*') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="layers"></i>
                    <span>{{ __('Интерактивные Услуги') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('interactive-services.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('interactive-services.index') }}">{{ __('Все услуги') }}</a>
                    </li>
                    <li class="{{ request()->routeIs('interactive-services.create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('interactive-services.create') }}">{{ __('Добавить услуги') }}</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('stats.*') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="bar-chart-2"></i>
                    <span>{{ __('Статистика') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('stats.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('stats.index') }}">{{ __('Все статистика') }}</a>
                    </li>
                    <li class="{{ request()->routeIs('stats.create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('stats.create') }}">{{ __('Добавить статистику') }}</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('partners.*') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="briefcase"></i>
                    <span>{{ __('Партнеры') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('partners.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('partners.index') }}">{{ __('Все партнеры') }}</a>
                    </li>
                    <li class="{{ request()->routeIs('partners.create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('partners.create') }}">{{ __('Добавить партнера') }}</a>
                    </li>
                </ul>
            </li>
        </ul>

    </aside>
</div>