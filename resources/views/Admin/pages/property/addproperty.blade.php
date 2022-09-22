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
    @php
        $year=date("Y");
        //dd($year)
        $property_type=["Condo","Apartment","House","Room"];
        $apartment_type=["Apartment","Studio","Bachelor","Basment","Duplex","Loft"];
        $house_type=["House","Town House","Multi Unit","Cabin","Cottage"];
        $room_type=["Private Room","Shared Room"];
        $utility_include=["Cable","Heating","Hydro/Electricity","Wifi/Internet","Saltelite TV","Water"];
        $category=["Coporate Housing","Student Housing","Senior Housing","Co-op Housing","Sublet","Vacation"];
        $yes_no=["Yes","No"];
        $lease_term=["yearly","monthly","negotiable"];
        $parking_type=["No Parking","Garage","Driveway","Underg","Street"];
        $comercial_building=["Commercial Access Gate","Commercial Heating","Commercial Securtiy Guard","Commercial Air Conditoning","Commercial Locking Dock"];
        $building_feature=["24h Security","Bbq Area/Courtyard","Bike Racks","Bike Room","Buzzer Entry","Central Air Conditioning","Electric Vehicle Charger","Elevator","Exercise Room","Fitness Area","Garage","Guest Suite","Intercom","Jacuzzi","Laundry Facilities","Movie Room","On-Site Management","On-Site Staff","Parking - Underground","Parking - Visitor","Party Room","Pet Friendly","Pool - Heated","Pool - Rooftop","Professionally Managed","Recreation Room","Recycling","Resident Managers","Rooftop Deck","Rooftop Lounge","Sauna","Secured Access","Security On-Site","Storage Lockers","Swimming Pool","Tennis Court","Theatre Room","Video Surveillance"];
        $near_by=["24h Emergency","Atm","Bank","Bars","Bike","Bus Stop","Cafe","Convenience Store","Daycare","Dog Park","Gas Station","Grocery Store","Gym","Highway","Hospital","Movie","Parks","Playground","Pool - Public Library","Public Transit","Recreation","Restaurants","Running Path","School","Schools","Shopping","Shopping Centre"]; 
        $unit_feature=["Air Conditioning","Alarm System","Backyard","Balcony","Bbq Grill","Blinds","Cable Ready","Dishwasher","Dryer","Ensuite","Fireplace","Flooring - Carpeted","Flooring - Ceramic","Flooring - Hardwood","Flooring - Laminate","Flooring - Laminate Hardwood","Flooring - Tile","Flooring - Vinyl","Flooring - Wood","Freshly Painted","Furnished","Garburator","Garden","Gas Heating","Granite Countertops","Hot Tub","Individual Thermostats","Island","Microwave","New Appliances","Newly Renovated","Parking","Patio","Pool - Private","Private Entry","Private Yard","Radiant Heat","Security Cameras","Shared Yard","Storage","Terrace","Walk-In Closet","Washer","Wheelchair Access","Window Coverings"];

    @endphp
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="offset-md-1 col-md-10">
                    <div class="card shadow">
                        <div class="card-header d-flex justify-content-center">
                            <h2 class="text-success my-3  text-center"> Add PROPERTY</h2>
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
                            <form method="post" action="{{route('admin.addpropertyprocess')}}">
                                @csrf
                                <input type="hidden" name="lng" id="lng" value="{{ old('lng') }}" />
                                <input type="hidden" name="lat" id="lat" value="{{ old('lat') }}" />
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="property_type"><i class="fas fa-home"></i> Property Type</label>
                                        <select class="form-select" id="property_type" name="property_type" aria-label="Default select example">
                                            @foreach($property_type as $key => $property_type_val)
                                               <option value="{{$property_type_val}}" @if(old('property_type')==$property_type_val) selected @endif >{{$property_type_val}}</option> 
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            {{ $errors->first('property_type') }}
                                        </span>
                                    </div>
                                    <div class="form-group col-md-12" style="display:none" id="apartment_type">
                                        <label for="sub_property_type"><i class="fas fa-home"></i>Apartment Type:</label>
                                        <select class="form-select" name="sub_property_type" aria-label="Default select example">
                                            @foreach($apartment_type as $key => $apartment_type_val)
                                               <option value="{{$apartment_type_val}}" @if(old('sub_property_type')==$apartment_type_val) selected @endif >{{$apartment_type_val}}</option> 
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            {{ $errors->first('sub_property_type') }}
                                        </span>
                                    </div>
                                    <div class="form-group col-md-12" id="house_type" style="display:none">
                                        <label for="sub_property_type2"><i class="fas fa-home"></i>House Type:</label>
                                        <select class="form-select"id="sub_property_type2" name="sub_property_type" aria-label="Default select example">
                                            @foreach($house_type as $key => $house_type_val)
                                               <option value="{{$house_type_val}}" @if(old('sub_property_type')==$house_type_val) selected @endif >{{$house_type_val}}</option> 
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            {{ $errors->first('sub_property_type') }}
                                        </span>
                                    </div>
                                    <div class="form-group col-md-12" id="room_type" style="display:none">
                                        <label for="sub_property_type3"><i class="fas fa-home"></i>Room Type:</label>
                                        <select class="form-select" id="sub_property_type3" name="sub_property_type" aria-label="Default select example">
                                            @foreach($room_type as $key => $room_type_val)
                                               <option value="{{$room_type_val}}" @if(old('sub_property_type')==$room_type_val) selected @endif >{{$room_type_val}}</option> 
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            {{ $errors->first('sub_property_type') }}
                                        </span>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <label for="parking-type"><i
                                                class="
                                            fas fa-parking"></i>
                                            Address</label>
                                        <input class="form-control" type="text" name="address" value="{{old('address')}}" id="location" tabindex="2"
                                            required />
                                        <span class="text-danger">
                                            {{ $errors->first('address') }}
                                        </span>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="parking-type"><i
                                                class="
                                            fas fa-parking"></i>
                                            Unit</label>
                                        <input class="form-control" type="text" name="unit" value="{{old('unit')}}" tabindex="2"
                                             />
                                        <span class="text-danger">
                                            {{ $errors->first('unit') }}
                                        </span>
                                    </div>
                                    {{-- <div class="form-group col-md-6">
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
                                    </div> --}}
                                    


                                    <h4 class="text-success my-3  text-center">Property Details</h4>
                                    {{-- <div class="form-group col-md-6">
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
                                    </div> --}}

                                    {{-- Utilites --}}
                                    <div class="form-group col-md-6">
                                        <label for="unit"><i
                                                class="
                                            fas fa-plug"></i>
                                            Utilies Included</label>

                                        <select class="selectpicker form-control" name="untility_name[]" multiple
                                            aria-label="Default select example" data-live-search="true">
                                            @foreach($utility_include as $key => $utility_include_val)
                                               <option value="{{$utility_include_val}}">{{$utility_include_val}}</option> 
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            {{ $errors->first('untility_name') }}
                                        </span>
                                    </div>
                                    {{-- Categories --}}
                                    <div class="form-group col-md-6">
                                        <label for="unit">
                                            <i class="material-icons">more_horiz</i> Categories</label>

                                        <select class="selectpicker form-control" name="category_name[]" multiple
                                            aria-label="Default select example" data-live-search="true">
                                            @foreach($category as $key => $category_val)
                                               <option value="{{$category_val}}">{{$category_val}}</option> 
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            {{ $errors->first('category_name') }}
                                        </span>
                                    </div>
                                    {{-- Year --}}
                                    <div class="form-group col-md-6">
                                        <label for="unit"><i class="fas fa-calendar"></i> Year</label>
                                         <select class="form-control form-select" name="year_build">
                                           <option value="" >Select year</option>
                                            @for($i = 1800; $i <= $year; $i++)
                                                <option value="{{$i}}" @if(old('year_build')==$i) selected @endif>{{$i}}</option>
                                            @endfor
                                        </select>
                                        <span class="text-danger">
                                            {{ $errors->first('year_build') }}
                                        </span>
                                    </div>
                                    {{-- Pet Firendly --}}
                                    <div class="form-group col-md-6">
                                        <label for="unit">
                                            <i class="material-icons">pets</i> Pet Firendly</label>
                                        <select class="form-control form-select" name="pet_friendly">
                                            <option value="" >Select Pet Firendly</option>
                                            @foreach($yes_no as $key => $yes_no_val)
                                               <option value="{{$yes_no_val}}" @if(old('pet_friendly')==$yes_no_val) selected @endif>{{$yes_no_val}}</option> 
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            {{ $errors->first('year') }}
                                        </span>
                                    </div>
                                    {{-- Furnished? --}}
                                    <div class="form-group col-md-6">
                                        <label for="unit"><i class="fas fa-hotel"></i> Furnished?</label>
                                        <select class="form-control form-select" name="furnished">
                                            <option value="" >Select Furnished</option> 
                                            @foreach($yes_no as $key => $yes_no_val)
                                               <option value="{{$yes_no_val}}" @if(old('furnished')==$yes_no_val) selected @endif>{{$yes_no_val}}</option> 
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            {{ $errors->first('furnished') }}
                                        </span>
                                    </div>
                                    {{-- Short Term? --}}
                                    <div class="form-group col-md-6">
                                        <label for="unit"><i
                                                class="
                                        fas fa-file-contract"></i>
                                            Short Term?</label>
                                        <select class="form-control form-select" name="short_term">
                                            <option value="" >Select Short Term</option> 
                                            @foreach($yes_no as $key => $yes_no_val)
                                               <option value="{{$yes_no_val}}" @if(old('short_term')==$yes_no_val) selected @endif>{{$yes_no_val}}</option> 
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            {{ $errors->first('short_term') }}
                                        </span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Lease-terms"><i
                                                class="
                                            fas fa-newspaper"></i>
                                            Lease terms</label>
                                        <select class="form-control form-select" name="lease_term" required>
                                            @foreach($lease_term as $key => $lease_term_val)
                                               <option value="{{$lease_term_val}}" @if(old('lease_term')==$lease_term_val) selected @endif>{{$lease_term_val}}</option> 
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            {{ $errors->first('lease_term') }}
                                        </span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="parking-type"><i
                                                class="
                                            fas fa-parking"></i>
                                            Parking Type</label>
                                        <select class="form-control form-select" name="parking_type">
                                           <option value="">Select Parking Type</option> 
                                           @foreach($parking_type as $key => $parking_type_val)
                                               <option value="{{$parking_type_val}}" @if(old('parking_type')==$lease_term_val) selected @endif>{{$parking_type_val}}</option> 
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            {{ $errors->first('parking_type') }}
                                        </span>
                                    </div>
                                    <h4 class="text-success my-3  text-center">Floor Plans</h4>

                                    <div class="productdiv">
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label for="bathrrom"><i
                                                        class="
                                                    fas fa-bed"></i>
                                                    Bedrooms</label>
                                                <input class="form-control" step="0.5" type="number" name="bedroom[]" tabindex="2"
                                                    required />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="bath"><i
                                                        class="
                                                    fas fa-bath"></i>
                                                    Bath</label>
                                                <input class="form-control" step="0.5" type="number" name="bathroom[]" tabindex="2"
                                                    required />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="price"><i class="fas fa-money-bill-wave"></i> Price</label>
                                                <input class="form-control" type="number" name="rent[]" tabindex="2"
                                                    required />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="price"><i class="fas fa-calendar"></i> Available Date</label>
                                                <input class="form-control" type="date" name="availability[]" tabindex="2"
                                                    required />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="price">Unit Size</label>
                                                <input type="text" class="form-control" name="unit_size[]" id="">
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

                                    <h4 class="text-success my-3  text-center">Photos</h4>
                                    <div class="form-group col-md-12">
                                        <div class="dropzone" id="file-dropzone">
                                           @if(!empty($property->propertyImage))
                                                @foreach($property->propertyImage as $key => $iamge_val)
                                                    <div id="div{{$iamge_val->id}}" class="dz-preview dz-processing dz-image-preview dz-complete">  <div class="dz-image"><img data-dz-thumbnail="" alt="{{$iamge_val->image}}" src="{{ asset('storage/propertyimage/' . $iamge_val->image) }}">
                                                    </div>  <div class="dz-details">    <div class="dz-size"><span data-dz-size=""><strong></strong></span></div>    <div class="dz-filename"><span data-dz-name="">{{$iamge_val->image}}</span></div>  </div>  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress="" style="width: 100%;"></span></div>  <div class="dz-error-message"><span data-dz-errormessage=""></span></div>  <div class="dz-success-mark">    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">      <title>Check</title>      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">        <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF"></path>      </g>    </svg>  </div>  <div class="dz-error-mark">    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">      <title>Error</title>      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">        <g stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">          <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"></path>        </g>      </g>    </svg>  </div><a class="dz-remove image-remove" href="javascript:undefined;" data-id="{{$iamge_val->id}}" data-dz-remove="">Remove file</a></div>
                                                @endforeach
                                           @endif 
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="desc"><i
                                                class="
                                            fas fa-sticky-note"></i>
                                            Description</label>
                                        <textarea name="description" id="step1" style="height: 10vh " class="form-control">{{old('description')}}</textarea>
                                        <span class="text-danger">
                                            {{ $errors->first('description') }}
                                        </span>
                                    </div>
                                    {{-- <div class="form-group col-md-4">
                                        <label for="Parking-Spot"><i
                                                class="
                                            fas fa-parking"></i>
                                            Parking Spot</label>
                                        <input class="form-control" type="text" name="Parking-Spot" tabindex="2"
                                            required />
                                    </div> --}}
                                    
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
                                   
                                    <h4 class="text-success text-center">Features And Amenities</h4>
                                    
                                   
                                    {{-- Comercial Building --}}
                                    <div class="form-group col-md-6">
                                        <label for="unit"><i
                                                class="
                                            far fa-building"></i>
                                            Comercial Building</label>

                                        <select class="selectpicker form-control" name="commercial_building_name[]" multiple
                                            aria-label="Default select example" data-live-search="true">
                                            @foreach($comercial_building as $key => $comercial_building_val)
                                               <option value="{{$comercial_building_val}}">{{$comercial_building_val}}</option> 
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            {{ $errors->first('commercial_building_name') }}
                                        </span>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="unit"><i
                                                class="
                                            fas fa-building"></i>
                                            Building Feature</label>
                                        <select class="selectpicker form-control" name="building_feature_name[]" multiple
                                            aria-label="Default select example" data-live-search="true">
                                            @foreach($building_feature as $key => $building_feature_val)
                                               <option value="{{$building_feature_val}}">{{$building_feature_val}}</option> 
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            {{ $errors->first('building_feature_name') }}
                                        </span>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="unit">
                                            <i class="material-icons">format_list_numbered</i> Unit Features</label>
                                           
                                        <select class="selectpicker form-control" name="unit_feature_name[]" multiple
                                            aria-label="Default select example" data-live-search="true">
                                            @foreach($unit_feature as $key => $unit_feature_val)
                                               <option value="{{$unit_feature_val}}">{{$unit_feature_val}}</option> 
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            {{ $errors->first('unit_feature_name') }}
                                        </span>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="unit"><i
                                                class="
                                            fas fa-map-marked"></i>
                                            Nearby</label>

                                        <select class="selectpicker form-control" name="near_by_name[]" multiple
                                            aria-label="Default select example" data-live-search="true">
                                            @foreach($near_by as $key => $near_by_val)
                                               <option value="{{$near_by_val}}">{{$near_by_val}}</option> 
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            {{ $errors->first('near_by_name') }}
                                        </span>
                                    </div>
                                    <h4 class="text-success text-center">Open House Dates</h4>
                                     {{-- Date and time --}}
                                    <div class="producttime">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for=""><i class="fas fa-calendar"></i> Date</label>
                                                <input type="date" class="form-control" name="date[]"
                                                    id="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for=""><i class="fas fa-clock"></i> Start Time</label>
                                                <input type="time" class="form-control" name="start_time[]"
                                                    id="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for=""><i class="fas fa-clock"></i> End Time</label>
                                                <input type="time" class="form-control" name="end_time[]"
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
                                                            class="btn  text-danger border w-100 removetime">
                                                            <i data-feather="minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="moretime"></div>
                                    
                                   
                                    {{-- <div method="post" action="{{route('admin.uploadpropertyImage')}}" class="dropzone form-group" id="my-awesome-dropzone">
                                       
                                        <input type="" class="d-none" name="" />
                                    </div> --}}

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
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAt9IOK_D-YxRKKyZgzwyJxxWO503VzHEQ&callback=initAutocomplete&libraries=places&v=weekly"
        defer></script>
    <script>
        let placeSearch;
        let autocomplete;
        //var input =document.getElementsByClassName('address')
        var venue_address = document.getElementById('location');
        //alert(venue_address);
        //len=street.length;
        function initAutocomplete() {
            //for (i = 0; i <street.length; i++) {
            //var input = street[i];
            //alert(street[i]);
            autocomplete = new google.maps.places.Autocomplete(venue_address, {
                types: ["geocode"]
            });
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                document.getElementById('lat').value = place.geometry.location.lat();
                document.getElementById('lng').value = place.geometry.location.lng();
            });

            //alert(lat);
            //}
        }
    </script>
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

            $(document).on('change', '#property_type', function() {
               var property_type=$(this).val();
               //alert(property_type);
               if(property_type=="Apartment"){
                 $('#apartment_type').show()
                 $('#house_type').hide()
                 $('#room_type').hide()
               }else if(property_type=="House"){
                 $('#apartment_type').hide()
                 $('#house_type').show()
                 $('#room_type').hide()
               }else if(property_type=="Room"){
                 $('#apartment_type').hide()
                 $('#house_type').hide()
                 $('#room_type').show()
               }else{
                 $('#apartment_type').hide()
                 $('#house_type').hide()
                 $('#room_type').hide()
               }
            });

            $(document).on('click', '.image-remove', function() {
                var id=$(this).attr("data-id");
                $.ajax({
                type: 'POST',
                url: '{{ route("admin.removepropertyImageById") }}',
                data: { "_token": "{{ csrf_token() }}", id: id},
                success: function (data){
                    $("#div"+id).remove()
                    console.log("File has been successfully removed!!");
                },
                error: function(e) {
                    console.log(e);
                }});
                //alert(id);
            })

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
    
<script>
  Dropzone.options.fileDropzone = {
    url: '{{ route("admin.uploadpropertyImage") }}',
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    addRemoveLinks: true,
    maxFilesize: 8,
    headers: {
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    removedfile: function(file)
    {
      var name = file.upload.filename;
      $.ajax({
        type: 'POST',
        url: '{{ route("admin.removepropertyImage") }}',
        data: { "_token": "{{ csrf_token() }}", name: name},
        success: function (data){
            console.log("File has been successfully removed!!");
        },
        error: function(e) {
            console.log(e);
        }});
        var fileRef;
        return (fileRef = file.previewElement) != null ?
        fileRef.parentNode.removeChild(file.previewElement) : void 0;
    },
    success: function (file, response) {
      console.log(file);
    },
  }
  </script>
@endsection
