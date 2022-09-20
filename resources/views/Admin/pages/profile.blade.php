@extends('Admin.layout.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="offset-md-3 col-md-6 position">
                    <div class="card card-primary shadow mt-5">
                        <div class="card-header">
                            <div class="row">
                                <div class=" col-md-12 ">

                                    <h3 class="text-center color"><b>
                                            Profile</b></h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('admin.update.profile')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$profile->id}}">
                                <div class="row">
                                    @if(!empty($profile->image))
                                        <div class="offset-md-3 col-md-6">
                                            {{-- <img src="{{asset('assets\img\user.png')}}" class="w-100 border-50"/> --}}
                                            <img id="frame"
                                                src="{{ asset('storage/profile/' . $profile->image) }}"
                                                class="w-100 border-50" />
                                        </div>
                                    @else
                                        <div class="offset-md-3 col-md-6">
                                            <img src="{{asset('assets\img\user.png')}}" class="w-100 border-50"/>
                                        </div>
                                    @endif
                                </div>
                               <input type="file" name="image" class="mt-4"/>
                                <div class="form-group mt-4">
                                    <label for="first_name">First Name</label>
                                    <input id="first_name" type="text" class="form-control" value="{{$profile->first_name}}" name="first_name"
                                        tabindex="1" required autofocus>
                                    {{ $errors->first('first_name') }}
                                </div>
                                <div class="form-group mt-4">
                                    <label for="last_name">Last Name</label>
                                    <input id="last_name" type="text" class="form-control" value="{{$profile->last_name}}" name="last_name"
                                        tabindex="1" required autofocus>
                                    {{ $errors->first('last_name') }}
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" value="{{$profile->email}}" name="email"
                                        tabindex="1" required autofocus>
                                    {{ $errors->first('email') }}
                                </div>
                                <div class="form-group">
                                    <label for="Phone">Phone Number</label>
                                    <input id="Phone" type="text" class="form-control" value="{{$profile->phone_number}}" name="phone_number"
                                        tabindex="1" required autofocus>
                                    {{ $errors->first('phone_number') }}
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>