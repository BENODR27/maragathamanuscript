@extends('layouts.adminlayout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Page Heading -->

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3 d-flex justify-content-between">
         <h6 class="font-weight-bold text-primary">SEND NOTIFICATION</h6> 
     </div>
     <div class="card-body">
        <form action="{{route('send.custom.notidication')}}" method="post" >
            @csrf

            <div class="mb-3">
              <label for="notification_type" class="form-label">NOTIFICATION TYPE</label>
              <select required name="notification_type" class="form-select form-control" id="notification_type" aria-describedby="categoryIdHelp" oninvalid="this.setCustomValidity('Select Valid type')" oninput="this.setCustomValidity('')">
                  <option hidden value="">Select a type</option>
                  <option value="info">Info</option>
                  <option value="success">Success</option>
                  <option value="error">Error</option>
                  <option value="warn">Warning</option>
              </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputName1" class="form-label">MESSAGE</label>
            <input required type="text" name="message" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" oninvalid="this.setCustomValidity('Enter Valid Message')" oninput="this.setCustomValidity('')">
          </div>
          {{-- <div class="mb-3">
            <label for="exampleInputName1" class="form-label">CUSTOM URL</label>
            <input required type="text" name="custom_url" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" oninvalid="this.setCustomValidity('Enter Valid Category Name')" oninput="this.setCustomValidity('')">
          </div> --}}
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
     </div>
 </div>


</div>

@endsection