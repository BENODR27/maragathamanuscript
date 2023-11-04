@extends('layouts.adminlayout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Page Heading -->

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3 d-flex justify-content-between">
         <h6 class="font-weight-bold text-primary">SEGMENTS</h6> 
         <a class="btn btn-primary"href="{{route('segment.add',['category_id'=>$category_id])}}">ADD</a>
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
                    @if(count($segments)>0)
                    @foreach ($segments as $segment)
                    <tr>
                        <td>{{$segment->id}}</td>
                        <td>{{$segment->name}}</td>
                        <td>
                            <a class="btn btn-warning"href="{{route('segment.products.view',['segment_id'=>$segment->id,'category_id'=>$segment->category_id])}}">VIEW</a>

                        </td>
                        <td>
                            <a class="btn btn-success"href="{{route('segment.edit',['segment_id'=>$segment->id])}}">EDIT</a>
                            <a class="btn btn-danger"href="{{route('segment.delete',['segment_id'=>$segment->id])}}">DELETE</a>
                        </td>
                      
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="3" class="text-center">
                            NO SEGMENTS FOUND
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