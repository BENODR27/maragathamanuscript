@if(Auth::user())
<div class="row m-2">
    <h4>REVIEWS</h4>
</div>
@endif
<div class="row m-2">
    @foreach ($product->ratings as $rating)
    <div class="col-md-12 col-sm-12">
        <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title d-flex justify-content-between">
                <div>
                    <img style="height:30px;width:30px;"class="rounded-circle" alt="avatar1" @if($rating->user->profile_image_name==null) src="{{asset('img/undraw_profile.svg')}}" @else src="{{asset($rating->user->profile_image_name)}}" @endif /> &nbsp {{$rating->user->name}}
                </div>
                <div>
                    @if(Auth::user() && Auth::user()->id==$rating->user->id)
                    <a href=""><i class="fa fa-trash" aria-hidden="true"></i></a>
                    @endif
                </div>
                </h5>
              <p class="card-text"><small class="text-muted">
                        @for ($i = 1; $i <= $rating->star_count; $i++)
                        <i style="color:green"class = "fa fa-star"></i>
                        @endfor

                        @for ($i = $rating->star_count+1; $i <= 5; $i++)
                        <i class = "fa fa-star"></i>
                        @endfor
                    </small></p>
              <p class="card-text">{{$rating->comment}}.</p>
            </div>
          </div>
    </div>
    @endforeach
   @if(Auth::user())
   <form action="{{route('review.add',['product_id'=>$product->id])}}" method="post">
        @csrf
    <div class="col-md-12 col-sm-12 mb-3" >
        <div class="card mb-3" >
            <div class="card-body">
              <h5 class="card-title"><img style="height:30px;width:30px;"class="rounded-circle" alt="avatar1" @if(Auth::user()->profile_image_name==null) src="{{asset('img/undraw_profile.svg')}}" @else src="{{asset(Auth::user()->profile_image_name)}}" @endif /> &nbsp {{Auth::user()->name}}</h5>
                <div class="row">
                    <div class="col">
                        <textarea  name="comment" placeholder="Add Comments" class="form-control" ></textarea>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between ">
                  <p class="card-text">
                    {{-- <small class="text-muted">
                    <i class = "fa fa-star"></i>
                            <i class = "fa fa-star"></i>
                            <i class = "fa fa-star"></i>
                            <i class = "fa fa-star"></i>
                            <i class = "fa fa-star"></i>
                        </small> --}}
                    </p>
                  <a href="" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#ratingStarModel">ADD COMMENT</a>
                </div>
            </div>
          </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="ratingStarModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">RATE OUT OF 5</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
            </div>
            </div>
            <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="submit" id="review-proceed" class="btn btn-primary">Proceed</button>
            </div>
        </div>
        </div>
    </div>
    </div>
   </form>
   @endif
</div>