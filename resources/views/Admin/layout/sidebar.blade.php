<style>

</style>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index-2.html"> <img alt="image" src="{{ asset('assets/img/login-logo.png') }}"
                    class="header-logo" />
                <span class="logo-name"></span>
            </a>
        </div>
        <div class="sidebar-user my-3">
            <div class="sidebar-user-picture">
                @if(!empty(Auth::guard('admin')->user()->image))
                    <img alt="image" src="{{ asset('assets/img/user.png') }}">
                @else
                    <img alt="image" src="{{ asset('assets/img/user.png') }}">
                @endif
            </div>
            <div class="sidebar-user-details">
                <div class="user-name text-white">{{Auth::guard('admin')->user()->first_name}}</div>

            </div>
        </div>
        <ul class="sidebar-menu">

            <li class="dropdown  ">
                <a href="{{ route('admin.dashboard') }}" class=" nav-link"><i
                        data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown  ">
                <a href="/admin/property" class=" nav-link"><i data-feather="home"></i><span>Property</span></a>
            </li>
            <li class="dropdown ">
                <a href="{{route('admin.landlord')}}" class=" nav-link"><i data-feather="user"></i><span>LandLord</span></a>
            </li>
            <li class="dropdown ">
                <a href="{{route('admin.rental')}}" class="nav-link"><i data-feather="users"></i><span>Rental </span></a>
            </li>

        </ul>
    </aside>
</div>
