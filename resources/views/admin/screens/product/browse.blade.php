@extends('layouts.adminlayout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Page Heading -->

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3 d-flex justify-content-between">
         <h6 class="font-weight-bold text-primary">PRODUCT</h6> 
         <a class="btn btn-primary"href="{{route('product.add',['category_id'=>$category_id])}}">ADD</a>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>Id</th>
                         <th>Title</th>
                         <th>Image</th>
                         <th>Status</th>
                         <th>Action</th>
                      
                     </tr>
                 </thead>
                 <tbody>
                    @if(count($products)>0)
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->title}}</td>
                        <td>
                            <img src="{{asset($product->poster_image_name)}}" style="height:50px;width:50px;object-fit:contain"class="img-fluid" alt="{{$product->poster_image_name}}">
                        </td>
                        <td>{{$product->is_active?"Active":"Inactive"}}</td>
                        <td>
                            <a class="btn btn-warning"href="{{route('product.view',['product_id'=>$product->id])}}">VIEW</a>
                            <a class="btn btn-success"href="{{route('product.edit',['product_id'=>$product->id])}}">EDIT</a>
                            <a class="btn btn-danger"href="{{route('product.delete',['product_id'=>$product->id])}}">DELETE</a>
                        </td>
                      
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="4" class="text-center">
                            NO PRODUCTS FOUND
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