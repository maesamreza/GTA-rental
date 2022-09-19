@extends('Admin.layout.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">Admin</h4>
                </li>
                <li class="breadcrumb-item">
                    <a href="index-2.html">
                        <i data-feather="home"></i></a>
                </li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ul>

            <div class="row ">
                <div class="col-xl-4 col-lg-6">
                    <div class="card l-bg-style1">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Property</h4>
                                <h6>524</h6>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="card l-bg-style2">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">LandLord</h4>
                                <h6>1,258</h6>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="card l-bg-style3">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">User</h4>
                                <h6>10,225</h6>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </div>
@endsection
