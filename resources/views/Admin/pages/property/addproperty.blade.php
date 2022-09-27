@extends('Admin.layout.master')
@section('content')
    <style>
        .mt-32 {
            margin-top: 32px
        }
    </style>
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="offset-md-1 col-md-10">
                    <div class="card shadow">
                        <div class="card-header d-flex justify-content-center">
                            <h2 class="text-black text-center">Add PROPERTY</h2>
                        </div>
                        <div class="card-body">
                            <form>
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="Property Type">Property Type</label>
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
                                    <div class="form-group col-md-6">
                                        <label for="Price range form">Price range from</label>
                                        <input class="form-control" type="number" name="price from" tabindex="2"
                                            required />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="price range to">Price range to</label>
                                        <input class="form-control" type="number" name="price to" tabindex="2"
                                            required />
                                    </div>
                                    <h4 class="text-black text-center">Floor Plans</h4>

                                    <div class="productdiv">
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label for="bathrrom">Bedrooms</label>
                                                <input class="form-control" type="number" name="bed" tabindex="2"
                                                    required />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="bath">Bath</label>
                                                <input class="form-control" type="number" name="bath" tabindex="2"
                                                    required />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="price">Price</label>
                                                <input class="form-control" type="number" name="price" tabindex="2"
                                                    required />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="price">Avalaible</label>
                                                <select class="form-select form-control"
                                                    aria-label="Default select example">
                                                    <option value="1">Avalaible</option>
                                                    <option value="2">Not Avalaible</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <div class="row mt-32 ">
                                                    <div class="col-md-6 ">
                                                        <button type="button" class="btn  w-100 border text-success "
                                                            title="Add" onclick="add()">
                                                            <i data-feather="plus"></i>

                                                        </button>
                                                    </div>
                                                    <div class="col-md-6 text-center ">
                                                        <button type="button" title="remove"
                                                            class="btn  text-danger border w-100 removebtn
                                                            ">
                                                            <i data-feather="minus"></i>
                                                        </button>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div id="moreproduct"> </div>


                                    <h4 class="text-black text-center">About Property</h4>
                                    <div class="form-group col-md-6">
                                        <label for="parking-type">Propertty Type</label>
                                        <select class="form-select form-control" aria-label="Default select example">
                                            <option selected>Select one</option>
                                            <option value="1">All Apartment</option>
                                            <option value="2">All House</option>
                                            <option value="2">All Bedroom</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="parking-type">Property SubType</label>
                                        <select class="form-select form-control" aria-label="Default select example">
                                            <option>All Apartment</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="parking-type">Parking Type</label>
                                        <input class="form-control" type="text" name="Parking-Type" tabindex="2"
                                            required />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Parking-Spot">Parking Spot</label>
                                        <input class="form-control" type="text" name="Parking-Spot" tabindex="2"
                                            required />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Lease-terms">Lease terms</label>
                                        <input class="form-control" type="text" name="Lease-terms" tabindex="2"
                                            required />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Shorts-terms">Shorts terms</label>
                                        <input class="form-control" type="text" name="Shorts-terms" tabindex="2"
                                            required />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Furnished">Furnished</label>
                                        <input class="form-control" type="text" name="Furnished" tabindex="2"
                                            required />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Year-Build">Year Build</label>
                                        <input class="form-control" type="text" name="Year-Build" tabindex="2"
                                            required />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="desc">Description</label>
                                        <textarea name="question" id="step1" style="height: 30vh " class="form-control"></textarea>
                                    </div>
                                    <h4 class="text-success text-center">Features And Amenities</h4>
                                    <div class="form-group col-md-12">
                                        <label for="building">Building Features</label>
                                        <textarea name="question" id="step2" style="height: 30vh " class="form-control"></textarea>
                                    </div>
                                    {{-- <h4>Unit Features</h4> --}}

                                    <div class="form-group col-md-12">
                                        <label for="unit">Unit Features</label>
                                        <textarea name="question" id="step3" style="height: 30vh " class="form-control"></textarea>
                                    </div>
                                    {{-- <h4>Nearby</h4> --}}
                                    <div class="form-group col-md-12">
                                        <label for="nearby">Nearby</label>
                                        <textarea name="question" id="step4" style="height: 30vh " class="form-control"></textarea>
                                    </div>

                                    <div action="/file-upload" class="dropzone form-group" id="my-awesome-dropzone">
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
    {{-- <script> var editor = new FroalaEditor('#froala'); </script> --}}
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            tinymce.init({
                selector: '#step1'
            });

            // end
            tinymce.init({
                selector: '#step2'
            });
            tinymce.init({
                selector: '#step3'
            });
            tinymce.init({
                selector: '#step4'
            });
        })
    </script>

    <script>
        let count = 0;

        function add() {
            count += 1;
            var clone1 = $('.productdiv').clone().first();

            clone1.find('.removebtn').on('click', function() {
                $(this).parents('.productdiv').remove()
            });
            clone1.appendTo('#moreproduct');


        }


        function removeproduct(th) {
            th.parentNode.parentNode.parentNode.parentNode.remove();
        }
    </script>
@endsection
