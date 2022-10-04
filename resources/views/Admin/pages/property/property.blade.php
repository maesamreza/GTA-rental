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
                                            <th>Added By</th>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>Property Type</th>
                                            <th>Property SubType</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Status Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @if(!empty($property))
                                            @foreach($property as $key => $property_val)
                                                <tr>
                                                    <td>{{$property_val->id}}</td>
                                                    <td>@if(!empty($property_val->user) && $property_val->user->role_id==1) Admin @elseif(!empty($property_val->user) && $property_val->user->role_id==2) Landlord @else Rental @endif</td>
                                                    <td>@if(!empty($property_val->user)){{$property_val->user->email}}@endif</td>
                                                    <td>@if(!empty($property_val->user)){{$property_val->user->first_name}}@endif</td>
                                                    <td>{{$property_val->property_type}}</td>
                                                    <td>{{$property_val->sub_property_type}}</td>
                                                    <td>{{$property_val->address}}</td>
                                                    <td>
                                                        {{-- <label class="switch ms-5">
                                                            <input type="checkbox" @if($property_val->is_active==1) checked @endif>
                                                            <span class="slider round"></span>
                                                        </label> --}}
                                                        @if($property_val->is_active==0)
                                                            Deactive
                                                        @else
                                                             Active
                                                        @endif
                                                    </td>
                
                                                    <td>
                                                        <select class="form-select form-control status" data-id="{{$property_val->id}}">
                                                            <option value="0" @if($property_val->is_active==0) selected @endif>Deactive</option>
                                                            <option value="1" @if($property_val->is_active==1) selected @endif>Active</option>
                                                        </select>
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
@section('script')
<script>
    $(document).ready(function() {
        //$('.status').on('change', function() {
        $(document).on("change",".status",function(){
            var status = $(this).val();
            var id = $(this).data("id");
            $.ajax({
                url: "{{ route('admin.property.status.change') }}",
                type: "GET",
                data: {
                    'status': status,
                    'id': id
                },
                success: function(data) {
                    location.reload();
                    //$('#develop_list').html(data)
                    //console.log(data);
                }
            });
            //alert(id);
        });
    });

    // $(document).ready( function () {
    //     $('#ahmed').DataTable();
    // } );
</script>
@endsection
