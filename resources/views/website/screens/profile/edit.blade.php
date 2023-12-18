@extends('layouts.website.layout1')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Page Heading -->

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    
     <div class="card-body">
        <form action="{{route('website.user.update',['user_id'=>$user->id])}}" method="post">
            @method('put')
            @csrf
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">NAME</label>
              <input type="text" value="{{$user->name}}" name="name" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
            <label for="profileImage" class="form-label">PROFILE IMAGE</label>
            @include('includes.imagecrop')
            </div>
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">EMAIL</label>
              <input type="email" value="{{$user->email}}" name="email" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">LANGUAGE</label>
              <select name="language" class="form-control">
                @if($user->language=="english")
                <option value="english">English</option>
                <option value="tamil">Tamil</option>

                @else
                <option value="tamil">Tamil</option>
                <option value="english">English</option>

                @endif
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">MOBILE NUMBER</label>
              <input type="text" value="{{$user->mobile_number}}" name="mobile_number" placeholder="Eg:22/7" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">Door No</label>
              <input type="text" value="{{$address->door_no}}" name="door_no" placeholder="Eg:22/7" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">Street Name</label>
              <input type="text" value="{{$address->street_name}}" name="street_name"  class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">Locality / LandMark</label>
              <input type="text" value="{{$address->locality_landmark}}" name="locality_landmark"  class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">District</label>
              <input type="text" value="{{$address->district}}" name="district"  class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">State</label>
              <input type="text" value="{{$address->state}}" name="state"  class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">Country</label>
              <input type="text" value="{{$address->country}}" name="country"  class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">Pincode</label>
              <input type="text" value="{{$address->pincode}}" name="pincode"  class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
     </div>
 </div>


</div>
<!-- /.container-fluid -->
@endsection