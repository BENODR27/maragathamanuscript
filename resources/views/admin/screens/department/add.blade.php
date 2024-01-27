@extends('layouts.adminlayout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Page Heading -->

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3 d-flex justify-content-between">
         <h6 class="font-weight-bold text-primary">ADD NEW DEPARTMENT</h6> 
         <a class="btn btn-primary"href="{{route('department.browse')}}">Back</a>
     </div>
     <div class="card-body">
        <form  method="post">
            @csrf
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">NAME</label>
              <input type="text" name="name" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            </div>
            
            <button type="submit" class="btn btn-primary" formaction="{{route('department.save',['task'=>'save'])}}">Save</button>
            <button type="submit" class="btn btn-warning" formaction="{{route('department.save',['task'=>'addnew'])}}">Save & Add New One</button>
          </form>
     </div>
 </div>


</div>
<!-- /.container-fluid -->
@endsection