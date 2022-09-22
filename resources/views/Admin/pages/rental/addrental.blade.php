@extends('Admin.layout.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="offset-md-1 col-md-10">
                    <div class="card shadow my-5">
                        <div class="card-header">
                            <h2 class="text-black text-center">Add Rental</h2>
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
                            <form method="post" action="{{route('admin.addrentalprocess')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}" tabindex="2" required>
                                        <span class="text-danger">
                                            {{ $errors->first('first_name') }}
                                        </span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>LastName</label>
                                        <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}" tabindex="2" required>
                                        <span class="text-danger">
                                            {{ $errors->first('last_name') }}
                                        </span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" value="{{old('password')}}" tabindex="2" required>
                                        <span class="text-danger">
                                            {{ $errors->first('password') }}
                                        </span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}" tabindex="2" required>
                                        <span class="text-danger">
                                            {{ $errors->first('password_confirmation') }}
                                        </span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="{{old('email')}}" tabindex="2" required>
                                        <span class="text-danger">
                                            {{ $errors->first('email') }}
                                        </span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number" value="{{old('phone_number')}}" tabindex="2" required>
                                        <span class="text-danger">
                                            {{ $errors->first('phone_number') }}
                                        </span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Profile Picture</label>
                                        <input type="file" class="form-control" name="image" tabindex="2">
                                        <span class="text-danger">
                                            {{ $errors->first('image') }}
                                        </span>
                                    </div>
                                    <div class="form-group offset-md-4 col-md-4 offset-md-4">
                                        <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                                            Add
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
