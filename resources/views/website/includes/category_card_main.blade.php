<div class="col-md-4">
    <div class="help-content bg-white rounded-2 px-4 py-5">
        <h3 class="help-content-title pb-3 pt-4">{{ $category->name}}</h3>
        <p>{{ $category->description }}</p>
        <h5 class="help-content-link pt-3 pb-3">
            <a href="{{route('category.segments',['category_id'=>$category->id])}}" class="text-decoration-none btn btn-primary">Explore Here</a>
            <i class="bi bi-arrow-right ms-2"></i>
        </h5>
        <img >
        <div class=" bookcm ">
            <img src="{{ Storage::disk('s3')->url('categoryimages/'.$category->category_image_name) }}" alt="{{$category->name}}"  class=" bookcm--cover img-fluid" />
          </div>
    </div>
</div>




<style>

.bookcm {
  display: block;
  /* width: 228px;
  height: 346px; */
  -moz-border-radius-topright: 7px;
  -webkit-border-top-right-radius: 7px;
  border-top-right-radius: 7px;
  -moz-border-radius-bottomright: 7px;
  -webkit-border-bottom-right-radius: 7px;
  border-bottom-right-radius: 7px;
}

.bookcm--cover {
  cursor: pointer;
  -moz-backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -moz-transform-origin: 0% 50%;
  -ms-transform-origin: 0% 50%;
  -webkit-transform-origin: 0% 50%;
  transform-origin: 0% 50%;
  -moz-border-radius-topright: 5px;
  -webkit-border-top-right-radius: 5px;
  border-top-right-radius: 5px;
  -moz-border-radius-bottomright: 5px;
  -webkit-border-bottom-right-radius: 5px;
  border-bottom-right-radius: 5px;
  -moz-transform: perspective(1500px) rotateY(0);
  -webkit-transform: perspective(1500px) rotateY(0);
  transform: perspective(1500px) rotateY(0);
  -moz-transition-duration: 0.5s;
  -o-transition-duration: 0.5s;
  -webkit-transition-duration: 0.5s;
  transition-duration: 1s;
  -moz-transition-property: rotateY;
  -o-transition-property: rotateY;
  -webkit-transition-property: rotateY;
  transition-property: rotateY;
}
.bookcm--cover.is-open {
  -moz-transform: perspective(1500px) rotateY(-25deg);
  -webkit-transform: perspective(1500px) rotateY(-25deg);
  transform: perspective(1500px) rotateY(-25deg);
}


</style>
