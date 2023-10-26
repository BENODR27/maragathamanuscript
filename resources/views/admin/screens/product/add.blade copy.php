@extends('layouts.adminlayout')
@section('content')
<div class="container-fluid">
  <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex justify-content-between">
          <h6 class="font-weight-bold text-primary">ADD NEW PRODUCT</h6>
          <a class="btn btn-primary" href="{{ route('product.browse') }}">Back</a>
      </div>
      <div class="card-body">
          <form action="{{ route('product.save') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <input type="number" name="category" class="form-control" id="category_id" aria-describedby="categoryIdHelp">
            </div>
            <div class="mb-3">
              <label for="poster_image" class="form-label">Poster Image</label>
              <input type="file" name="poster_image" class="form-control" id="poster_image" aria-describedby="posterImageHelp">
          </div>
          <div class="mb-3" id="uploaded_image_div" style="display: none;">
              <label>Uploaded Poster Image:</label>
              <img id="uploaded_image" src="" alt="Uploaded Image" style="max-width: 100px;">
          </div>
            <div class="mb-3">
              <label for="genre_id" class="form-label">Genre</label>
              <input type="number" name="genre" class="form-control" id="genre" aria-describedby="genreIdHelp">
          </div>
         
              <div class="mb-3">
                  <label for="name" class="form-label">Title</label>
                  <input type="text" name="title" class="form-control" id="name" aria-describedby="nameHelp">
              </div>
              <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" id="quantity" aria-describedby="quantityHelp">
            </div>
            <div class="mb-3">
                <label for="one_line_concept" class="form-label">One Line Concept</label>
                <textarea name="one_line_concept" class="form-control" id="one_line_concept"></textarea>
            </div>
            <div class="mb-3">
                <label for="preview" class="form-label">Preview</label>
                <textarea name="preview" class="form-control" id="preview"></textarea>
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <input type="number" name="price" class="form-control" id="price" aria-describedby="priceHelp">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
              {{-- <div class="mb-3">
                  <label for="media_type" class="form-label">Media Type</label>
                  <input type="text" name="media_type" class="form-control" id="media_type" aria-describedby="mediaTypeHelp">
              </div> --}}
            
              {{-- <div class="mb-3">
                  <label for="segment_id" class="form-label">Segment</label>
                  <input type="number" name="segment" class="form-control" id="segment" aria-describedby="segmentIdHelp">
              </div> --}}
            
              {{-- <div class="mb-3">
                  <label for="department_id" class="form-label">Department</label>
                  <input type="number" name="department" class="form-control" id="department" aria-describedby="departmentIdHelp">
              </div> --}}
             
            
              {{-- <div class="mb-3">
                  <label for="is_active" class="form-label">Is Active</label>
                  <input type="checkbox" name="is_active" class="form-check-input" id="is_active">
              </div> --}}
              
              {{-- <div class="mb-3">
                  <label for="language" class="form-label">Language</label>
                  <input type="text" name="language" class="form-control" id="language" aria-describedby="languageHelp">
              </div> --}}
              {{-- <div class="mb-3">
                  <label for="director" class="form-label">Director</label>
                  <input type="text" name="director" class="form-control" id="director" aria-describedby="directorHelp">
              </div>
              <div class="mb-3">
                  <label for="music" class="form-label">Music</label>
                  <input type="text" name="music" class="form-control" id="music" aria-describedby="musicHelp">
              </div> --}}

              
          </form>
      </div>
  </div>
</div>
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