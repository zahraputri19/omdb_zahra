<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        
        <!-- Dropdown Pilih Bahasa -->
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
                <i class="fas fa-globe"></i> 
                <span class="d-sm-none d-lg-inline-block">{{ strtoupper(app()->getLocale()) }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">{{ __('messages.select_language') }}</div>
                <a href="{{ route('switch-lang', 'id') }}" class="dropdown-item {{ app()->getLocale() == 'id' ? 'active' : '' }}">
                    Bahasa Indonesia
                </a>
                <a href="{{ route('switch-lang', 'en') }}" class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}">
                    English
                </a>
            </div>
        </li>

        <!-- Dropdown Profil User -->
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name ?? 'User' }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">{{ __('messages.logged_in') }}</div>
                <div class="dropdown-divider"></div>
                <a href="{{ route('signout') }}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> {{ __('messages.logout') }}
                </a>
            </div>
        </li>
    </ul>
</nav>