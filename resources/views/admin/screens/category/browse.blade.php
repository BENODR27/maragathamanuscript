@extends('layouts.adminlayout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Page Heading -->

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3 d-flex justify-content-between">
         <h6 class="font-weight-bold text-primary">CATEGORIES</h6> 
         <a class="btn btn-primary"href="{{route('category.add')}}">ADD</a>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>Id</th>
                         <th>Name</th>
                         <th>Products</th>
                         <th>Segments</th>
                         <th>Genres</th>
                         <th>Action</th>
                      
                     </tr>
                 </thead>
                 <tbody>
                    @if(count($categories)>0)
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <a class="btn btn-warning"href="{{route('category.products.view',['category_id'=>$category->id])}}">VIEW</a>
                        </td>
                        <td>
                            <a class="btn btn-warning"href="{{route('segment.browse',['category_id'=>$category->id])}}">VIEW</a>
                        </td>
                        <td>
                            <a class="btn btn-warning"href="{{route('genre.browse',['category_id'=>$category->id])}}">VIEW</a>
                        </td>
                        <td>
                            <a class="btn btn-success"href="{{route('category.edit',['category_id'=>$category->id])}}">EDIT</a>
                            <a class="btn btn-danger"href="{{route('category.delete',['category_id'=>$category->id])}}">DELETE</a>
                        </td>
                      
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-center">
                            NO CATEGORIES FOUND
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