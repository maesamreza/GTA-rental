@extends('Admin.layout.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="offset-md-1 col-md-10">
                    <div class="card shadow">
                        <div class="card-header">
                            <h2 class="text-black text-center">ADD PROPERTY</h2>
                        </div>
                        <div class="card-body">
                            <form>
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="image-upload">Property Type</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option disabled class="fs-4">All Apartment</option>
                                            <option value="1">Apartment</option>
                                            <option value="2">Studio</option>
                                            <option value="3">Bachelor</option>
                                            <option value="4">Basment</option>
                                            <option value="5">Duplex</option>
                                            <option value="6">Loft</option>
                                            <option disabled class="fs-4">All House</option>
                                                <option value="7">House</option>
                                                <option value="8">Town House</option>
                                                <option value="9">Multi Unit</option>
                                                <option value="10">cabin</option>
                                                <option value="11">cottage</option>
                                                <option disabled class="fs-4">All Bedroom</option>
                                            <option value="12">Private Bedroom</option>
                                            <option value="13">Share Bedroom</option>
                                          </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="image-upload">Property range form</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Property Address</label>
                                            <label for="password" class="control-label">Floor Plan Cloning</label>
                                            <label for="password" class="control-label">price range start</label>
                                            <label for="password" class="control-label">price range end</label>
                                            <label for="password" class="control-label"></label>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2" required>
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>
                                    <div action="/file-upload" class="dropzone" id="my-awesome-dropzone">
                                        <input type="" class="d-none" name="" />
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
