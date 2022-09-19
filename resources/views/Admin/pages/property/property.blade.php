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
                                    <h4>PROPERTIES</h4>
                                </div>
                                <div class="offset-xl-3 col-xl-3">
                                    <a href="/admin/addproperty" class="btn btn-success btn-block">Add Property</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Property Type</th>
                                            <th>Property SubType</th>
                                            <th>Price Range</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <label class="switch ms-5">
                                                    <input type="checkbox" checked>
                                                    <span class="slider round"></span>
                                                  </label>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <a href="/admin/editproperty" class="btn btn-warning "><i class="fa fa-edit"></i></a>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <a class="btn btn-danger "><i class="fa fa-trash"></i></a>
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
