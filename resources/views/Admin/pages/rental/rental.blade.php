@extends('Admin.layout.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-xl-6">
                                    <h4>Rental</h4>
                                </div>
                                <div class="offset-xl-4 col-xl-2 text-right">
                                    <a href="/admin/addrental" class="btn btn-success btn-block">Add <i
                                            class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Password</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Picture</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center w-1">No Data Available</td>
                                            <td>No Data Available</td>
                                            <td>No Data Available</td>
                                            <td>No Data Available</td>
                                            <td>No Data Available</td>
                                            <td>
                                                <img src="{{ asset('assets/img/user.png') }}" alt="no img " width="50px"
                                                    height="50px" class="img-thumbnail">
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a href="/admin/editrental" class="btn btn-success w-100  "
                                                            title="Add">
                                                            <i class="fa fa-edit">

                                                            </i>
                                                        </a>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <a href="#" class="btn btn-danger w-100 " title="Add">
                                                            <i class="fa fa-trash">

                                                            </i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
