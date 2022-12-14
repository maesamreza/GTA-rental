<nav class="navbar bg-theme navbar-expand-lg main-navbar sticky">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar"
                    class="nav-link nav-link-lg
                                collapse-btn"> <i
                        data-feather="menu"></i></a></li>

        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if (!empty(Auth::guard('admin')->user()->image))
                    <img alt="image" src="{{ asset('storage/profile/' . Auth::guard('admin')->user()->image) }}"
                        class="user-img-radious-style">
                @else
                    <img alt="image" src="{{ asset('assets/img/user.png') }}" class="user-img-radious-style">
                @endif
                <span class="d-sm-none d-lg-inline-block"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
                <div class="dropdown-title">{{ Auth::guard('admin')->user()->first_name }}</div>
                <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon"> <i
                        class="far
                                    fa-user"></i> Profile
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('admin.logout') }}" class="dropdown-item has-icon text-danger"> <i
                            class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
            </div>
        </li>
    </ul>
</nav>
