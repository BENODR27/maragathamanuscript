@extends('layouts.adminlayout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Page Heading -->

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3 d-flex justify-content-between">
         <h6 class="font-weight-bold text-primary">SUBMISSIONS</h6> 
        <div>
            <a class="btn btn-success" href="{{route('submission.browse',['filter'=>'pending'])}}">PENDING</a>
            <a class="btn btn-primary" href="{{route('submission.browse',['filter'=>'published'])}}">PUBLISHED</a>
         <a class="btn btn-warning" href="{{route('submission.browse',['filter'=>'all'])}}">ALL</a>
        </div>
        </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>Id</th>
                         <th>Name</th>
                         <th>Genre</th>
                         <th>Status</th>
                         <th>Action</th>
                      
                     </tr>
                 </thead>
                 <tbody>
                    @if(count($works)>0)
                    @foreach ($works as $work)
                    <tr>
                        <td>{{$work->id}}</td>
                        <td>{{$work->title}}</td>
                        <td>{{$work->genreName}}</td>
                        <td>
                            <a class="btn btn-warning">{{$work->published?"PUBLISHED":"PENDING"}}</a>
                        </td>
                       
                        <td>
                            @if($work->published)
                            <a class="btn btn-success"href="{{route('product.view',["product_id"=>$work->product_id])}}">View Product</a>
                            @else
                            <a class="btn btn-success"href="{{route('submission.view',["work_id"=>$work->id])}}">To Publish</a>
                            @endif
                        </td>
                      
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5" class="text-center">
                            NO SUBMISSION FOUND
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