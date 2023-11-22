@extends('layouts.adminlayout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Page Heading -->

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3 d-flex justify-content-between">
         <h6 class="font-weight-bold text-primary">ORDER-NO-{{$order->id}}</h6> 

         <a class="btn btn-primary"href="{{route('order.complete',['order_id'=>$order->id])}}">{{$order->delivered?"ORDER COMPLETED":"ORDER NOT COMPLETED"}}</a>
     </div>
     <div class="card-body">
        <ul class="list-group">
            
            <a href="#" class="list-group-item list-group-item-action active">
                Order Details
              </a>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Total Amount:
                <span class="badge badge-primary badge-pill p-2"> &#8377; {{$order->total_amount}}</span>

              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Payment Status:
                <span class="badge badge-primary badge-pill p-2">{{$order->payment_status}}</span>
              </li>
              
             
             
             
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Payment Mode:
                <span class="badge badge-primary badge-pill p-2">{{$order->payment_mode}}</span>
              </li>
             
            
          </ul>
        
        <ul class="list-group pt-3">
            <a href="#" class="list-group-item list-group-item-action active">
                Product Details
              </a>
            @foreach ($products as $product)
            <li class="list-group-item d-flex justify-content-between align-items-center">
              {{$product->title}}
              <a class="btn btn-warning"href="{{route('product.view',['product_id'=>$product->id])}}">VIEW</a>

               <span class="badge badge-primary badge-pill p-2"> &#8377; {{$product->orderedprice}}</span>
             </li>
            @endforeach
            
          
         
            
          </ul>
          <ul class="list-group pt-3">
            <a href="#" class="list-group-item list-group-item-action active">
                Customer Details
              </a>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Name
                <span class="badge badge-primary badge-pill p-2">{{$user->name}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                MobileNumber
                <span class="badge badge-primary badge-pill p-2">{{$user->mobile_number}}</span>
              </li>
            
          </ul>
          <ul class="list-group pt-3">
            <a href="#" class="list-group-item list-group-item-action active">
                Delivery Details 
              </a>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Door No:
                <span class="badge badge-primary badge-pill p-2">{{$user->address->door_no}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Street Name:
                <span class="badge badge-primary badge-pill p-2">{{$user->address->street_name}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Locality Landmark:
                <span class="badge badge-primary badge-pill p-2">{{$user->address->locality_landmark}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                State:
                <span class="badge badge-primary badge-pill p-2">{{$user->address->state}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Country:
                <span class="badge badge-primary badge-pill p-2">{{$user->address->country}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Pincode:
                <span class="badge badge-primary badge-pill p-2">{{$user->address->pincode}}</span>
              </li>
              
            
          </ul>
     </div>
 </div>


</div>
<!-- /.container-fluid -->
@endsection