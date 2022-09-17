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
                <span>524</span>
                <div class="progress mt-1 mb-1" data-height="8">
                  <div class="progress-bar l-bg-purple" role="progressbar" data-width="25%" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mb-0 text-sm">
                  <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                  <span class="text-nowrap">Since last month</span>
                </p>
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
                <span>1,258</span>
                <div class="progress mt-1 mb-1" data-height="8">
                  <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mb-0 text-sm">
                  <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                  <span class="text-nowrap">Since last month</span>
                </p>
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
                <span>10,225</span>
                <div class="progress mt-1 mb-1" data-height="8">
                  <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mb-0 text-sm">
                  <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                  <span class="text-nowrap">Since last month</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      
      </div>
  </div>
@endsection