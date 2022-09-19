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
                                    <a href="{{route('admin.addrental')}}" class="btn btn-success btn-block">Add <i
                                            class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (Session::get('errors'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <strong>{{ Session::get('errors')->first() }}</strong>
                                </div>
                                {!! Session::forget('errors') !!}
                            @endif
                            @if (Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <strong>{{ Session::get('success') }}</strong>
                                </div>
                                {!! Session::forget('success') !!}
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First name</th>
                                            <th>Last Name</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Picture</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($customer))
                                            @foreach($customer as $key => $customer_value)
                                                <tr>
                                                    <td class="text-center w-1">{{$customer_value->id}}</td>
                                                    <td>{{$customer_value->first_name}}</td>
                                                    <td>{{$customer_value->last_name}}</td>
                                                    <td>{{$customer_value->phone_number}}</td>
                                                    <td>{{$customer_value->email}}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/profile/' . $customer_value->image) }}" alt="no img " width="50px"
                                                            height="50px" class="img-thumbnail">
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <a href="{{ route('admin.editrental', ['id' => $customer_value->id]) }}" class="btn btn-success rounded "
                                                                    title="Add">
                                                                    <i class="fa fa-edit">

                                                                    </i>
                                                                </a>
                                                            </div>

                                                            <div class="col-md-1">
                                                                <a onclick="return confirm('Do You Want To Delete This Rental?')"
                                                                    href="{{ route('admin.deleterental', ['id' => $customer_value->id]) }}" class="btn btn-danger rounded " title="Add">
                                                                    <i class="fa fa-trash">

                                                                    </i>
                                                                </a>
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
