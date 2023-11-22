@extends('layouts.website.layout1')
@section('content')

<div class="orders-section pt-5 ">
    <div class="container">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            @if(count($orders)>0)
          @foreach ($orders as $order)
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$order->id}}" aria-expanded="false" aria-controls="flush-collapse{{$order->id}}">
                
                <div class="mb-4" >
                    <div class="row d-flex align-items-center">
                      <div class="col-md-2">
                        <p class="text-muted mb-0 small">ORDER-ID-{{$order->id}}</p>
                      </div>
                     
                      <div class="col-xl-10">
                        <div class="progress" style="height: 6px; border-radius: 16px;">
                            @if($order->delivered)
                          <div class="progress-bar" role="progressbar"
                            style="width: 100%; border-radius: 16px; background-color: #4dbe43;" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100"></div>
                            @else 
                            <div class="progress-bar" role="progressbar"
                            style="width: 50%; border-radius: 16px; background-color: #b6dc0f;" aria-valuenow="50"
                            aria-valuemin="0" aria-valuemax="100"></div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-around mb-1">
                          <p class="text-muted mt-1 mb-0 small ms-xl-5">To be delivered</p>
                          <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered</p>
                        </div>
                      </div>
                    
                    </div>
              </div>
              </button>
            </h2>
            <div id="flush-collapse{{$order->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <section class="h-100 gradient-custom">
                  <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                      <div class="col-lg-10 col-xl-8">
                        <div class="card" style="border-radius: 10px;">
                          <div class="card-header px-4 py-5">
                            <h5 class="text-muted mb-0">Thanks for your Order, <span style="color: #000000;">{{Auth::user()->name}}</span>!</h5>
                          </div>
                          <div class="card-body p-4">
                            {{-- <div class="d-flex justify-content-between align-items-center mb-4">
                              <p class="lead fw-normal mb-0" style="color: #a8729a;">YOUR ORDER</p>
                              <p class="small text-muted mb-0">Receipt Voucher : 1KAU9-84UIL</p>
                            </div> --}}
                            @foreach ($order->products as $product)
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <img src="{{asset($product->poster_image_name)}}"
                                        class="img-fluid" alt="Phone">
                                    </div>
                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                      <p class="text-muted mb-0">{{$product->title}}</p>
                                    </div>
                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                      <p class="text-muted mb-0 small">Qty: 1</p>
                                    </div>
                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                      <p class="text-muted mb-0 small"> &#8377; {{$product->orderedPrice}}</p>
                                    </div>
                                  </div>
                                 
                                </div>
                              </div>
                            @endforeach
                           
                           
                
                            <div class="d-flex justify-content-between pt-2">
                              <p class="fw-bold mb-0">Order Details</p>
                            </div>
                
                            <div class="d-flex justify-content-between pt-2">
                              <p class="text-muted mb-0">Ordered Date : {{$order->created_at}}</p>
                            </div>
                            <div class="d-flex justify-content-between pt-2">
                              <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges</span> Free</p>
                            </div>
                            
                          </div>
                          <div class="card-footer border-0 px-4 py-5"
                            style="background-color: #82c28e; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                            <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">ORDER
                              TOTAL: <span class="h2 mb-0 ms-2">  &#8377; {{$order->total_amount}}</span></h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
            </div>
          </div>
          @endforeach
          @else
          <div class="accordion-item">
            <h2 class="accordion-header">
             NO ORDERS FOUND
            </h2>
           
          </div>
          @endif
           
           
          </div>
    </div>
</div>
<style>
   .orders-section{
    min-height: 70vh;
   }
    .accordion-button:not(.collapsed) {
    background-color: transparent;
    }
    .accordion-header {
     border: none ;
     outline: none;
    }
  
    .accordion-button {
        display:inherit;
    }
    

</style>
@endsection