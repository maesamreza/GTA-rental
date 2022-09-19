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
                            <form>
                                @csrf
                                <div class="row">
                                    <div class="offset-md-3 col-md-6">
                                        <img src="{{asset('assets\img\user.png')}}" class="w-100 border-50"/>
                                    </div>
                                </div>
                               <input type="file" class="mt-4"/>
                                <div class="form-group mt-4">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="name"
                                        tabindex="1" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                        tabindex="1" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="Phone">Phone Number</label>
                                    <input id="Phone" type="Phone" class="form-control" name="Phone"
                                        tabindex="1" required autofocus>
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