@extends('Admin.layout.master')
@section('property','active')
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
                                    <a href="{{route('admin.addproperty')}}" class="btn btn-success btn-block">Add Property</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Property Type</th>
                                            <th>Property SubType</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @if(!empty($property))
                                            @foreach($property as $key => $property_val)
                                                <tr>
                                                    <td>{{$property_val->id}}</td>
                                                    <td>{{$property_val->property_type}}</td>
                                                    <td>{{$property_val->sub_property_type}}</td>
                                                    <td>{{$property_val->address}}</td>
                                                    <td>
                                                        {{-- <label class="switch ms-5">
                                                            <input type="checkbox" @if($property_val->is_active==1) checked @endif>
                                                            <span class="slider round"></span>
                                                        </label> --}}
                                                        @if($property_val->is_active==0)
                                                            Not Approved
                                                        @else
                                                             Approved
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <a href="{{ route('admin.editproperty', ['id' => $property_val->id]) }}" class="btn btn-warning "><i class="fa fa-edit"></i></a>
                                                            </div>
                                                            <div class="col-md-6">

                                                                <a onclick="return confirm('Do You Want To Delete This Property?')"
                                                                    href="{{ route('admin.deleteproperty', ['id' => $property_val->id]) }}" class="btn btn-danger "><i class="fa fa-trash"></i></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                       @endif  

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
