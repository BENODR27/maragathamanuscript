@extends('layouts.adminlayout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Page Heading -->

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3 d-flex justify-content-between">
         <h6 class="font-weight-bold text-primary">ADD NEW GENRE</h6> 
         <a class="btn btn-primary"href="{{route('genre.browse')}}">Back</a>
     </div>
     <div class="card-body">
        <form  method="post">
            @csrf
            <div class="mb-3">
              <label for="category_id" class="form-label">Category</label>
              <select name="category" class="form-select form-control" id="category_id" aria-describedby="categoryIdHelp">
                  <option default value="{{ $category->id }}">{{ $category->name }}</option>
                  {{-- @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach --}}
              </select>
          </div>
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">NAME</label>
              <input type="text" name="name" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            </div>
            <button type="submit" class="btn btn-primary" formaction="{{route('genre.save',['task'=>'save'])}}">Save</button>
            <button type="submit" class="btn btn-warning" formaction="{{route('genre.save',['task'=>'addnew'])}}">Save & Add New One</button>
          </form>
     </div>
 </div>


</div>
<!-- /.container-fluid -->
@endsection