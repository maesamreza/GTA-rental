@extends('Admin.layout.master')
@section('content')
    <style>
        .mt-32 {
            margin-top: 32px
        }

        .material-icons {
            font-size: 14px !important;
        }
    </style>
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="offset-md-1 col-md-10">
                    <div class="card shadow">
                        <div class="card-header d-flex justify-content-center">
                            <h2 class="text-success my-3  text-center"> Add PROPERTY</h2>
                        </div>
                        <div class="card-body">
                            <form>
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="Property Type"><i class="fas fa-home"></i> Property Type</label>
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
                                        <label for="Price range form"><i
                                                class="
                                            fas fa-money-bill-wave"></i>
                                            Price range To</label>
                                        <input class="form-control" type="number" name="price from" tabindex="2"
                                            required />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="price range to"><i class="fas fa-money-bill-wave"></i>Price
                                            range From</label>
                                        <input class="form-control" type="number" name="price to" tabindex="2"
                                            required />
                                    </div>
                                    <h4 class="text-success my-3  text-center">Floor Plans</h4>

                                    <div class="productdiv">
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label for="bathrrom"><i
                                                        class="
                                                    fas fa-bed"></i>
                                                    Bedrooms</label>
                                                <input class="form-control" type="number" name="bed" tabindex="2"
                                                    required />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="bath"><i
                                                        class="
                                                    fas fa-bath"></i>
                                                    Bath</label>
                                                <input class="form-control" type="number" name="bath" tabindex="2"
                                                    required />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="price"><i class="fas fa-money-bill-wave"></i> Price</label>
                                                <input class="form-control" type="number" name="price" tabindex="2"
                                                    required />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="price"><i class="fas fa-calendar"></i> Available Date</label>
                                                <input class="form-control" type="date" name="price" tabindex="2"
                                                    required />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="price">Unit Size</label>
                                             <input type="text" class="form-control" name="" id="">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <div class="row mt-32 ">
                                                    <div class="col-md-6 ">
                                                        <button type="button" class="btn  w-100 border text-success  "
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


                                    <h4 class="text-success my-3  text-center">About Property</h4>
                                    <div class="form-group col-md-6">
                                        <label for="parking-type"><i
                                                class="
                                            fas fa-warehouse"></i>
                                            Property Type</label>
                                        <select class="form-select form-control" aria-label="Default select example">
                                            <option selected>Select one</option>
                                            <option value="1">All Apartment</option>
                                            <option value="2">All House</option>
                                            <option value="2">All Bedroom</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="parking-type"><i
                                                class="
                                        fas fa-warehouse"></i>
                                            Property
                                            SubType</label>
                                        <select class="form-select form-control" aria-label="Default select example">
                                            <option>All Apartment</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="parking-type"><i
                                                class="
                                            fas fa-parking"></i>
                                            Parking Type</label>
                                        <input class="form-control" type="text" name="Parking-Type" tabindex="2"
                                            required />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Parking-Spot"><i
                                                class="
                                            fas fa-parking"></i>
                                            Parking Spot</label>
                                        <input class="form-control" type="text" name="Parking-Spot" tabindex="2"
                                            required />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Lease-terms"><i
                                                class="
                                            fas fa-newspaper"></i>
                                            Lease terms</label>
                                        <input class="form-control" type="text" name="Lease-terms" tabindex="2"
                                            required />
                                    </div>
                                    {{-- <div class="form-group col-md-6">
                                        <label for="Shorts-terms"><i
                                                class="
                                            fas fa-file-contract"></i>
                                            Shorts terms</label>
                                        <input class="form-control" type="text" name="Shorts-terms" tabindex="2"
                                            required />
                                    </div> --}}
                                    {{-- <div class="form-group col-md-6">
                                        <label for="Furnished"><i class="fas fa-hotel"></i> Furnished</label>
                                        <input class="form-control" type="text" name="Furnished" tabindex="2"
                                            required />
                                    </div> --}}
                                    {{-- <div class="form-group col-md-6">
                                        <label for="Year-Build"><i
                                                class="
                                            fas fa-calendar-alt"></i>
                                            Year Build</label>
                                        <input class="form-control" type="text" name="Year-Build" tabindex="2"
                                            required />
                                    </div> --}}
                                    <div class="form-group col-md-12">
                                        <label for="desc"><i
                                                class="
                                            fas fa-sticky-note"></i>
                                            Description</label>
                                        <textarea name="question" id="step1" style="height: 10vh " class="form-control"></textarea>
                                    </div>
                                    <h4 class="text-success text-center">Features And Amenities</h4>
                                    {{-- Year --}}
                                    <div class="form-group col-md-3">
                                        <label for="unit"><i class="fas fa-calendar"></i> Year</label>
                                        <input type="month" class="form-control" placeholder="MMMM/YY" name=""
                                            id="">
                                    </div>
                                    {{-- Pet Firendly --}}
                                    <div class="form-group col-md-3">
                                        <label for="unit">
                                            <i class="material-icons">pets</i> Pet Firendly</label>
                                        <select class="form-control form-select">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                    {{-- Furnished? --}}
                                    <div class="form-group col-md-3">
                                        <label for="unit"><i class="fas fa-hotel"></i> Furnished?</label>
                                        <select class="form-control form-select">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                    {{-- Short Term? --}}
                                    <div class="form-group col-md-3">
                                        <label for="unit"><i
                                                class="
                                        fas fa-file-contract"></i>
                                            Short Term?</label>
                                        <select class="form-control form-select">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                    {{-- Date and time --}}
                                    <div class="producttime">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for=""><i class="fas fa-calendar"></i> Date</label>
                                                <input type="date" class="form-control" name=""
                                                    id="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for=""><i class="fas fa-clock"></i> Start Time</label>
                                                <input type="time" class="form-control" name=""
                                                    id="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for=""><i class="fas fa-clock"></i> End Time</label>
                                                <input type="time" class="form-control" name=""
                                                    id="">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <div class="row mt-32 ">
                                                    <div class="col-md-6 ">
                                                        <button type="button" class="btn  w-100 border text-success "
                                                            title="Add" onclick="addtime()">
                                                            <i data-feather="plus"></i>

                                                        </button>
                                                    </div>
                                                    <div class="col-md-6 text-center ">
                                                        <button type="button" title="remove"
                                                            class="btn  text-danger border w-100 removetime
                        ">
                                                            <i data-feather="minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="moretime"></div>
                                    {{-- Comercial Building --}}
                                    <div class="form-group col-md-6">
                                        <label for="unit"><i
                                                class="
                                            far fa-building"></i>
                                            Comercial Building</label>

                                        <select class="selectpicker form-control" multiple
                                            aria-label="Default select example" data-live-search="true">
                                            <option value="">Commercial Access Gate</option>
                                            <option value="">Commercial Heating</option>
                                            <option value="">Commercial Securtiy Guard</option>
                                            <option value="">Commercial Air Conditoning</option>
                                            <option value="">Commercial Locking Dock</option>
                                        </select>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="unit"><i
                                                class="
                                            fas fa-building"></i>
                                            Building Feature</label>
                                        <select class="selectpicker form-control" multiple
                                            aria-label="Default select example" data-live-search="true">
                                            <option value="">24h Security</option>
                                            <option>Bbq Area/Courtyard</option>
                                            <option> Bike Racks</option>
                                            <option>Bike Room </option>
                                            <option> Buzzer Entry </option>
                                            <option> Central Air Conditioning </option>
                                            <option> Electric Vehicle Charger </option>
                                            <option>Elevator </option>
                                            <option>Exercise Room </option>
                                            <option>Fitness Area </option>
                                            <option> Garage </option>
                                            <option> Guest Suite </option>
                                            <option> Intercom </option>
                                            <option> Jacuzzi </option>
                                            <option> Laundry Facilities </option>
                                            <option> Movie Room </option>
                                            <option> On-Site Management </option>
                                            <option> On-Site Staff </option>
                                            <option> Parking - Underground </option>
                                            <option> Parking - Visitor </option>
                                            <option> Party Room </option>
                                            <option> Pet Friendly </option>
                                            <option> Pool - Heated </option>
                                            <option> Pool - Rooftop </option>
                                            <option> Professionally Managed </option>
                                            <option> Recreation Room </option>
                                            <option> Recycling </option>
                                            <option> Resident Managers </option>
                                            <option> Rooftop Deck </option>
                                            <option> Rooftop Garden </option>
                                            <option> Rooftop Lounge</option>
                                            <option> Sauna </option>
                                            <option> Secured Access </option>
                                            <option> Security On-Site </option>
                                            <option> Storage Lockers </option>
                                            <option> Swimming Pool </option>
                                            <option> Tennis Court </option>
                                            <option> Theatre Room </option>
                                            <option> Video Surveillance </option>


                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="unit">
                                            <i class="material-icons">format_list_numbered</i> Unit Features</label>

                                        <select class="selectpicker form-control" multiple
                                            aria-label="Default select example" data-live-search="true">
                                            <option value=""> Air Conditioning </option>
                                            <option value=""> Alarm System</option>
                                            <option value=""> Backyard</option>
                                            <option value=""> Balcony</option>
                                            <option value=""> Bbq Grill</option>
                                            <option value=""> Blinds</option>
                                            <option value=""> Cable Ready</option>
                                            <option value=""> Dishwasher</option>
                                            <option value=""> Dryer</option>
                                            <option value=""> Ensuite Laundry</option>
                                            <option value=""> Fireplace </option>
                                            <option value=""> Flooring - Carpeted </option>
                                            <option value=""> Flooring - Ceramic</option>
                                            <option value=""> Flooring - Hardwood</option>
                                            <option value=""> Flooring - Laminate</option>
                                            <option value=""> Flooring - Laminate Hardwood</option>
                                            <option value=""> Flooring - Tile</option>
                                            <option value=""> Flooring - Vinyl</option>
                                            <option value=""> Flooring - Wood</option>
                                            <option value=""> Freshly Painted</option>
                                            <option value=""> Furnished</option>
                                            <option value=""> Garburator</option>
                                            <option value=""> Garden</option>
                                            <option value=""> Gas Heating</option>
                                            <option value=""> Granite Countertops</option>
                                            <option value=""> Hot Tub</option>
                                            <option value=""> Individual Thermostats</option>
                                            <option value=""> Island</option>
                                            <option value=""> Microwave</option>
                                            <option value=""> New Appliances</option>
                                            <option value=""> Newly Renovated</option>
                                            <option value=""> Parking</option>
                                            <option value=""> Patio</option>
                                            <option value=""> Pool - Private</option>
                                            <option value=""> Private Entry</option>
                                            <option value=""> Private Yard</option>
                                            <option value=""> Radiant Heat</option>
                                            <option value=""> Security Cameras</option>
                                            <option value=""> Shared Yard</option>
                                            <option value=""> Storage</option>
                                            <option value=""> Terrace</option>
                                            <option value=""> Walk-In Closet</option>
                                            <option value=""> Washer</option>
                                            <option value=""> Wheelchair Access</option>
                                            <option value=""> Window Coverings</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="unit"><i
                                                class="
                                            fas fa-map-marked"></i>
                                            Nearby</label>

                                        <select class="selectpicker form-control" multiple
                                            aria-label="Default select example" data-live-search="true">
                                            <option value=""> 24h Emergency</option>
                                            <option value=""> Atm</option>
                                            <option value=""> Bank</option>
                                            <option value=""> Bars</option>
                                            <option value=""> Bike Trails</option>
                                            <option value=""> Bus Stop</option>
                                            <option value=""> Cafe</option>
                                            <option value=""> Convenience Store</option>
                                            <option value=""> Daycare</option>
                                            <option value=""> Dog Park</option>
                                            <option value=""> Gas Station</option>
                                            <option value=""> Grocery Store</option>
                                            <option value=""> Gym</option>
                                            <option value=""> Highway</option>
                                            <option value=""> Hospital</option>
                                            <option value=""> Movie Theater</option>
                                            <option value=""> Parks</option>
                                            <option value=""> Playground</option>
                                            <option value=""> Pool</option>
                                            <option value=""> Public Library</option>
                                            <option value=""> Public Transit</option>
                                            <option value=""> Recreation</option>
                                            <option value=""> Restaurants</option>
                                            <option value=""> Running Path</option>
                                            <option value=""> School</option>
                                            <option value=""> Schools</option>
                                            <option value=""> Shopping</option>
                                            <option value=""> Shopping Centre</option>
                                        </select>

                                    </div>
                                    {{-- Utilites --}}
                                    <div class="form-group col-md-6">
                                        <label for="unit"><i
                                                class="
                                            fas fa-plug"></i>
                                            Utilies Included</label>

                                        <select class="selectpicker form-control" multiple
                                            aria-label="Default select example" data-live-search="true">
                                            <option value="">Cable</option>
                                            <option value="">Heating</option>
                                            <option value="">Hydro/Electricity</option>
                                            <option value="">Wifi/Internet</option>
                                            <option value="">Saltelite TV</option>
                                            <option value="">Water</option>
                                        </select>
                                    </div>
                                    {{-- Categories --}}
                                    <div class="form-group col-md-6">
                                        <label for="unit">
                                            <i class="material-icons">more_horiz</i> Categories</label>

                                        <select class="selectpicker form-control" multiple
                                            aria-label="Default select example" data-live-search="true">
                                            <option value="">Coporate Housing</option>
                                            <option value="">Student Housing</option>
                                            <option value="">Senior Housing</option>
                                            <option value="">Co-op Housing</option>
                                            <option value="">Sublet</option>
                                            <option value="">Vacation</option>
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="offset-md-4 col-md-4 offset-md-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success btn-lg btn-block mt-5 pt-3"
                                                    tabindex="4">
                                                    <h6>
                                                        Add
                                                    </h6>
                                                </button>
                                            </div>

                                        </div>
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

        function addtime() {
            count += 1;
            var clone1 = $('.producttime').clone().first();

            clone1.find('.removetime').on('click', function() {
                $(this).parents('.producttime').remove()
            });
            clone1.appendTo('#moretime');


        }


        function removeproduct(th) {
            th.parentNode.parentNode.parentNode.parentNode.remove();
        }
    </script>
@endsection
