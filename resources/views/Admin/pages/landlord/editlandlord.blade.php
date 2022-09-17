@extends('Admin.layout.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="offset-md-1 col-md-10">
                    <div class="card shadow my-5">
                        <div class="card-header">
                            <h2 class="text-black text-center">Edit LandLord</h2>
                        </div>
                        <div class="card-body">
                            <form>
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="password" tabindex="2" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>LastName</label>
                                        <input type="text" class="form-control" name="password" tabindex="2" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" tabindex="2" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="password" tabindex="2" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="password" class="form-control" name="password" tabindex="2" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Profile Picture</label>
                                        <input type="file" class="form-control" name="password" tabindex="2" required>
                                    </div>
                                    <div class="form-group offset-md-4 col-md-4 offset-md-4">
                                        <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                                            Update
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
