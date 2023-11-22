@extends('layouts.adminlayout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Page Heading -->

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3 d-flex justify-content-between">
         <h6 class="font-weight-bold text-primary">ORDERS</h6> 
         <div>
            <a class="btn btn-success" href="{{route('order.browse',['filter'=>'new'])}}">NEW</a>
            <a class="btn btn-primary" href="{{route('order.browse',['filter'=>'completed'])}}">COMPLETED</a>
         <a class="btn btn-warning" href="{{route('order.browse',['filter'=>'all'])}}">ALL</a>
         </div>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>Id</th>
                         <th>ORDER BY</th>
                         <th>PAYMENT</th>
                         <th>STATUS</th>
                         <th>VIEW ORDER</th>
                         {{-- <th>Action</th> --}}
                      
                     </tr>
                 </thead>
                 <tbody>
                    @if(count($orders)>0)
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td><a class="btn btn-warning"href="{{route('user.view',['user_id'=>$order->user_id])}}">VIEW</a>
                        </td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivered?"COMPLETED":"PENDING"}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{route('order.view',['order_id'=>$order->id])}}">VIEW</a>
                        </td>
                        {{-- <td>
                            <a class="btn btn-success"href="{{route('order.edit',['order_id'=>$order->id])}}">EDIT</a>
                            <a class="btn btn-danger"href="{{route('order.delete',['order_id'=>$order->id])}}">DELETE</a>
                        </td> --}}
                      
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="4" class="text-center">
                            NO ORDERS FOUND
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