@extends('layouts.adminlayout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Page Heading -->

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3 d-flex justify-content-between">
         <h6 class="font-weight-bold text-primary">ORDER-NO-{{$order->id}}</h6> 

         {{-- <a class="btn btn-primary"href="{{route('order.complete',['order_id'=>$order->id])}}">{{$order->delivered?"ORDER COMPLETED":"ORDER NOT COMPLETED"}}</a> --}}
    <!-- Button trigger modal -->
    @if(!$order->delivered)
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 ORDER NOT COMPLETED
</button>
@else
<button type="button" class="btn btn-primary" >
  ORDER COMPLETED
</button>
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ORDER-NO-{{$order->id}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('order.complete',['order_id'=>$order->id])}}">
          @csrf
          <div class="form-group mb-3">
            <label for="exampleInputamount" class="form-label">Amount</label>
            <input type="number" readonly value="{{$order->total_amount}}" required name="paidamount" class="form-control" id="exampleInputamount" >
            <div id="amounthelp" class="form-text text-danger">*Check amount and confirm after paid</div>

          </div>
          <div class="form-group mb-3">
            <label for="exampleInputamount" class="form-label">Payment status</label>

              <select name="status" required class="form-control" aria-label="Default select example">
                  <option hidden  value="">Select payment status</option>
                  <option value="Paid">Paid</option>
                  {{-- <option value="Unpaid">Unpaid</option> --}}
                </select>
          </div>
          {{-- <div class="form-group mb-3">
            <label for="exampleInputamount" class="form-label">Payment Mode</label>

            <select name="status" required class="form-control" aria-label="Default select example">
                <option hidden  value="">Payment Mode</option>
                <option value="Cash">Cash</option>
                <option value="Online">Online</option>
              </select>
        </div> --}}
      
          <button type="submit" class="btn btn-primary">Confirm</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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
                MobileNumber<a target="_blank" class="btn btn-primary" href="tel:{{$user->mobile_number}}">Call</a>
                <a class="btn btn-primary" target="_blank" href="https://wa.me/{{$user->mobile_number}}">WhatsApp</a>

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