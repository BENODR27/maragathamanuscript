@extends('layouts.adminlayout')
@section('content')
<div class="container-fluid">
  <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex justify-content-between">
          <h6 class="font-weight-bold text-primary">EDIT PRODUCT</h6>
          <a class="btn btn-primary" href="{{ route('product.browse') }}">Back</a>
      </div>
      <div class="card-body">
          <form action="{{ route('product.update',["product_id"=>$product->id]) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="mb-3">
                <label for="language" class="form-label">Language</label>
                <select  name="language" class="form-select form-control" id="language" aria-describedby="language">
                        <option value="{{$product->language}}">{{$product->language=="english"?"English":"Tamil"}}</option>
                </select>
               </div>
             <div class="mb-3">
                <label for="segment_id" class="form-label">Segment</label>
                <select required name="segment" class="form-select form-control" id="segment_id" aria-describedby="categoryIdHelp">
                  @foreach ($segments as $segment)
                      @if($product->segment_id==$segment->id)
                          <option value="{{ $segment->id }}">{{ $segment->name }}</option>
                      @endif
                  @endforeach
                  @foreach ($segments as $segment)
                  @if($product->segment_id!=$segment->id)
                      <option value="{{ $segment->id }}">{{ $segment->name }}</option>
                      @endif   
                  @endforeach
                </select>
             </div>
          
              <div class="mb-3">
                <label for="product_type" class="form-label">Product Type</label>
                <select name="product_type" class="form-select form-control" id="product_type" aria-describedby="categoryIdHelp">
                    @if($category->category_type=="book_ebook")
                    <option value="{{$product->product_type}}">{{$product->product_type=="book"?"Book":"E-Book"}}</option>

                    {{-- @if($product->product_type="book")
                    <option value="ebook">E-book</option>
                    @else
                    <option value="book">Book</option>
                    @endif --}}
                    @else
                    <option value="{{$product->product_type}}">{{$product->product_type=="audiobook"?"AudioBook":"Video"}}</option>
                    @endif    
                </select>
            </div>
              <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select required name="category" class="form-select form-control" id="category_id" aria-describedby="categoryIdHelp">
                    <option default value="{{ $category->id }}">{{$category->name}}</option>
                    {{-- @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach --}}
                </select>
            </div>
            
            <div class="mb-3">
              <label for="poster_image" class="form-label">Poster Image / Thumbnail</label>
              <input  type="file" name="poster_image" class="form-control" id="poster_image" aria-describedby="posterImageHelp">
          </div>
          <div class="mb-3" id="uploaded_image_div">
              <label>Uploaded Poster/ Thumbnail Image:</label>
              <img id="uploaded_image" src="{{asset('storage/thumbnail/posterimages/'.$product->poster_image_name)}}" alt="Uploaded Image" style="max-width: 100px;">
          </div>
         
            <div class="mb-3">
                <label for="genre_id" class="form-label">Genre</label>
                <select required name="genre" class="form-select form-control" id="genre" aria-describedby="genreIdHelp">
                    @foreach ($genres as $genre)
                      @if($product->genre_id==$genre->id)
                      <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                      @endif              
                   @endforeach
                    @foreach ($genres as $genre)                
                      @if($product->genre_id!=$genre->id)
                      <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                      @endif                 
                   @endforeach
                </select>
            </div>
         
        
         
              <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input required type="text" value="{{$product->title}}" name="title" class="form-control" id="title" aria-describedby="nameHelp">
              </div>
            

            <div class="mb-3 olc_section">
                <label for="one_line_concept" class="form-label">One Line Concept</label>
                <textarea name="one_line_concept" class="form-control" value="{{$product->one_line_concept}}" id="one_line_concept">{{$product->one_line_concept}}</textarea>
            </div>
            {{-- <div class="mb-3">
                <label for="preview" class="form-label">Preview</label>
                <textarea name="preview" class="form-control" id="preview"></textarea>
            </div> --}}
            <div class="mb-3" id="priceDiv">
              <label for="price"   class="form-label">Price</label>
              <input required value="{{$product->price}}" type="number" value="0" name="price" class="form-control" id="price" aria-describedby="priceHelp">
          </div>
          

          <div class="mb-3" id="quantityDiv">
            
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" value="{{$product->quantity}}" name="quantity" class="form-control" id="quantity" aria-describedby="quantityHelp">
          </div>

          <div class="mb-3" id="ebookDiv">
            <label for="e_book_file" class="form-label">Upload book here</label>
            <input type="file" name="e_book_file" class="form-control" id="e_book_file" aria-describedby="posterImageHelp">
        </div>
         @if($category->category_type=="audio_video")
          <div class="video-section">
            <div class="mb-3">
                <label for="audio_video_url" class="form-label">Audio / Video URL</label>
                <input type="text" value="{{$product->audio_video_url}}" name="audio_video_url" class="form-control" id="audio_video_url" aria-describedby="nameHelp">
            </div>
          
            <div class="mb-3">
                <label for="director" class="form-label">Director</label>
                <input type="text" value="{{$product->director}}" name="director" class="form-control" id="director" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
              <label for="music" class="form-label">Music</label>
              <input type="text" value="{{$product->music}}" name="music" class="form-control" id="music" aria-describedby="quantityHelp">
            </div>
          </div>
          <div class="audio-section">
   
             <div class="mb-3">
                 <label for="author" class="form-label">Author</label>
                 <input type="text" value="{{$product->author}}" name="author" class="form-control" id="author" aria-describedby="nameHelp">
             </div>
             {{-- <div class="mb-3">
                <label for="audio_file" class="form-label">Upload audio file here</label>
                <input type="file" name="audio_file" class="form-control" id="audio_file" aria-describedby="posterImageHelp">
            </div> --}}
          </div>
          @endif
          <div class="mb-3 department_section">
            <label for="department_id" class="form-label">Department (For subject segment only)</label>
            <select name="department" class="form-select form-control" id="department" aria-describedby="departmentIdHelp">
              @if($product->department_id==null)
              <option hidden value="">Select here</option>
              @endif
              @foreach ($departments as $department)
                @if($product->department_id==$department->id)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                 @endif
                @endforeach
                @foreach ($departments as $department)
                @if($product->department_id!=$department->id)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                 @endif
                @endforeach
            </select>
           </div>
          
       
          <button type="submit" class="btn btn-primary">Submit</button>
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
@section('scripts')
<script>
    $(document).ready(function() {
        // Initially hide the Quantity div
        $("#quantityDiv").hide();
        $("#ebookDiv").hide();
        $("#priceDiv, .department_section,.olc_section,.audio-section,.video-section").hide();
        $("#quantity").removeAttr("required");
        $("#e_book_file").removeAttr("required");
        let subject = 'SUBJECTS'; // Replace 'YourSubject' with the desired value

        $('#segment_id').on('change', function() {
        let selectedSegmentName = $(this).find(':selected').text();

        $(".department_section").toggle(selectedSegmentName === subject);
        $("#department").prop("required", selectedSegmentName === subject);
    });
   
        let selectedSegmentName1 = $('#segment_id').find(':selected').text();

        $(".department_section").toggle(selectedSegmentName1 === subject);
        $("#department").prop("required", selectedSegmentName1 === subject);
        // When the select element changes
            let selectedValue = $("#product_type").val();

            if (selectedValue == "book") {
            $("#quantityDiv").show();
            $(".olc_section").show();
            $("#ebookDiv").hide();
            $("#e_book_file").prop("required", false);
            $("#quantity").prop("required", true);
            $("#priceDiv").show();
            $('#quantity').val(1);
            $('#quantity').attr('min', 1);
        } else if (selectedValue == "ebook") {
          $(".olc_section").show();
            $("#ebookDiv").show();
            $("#quantityDiv").hide();
            $("#quantity").prop("required", false);
            $("#e_book_file").prop("required", true);
            $("#priceDiv").hide();
            $('#quantity').val(0);
            $('#quantity').attr('min', 0);
        } 
        else if(selectedValue =="video"){
          $("#quantityDiv, #ebookDiv, #priceDiv,.olc_section").hide();
            $("#quantity, #e_book_file").prop("required", false);
            $('#quantity').val(0);
            $('#quantity').attr('min', 0);
            $(".audio-section").hide();
            $(".video-section").show();
            $("#director").prop("required", true);
            $("#music").prop("required", true);
            $("#author").prop("required", false);

        }
        else if(selectedValue =="audiobook"){
          $("#quantityDiv, #ebookDiv, #priceDiv,.olc_section").hide();
            $("#quantity, #e_book_file").prop("required", false);
            $('#quantity').val(0);
            $('#quantity').attr('min', 0);
          $(".audio-section").show();
          $(".video-section").hide();
          $("#author").prop("required", true);
          $("#director").prop("required", false);
            $("#music").prop("required", false);

        }
        
        });
    
    </script>
@endsection