@extends('layouts.adminlayout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Page Heading -->

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3 d-flex justify-content-between">
         <h6 class="font-weight-bold text-primary">GENRES</h6> 
         <a class="btn btn-primary"href="{{route('genre.add',['category_id'=>$category_id])}}">ADD</a>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>Id</th>
                         <th>Name</th>
                         <th>Linked Products</th>
                         <th>Action</th>
                      
                     </tr>
                 </thead>
                 <tbody>
                    @if(count($genres)>0)
                    @foreach ($genres as $genre)
                    <tr>
                        <td>{{$genre->id}}</td>
                        <td>{{$genre->name}}</td>
                        <td>
                            <a class="btn btn-warning"href="{{route('genre.products.view',['genre_id'=>$genre->id,'category_id'=>$genre->category_id])}}">VIEW</a>

                        </td>
                        <td>
                            <a class="btn btn-success"href="{{route('genre.edit',['genre_id'=>$genre->id])}}">EDIT</a>
                            @if(Auth::user()->role=="superadmin")
                            <a class="btn btn-danger"href="{{route('genre.delete',['genre_id'=>$genre->id])}}">DELETE</a>
                            @endif
                        </td>
                      
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="4" class="text-center">
                            NO GENRES FOUND
                        </td>
                        
                    </tr>
                    @endif
                    
                    
                 </tbody>
             </table>
         </div>
     </div>
 </div>


</div>
<!-- /.container-fluid -->
@endsection