<style>
 
</style>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index-2.html"> <img alt="image" src="{{ asset('assets/img/logo1.png') }}" class="header-logo" />
                <span class="logo-name"></span>
            </a>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-picture">
                <img alt="image" src="{{ asset('assets/img/user.png') }}">
            </div>
            <div class="sidebar-user-details">
                <div class="user-name">Admin</div>

            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
             <li class="dropdown  ">
                <a href="{{route('admin.dashboard')}}" class=" nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown  ">
                <a href="/admin/property" class=" nav-link"><i data-feather="monitor"></i><span>Property</span></a>
            </li>
            <li class="dropdown ">
                <a href="#" class=" nav-link"><i data-feather="monitor"></i><span>LandLord</span></a>
            </li>
            <li class="dropdown ">
                <a href="#" class="nav-link"><i data-feather="monitor"></i><span>User</span></a>
            </li>

        </ul>
    </aside>
</div>
