@extends('layouts.adminlayout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Page Heading -->

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3 d-flex justify-content-between">
         <h6 class="font-weight-bold text-primary">VIEW USER</h6> 
         <div>
          <a class="btn btn-success" href="mailto:{{$user->email}}">COMPOSE EMAIL</a>
          <a onclick="return confirm('Are you sure you want to change status?');" class="btn btn-{{($user->account_status==1)?"success":"danger"}}"href="{{route('user.status.toggle',['user_id'=>$user->id])}}">{{($user->account_status==1)?"ACTIVE":"INACTIVE"}}</a>
          <a class="btn btn-primary" href="{{route('user.browse')}}">Back</a>
         </div>
         
     </div>
     <div class="card-body">
        <form action="" method="post">
            @method('put')
            @csrf
            <div class="mb-3">
              <label for="exampleinput readonlyName1" class="form-label">NAME</label>
              <input readonly type="text" value="{{$user->name}}" name="name" class="form-control" id="exampleinput readonlyName1" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
                <label for="exampleinput readonlyName1" class="form-label">EMAIL</label>

              <input readonly type="email" value="{{$user->email}}" name="email" class="form-control" id="exampleinput readonlyName1" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">LANGUAGE</label>
                <select readonly name="language" class="form-control">
                  @if($user->language=="english")
                  <option value="english">English</option>
                  @else
                  <option value="tamil">Tamil</option>
                  @endif
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleInputName1" class="form-label">MOBILE NUMBER</label>
                <input readonly type="text" value="{{$user->mobile_number}}" name="mobile_number" placeholder="Eg:22/7" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
              </div>
            <div class="mb-3">
              <label for="exampleinput readonlyName1" class="form-label">Door No</label>
              <input readonly type="text" value="{{$address->door_no}}" name="door_no" placeholder="Eg:22/7" class="form-control" id="exampleinput readonlyName1" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
              <label for="exampleinput readonlyName1" class="form-label">Street Name</label>
              <input readonly type="text" value="{{$address->street_name}}" name="street_name"  class="form-control" id="exampleinput readonlyName1" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
              <label for="exampleinput readonlyName1" class="form-label">Locality / LandMark</label>
              <input readonly type="text" value="{{$address->locality_landmark}}" name="locality_landmark"  class="form-control" id="exampleinput readonlyName1" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
              <label for="exampleinput readonlyName1" class="form-label">District</label>
              <input readonly type="text" value="{{$address->district}}" name="district"  class="form-control" id="exampleinput readonlyName1" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
              <label for="exampleinput readonlyName1" class="form-label">State</label>
              <input readonly type="text" value="{{$address->state}}" name="state"  class="form-control" id="exampleinput readonlyName1" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
              <label for="exampleinput readonlyName1" class="form-label">Country</label>
              <input readonly type="text" value="{{$address->country}}" name="country"  class="form-control" id="exampleinput readonlyName1" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
              <label for="exampleinput readonlyName1" class="form-label">Pincode</label>
              <input readonly type="text" value="{{$address->pincode}}" name="pincode"  class="form-control" id="exampleinput readonlyName1" aria-describedby="nameHelp">
            </div>
          </form>
     </div>
 </div>


</div>
<!-- /.container-fluid -->
@endsection