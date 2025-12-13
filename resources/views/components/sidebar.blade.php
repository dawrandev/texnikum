<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">
                <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" />
                <span class="logo-name">{{ __('Техникум') }}</span>
            </a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('Главное меню') }}</li>

            <li class="dropdown active">
                <a href="index.html" class="nav-link">
                    <i data-feather="monitor"></i>
                    <span>{{ __('Панель управления') }}</span>
                </a>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="folder"></i>
                    <span>{{ __('Категории') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('categories.index') }}">{{ __('Все категории') }}</a></li>
                    <li><a class="nav-link" href="{{ route('categories.create') }}">{{ __('Создать категорию') }}</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="file-text"></i>
                    <span>{{ __('Посты') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('posts.index') }}">{{ __('Все посты') }}</a></li>
                    <li><a class="nav-link" href="{{ route('posts.create') }}">{{ __('Создать пост') }}</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="video"></i>
                    <span>{{ __('Видео') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('videos.index') }}">{{ __('Все видео') }}</a></li>
                    <li><a class="nav-link" href="{{ route('videos.create') }}">{{ __('Создать видео') }}</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="layers"></i>
                    <span>{{ __('Интерактивные Услуги') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('interactive-services.index') }}">{{ __('Все услуги') }}</a></li>
                    <li><a class="nav-link" href="{{ route('interactive-services.create') }}">{{ __('Добавить услуги') }}</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="bar-chart-2"></i>
                    <span>{{ __('Статистика') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('stats.index') }}">{{ __('Все статистика') }}</a></li>
                    <li><a class="nav-link" href="{{ route('stats.create') }}">{{ __('Добавить статистику') }}</a></li>
                </ul>
            </li>
        </ul>

    </aside>
</div>