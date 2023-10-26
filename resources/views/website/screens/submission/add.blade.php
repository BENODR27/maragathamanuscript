@extends('layouts.website.layout1')
@section('content')
<!-- header banner -->
<section class="header-banner bookpress-parallax p-5" id="header-banner-id">
  <div class="container d-flex justify-content-between align-items-center text-white">
      <div class="overlay-out">
          <h1 class="banner-title">{{$pageTitle}}</h1>
          <p class="text-white"><a href="/" class="text-decoration-none text-white">Home</a> /
              <span  onclick="history.back()" class="text-decoration-none text-white">Submissions</span>
          </p>
      </div>
      <img src="{{asset("layout/assets/images/banner-image.png")}}" class="img-fluid" alt="Books">
      <div class="parallax start-0 top-0 w-100 h-100"></div>
  </div>
</section>
<!-- header banner end -->

<section class="submissions-add p-3">
    <div class="container">
        <form class="row g-3" action="{{route('submission.save')}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="col-md-12">
              <label for="inputAuthor4" class="form-label">AUTHOR NAME</label>
              <input type="text" class="form-control" name="author_name" id="inputAuthor4">
            </div>
            <div class="col-md-12">
              <label for="inputTitle4" class="form-label">TITLE OF WORK</label>
              <input type="text" class="form-control" name="title" id="inputTitle4">
            </div>
            <div class="mb-3">
              <label for="product_type" class="form-label">Book Type</label>
              <select name="product_type" class="form-select form-control" id="product_type" aria-describedby="categoryIdHelp">
                  <option hidden value="">Select a type</option>
                     <option value="book">Book</option>
                      <option value="ebook">E-Book</option>
                  
              </select>
          </div>
            <div class="mb-3">
              <label for="poster_image" class="form-label">Poster Image / Thumbnail</label>
              <input type="file" name="poster_image" class="form-control" id="poster_image" aria-describedby="posterImageHelp">
          </div>
          <div class="mb-3" id="uploaded_image_div" style="display: none;">
              <label>Uploaded Poster/ Thumbnail Image:</label>
              <img id="uploaded_image" src="" alt="Uploaded Image" style="max-width: 100px;">
          </div>
            <div class="col-12">
                <label for="inputState" class="form-label">SELECT THE GENRE</label>
                {{-- <select name="genre"id="inputState" class="form-select">
                  <option hidden  >Choose...</option>
                  @foreach ($genres as $genre)
                  <option value="{{$genre->id}}">{{$genre->name}}</option>
                  @endforeach
                 
                  
                </select> --}}
                <input class="form-control" name="genrename" type="text" list="genredl" >
                <datalist id="genredl">
                    @foreach ($genres as $genre)
                    <option value="{{$genre->name}}">
                      @endforeach
                </datalist>

            </div>
            <div class="col-12">
                <label for="inputState" class="form-label">LANGUAGE OF STORY</label>
                <select name="language" id="inputState" class="form-select">
                  <option hidden >Choose...</option>
                  <option value="tamil">TAMIL</option>
                  <option value="english">ENGLISH</option>
                  {{-- <option value="BOTH">BOTH</option> --}}
                </select>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">SUBMIT THE WORK (E-book)</label>
                    <input class="form-control" name="file"type="file" id="formFileMultiple" >
                  </div>
            </div>
         
            
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" required name="terms" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Terms and Conditions
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">SUBMIT</button>
            </div>
          </form>
    </div>
</section>
<script>
  // JavaScript to display the uploaded image
  const posterImageInput = document.getElementById('poster_image');
  const uploadedImageDiv = document.getElementById('uploaded_image_div');
  const uploadedImage = document.getElementById('uploaded_image');

  posterImageInput.addEventListener('change', function () {
      const file = this.files[0];
      if (file) {
          const reader = new FileReader();
          reader.onload = function (e) {
              uploadedImage.src = e.target.result;
              uploadedImageDiv.style.display = 'block'; // Show the image
          };
          reader.readAsDataURL(file);
      } else {
          uploadedImage.src = '';
          uploadedImageDiv.style.display = 'none'; // Hide the image
      }
  });
</script>
@endsection