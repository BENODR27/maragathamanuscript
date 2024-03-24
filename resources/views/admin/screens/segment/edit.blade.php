@extends('layouts.adminlayout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Page Heading -->

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3 d-flex justify-content-between">
         <h6 class="font-weight-bold text-primary">EDIT SEGMENT</h6> 
         {{-- <a class="btn btn-primary"href="{{route('segment.browse')}}">Back</a> --}}
     </div>
     <div class="card-body">
        <form action="{{route('segment.update',['segment_id'=>$segment->id])}}" method="post">
            @method('put')
            @csrf
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">NAME</label>
              <input type="text" value="{{$segment->name}}" name="name" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
     </div>
 </div>


</div>
<!-- /.container-fluid -->
@endsection