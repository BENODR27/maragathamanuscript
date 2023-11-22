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
                <label for="language" class="form-label">Language</label>
                <select required  name="language" class="form-select form-control" id="language" aria-describedby="language" oninvalid="this.setCustomValidity('Please Select Language')" oninput="this.setCustomValidity('')">
                        <option hidden value="">Select a language</option>
                        <option value="tamil">TAMIL</option>
                        <option value="english">ENGLISH</option>
                </select>
               </div>
             <div class="mb-3">
                <label for="segment_id" class="form-label">Segment</label>
                <select required name="segment" class="form-select form-control" id="segment_id" aria-describedby="categoryIdHelp" oninvalid="this.setCustomValidity('Please Select Segment')" oninput="this.setCustomValidity('')">
                  @if($category->category_type=="book_ebook")
                  <option hidden value="">Select a segment</option>
                  @endif
                    @foreach ($segments as $segment)
                        <option  value="{{ $segment->id }}">{{ $segment->name }}</option>
                    @endforeach
                </select>
             </div>
           
              <div class="mb-3">
                <label for="product_type" class="form-label">Product Type</label>
                <select required name="product_type" class="form-select form-control" id="product_type" aria-describedby="categoryIdHelp" oninvalid="this.setCustomValidity('Please Select Product Type')" oninput="this.setCustomValidity('')">
                    <option hidden value="">Select a type</option>
                    @if($category->category_type=="book_ebook")
                       <option value="book">Book</option>
                        <option value="ebook">E-Book</option>
                    @else
                        <option value="audiobook">AudioBook</option>
                        <option value="video">video</option>
                    @endif    
                </select>
            </div>
              <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select required name="category" class="form-select form-control" id="category_id" aria-describedby="categoryIdHelp" oninvalid="this.setCustomValidity('Please Select Category')" oninput="this.setCustomValidity('')">
                    <option default value="{{ $category->id }}">{{$category->name}}</option>
                    {{-- @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach --}}
                </select>
            </div>
            
            <div class="mb-3">
              <label for="poster_image" class="form-label">Poster Image / Thumbnail (400*400)</label>
              <input required type="file" name="poster_image" class="form-control" id="poster_image" aria-describedby="posterImageHelp" oninvalid="this.setCustomValidity('Please Upload Valid Poster Image')" oninput="this.setCustomValidity('')">
          </div>
          <div class="mb-3" id="uploaded_image_div" style="display: none;">
              <label>Uploaded Poster/ Thumbnail Image:</label>
              <img id="uploaded_image" src="" alt="Uploaded Image" style="max-width: 100px;">
          </div>
         
            <div class="mb-3">
                <label for="genre_id" class="form-label">Genre</label>
                <select required name="genre" class="form-select form-control" id="genre" aria-describedby="genreIdHelp" oninvalid="this.setCustomValidity('Please Select Genre')" oninput="this.setCustomValidity('')">
                    <option hidden value="">Select a genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
         
        
         
              <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input required type="text" name="title" class="form-control" id="title" aria-describedby="nameHelp" oninvalid="this.setCustomValidity('Please Enter Title')" oninput="this.setCustomValidity('')">
              </div>
            

            <div class="mb-3 olc_section">
                <label for="one_line_concept" class="form-label">One Line Concept (minimum 150 characters)</label>
                <textarea {{$category->category_type=="book_ebook"?'required':""}} {{$category->category_type=="book_ebook"?'maxlength=300 minlength=150':""}} name="one_line_concept" class="form-control" id="one_line_concept" oninvalid="this.setCustomValidity('Please Enter Valid One Line Concept')" oninput="this.setCustomValidity('')"></textarea>
                <div id="the-count">
                    <span id="current">150</span>
                    <span id="maximum">/ 300</span>
                  </div>
            </div>
            {{-- <div class="mb-3">
                <label for="preview" class="form-label">Preview</label>
                <textarea name="preview" class="form-control" id="preview"></textarea>
            </div> --}}
            <div class="mb-3" id="priceDiv">
              <label for="price" class="form-label">Price</label>
              <input required type="number" value="0" name="price" class="form-control" id="price" aria-describedby="priceHelp" oninvalid="this.setCustomValidity('Please Enter Valid Price')" oninput="this.setCustomValidity('')">
          </div>
          

          <div class="mb-3" id="quantityDiv">
            
            <label for="quantity" class="form-label">Quantity</label>
            <input required type="number" name="quantity" value="0" class="form-control" id="quantity" aria-describedby="quantityHelp" >
          </div>

          <div class="mb-3" id="ebookDiv">
            <label for="e_book_file" class="form-label">Upload book here</label>
            <input type="file" name="e_book_file" class="form-control" id="e_book_file" aria-describedby="posterImageHelp" >
        </div>
         @if($category->category_type=="audio_video")
         <div class="mb-3">
             <label for="audio_video_url" class="form-label">Audio / Video URL</label>
             <input type="text" {{$category->category_type=="audio_video"?"required":""}} name="audio_video_url" class="form-control" id="audio_video_url" aria-describedby="nameHelp" oninvalid="this.setCustomValidity('Please Enter Valid Url')" oninput="this.setCustomValidity('')">
         </div>
          <div class="video-section">

          
            <div class="mb-3">
                <label for="director" class="form-label">Director</label>
                <input type="text" name="director" class="form-control" id="director" aria-describedby="nameHelp" >
            </div>
            <div class="mb-3">
              <label for="music" class="form-label">Music</label>
              <input type="text" name="music" class="form-control" id="music" aria-describedby="quantityHelp" >
            </div>
          </div>
          <div class="audio-section">
   
             <div class="mb-3">
                 <label for="author" class="form-label">Author</label>
                 <input type="text" name="author" class="form-control" id="author" aria-describedby="nameHelp" >
             </div>
             {{-- <div class="mb-3">
                <label for="audio_file" class="form-label">Upload audio file here</label>
                <input type="file" name="audio_file" class="form-control" id="audio_file" aria-describedby="posterImageHelp">
            </div> --}}
          </div>
          @endif
          <div class="mb-3 department_section">
            <label for="department_id" class="form-label">Department</label>
            <select name="department" class="form-select form-control" id="department" aria-describedby="departmentIdHelp" >
                <option hidden value="">Select a department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
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
    // Initially hide the Quantity, Ebook, Price, and Department divs
    $("#quantityDiv, #ebookDiv, #priceDiv, .department_section,.olc_section,.audio-section,.video-section").hide();
    $("#quantity, #e_book_file, #department").prop("required", false);

    $('#segment_id').on('change', function() {
        let selectedSegmentName = $(this).find(':selected').text();
        let subject = 'SUBJECTS'; // Replace 'YourSubject' with the desired value

        $(".department_section").toggle(selectedSegmentName === subject);
        $("#department").prop("required", selectedSegmentName === subject);
    });

    // When the select element changes
    $("#product_type").on("change", function() {
        var selectedValue = $(this).val();

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
});

    $('textarea').keyup(function() {
    
    var characterCount = $(this).val().length,
        current = $('#current'),
        maximum = $('#maximum'),
        theCount = $('#the-count');
      
    current.text(characterCount);
   
    
    /*This isn't entirely necessary, just playin around*/
    if (characterCount < 70) {
      current.css('color', '#666');
    }
    if (characterCount > 70 && characterCount < 90) {
      current.css('color', '#6d5555');
    }
    if (characterCount > 90 && characterCount < 100) {
      current.css('color', '#793535');
    }
    if (characterCount > 100 && characterCount < 120) {
      current.css('color', '#841c1c');
    }
    if (characterCount > 120 && characterCount < 139) {
      current.css('color', '#8f0001');
    }
    
    if (characterCount >= 140) {
      maximum.css('color', '#8f0001');
      current.css('color', '#8f0001');
      theCount.css('font-weight','bold');
    } else {
      maximum.css('color','#666');
      theCount.css('font-weight','normal');
    } 
  });
    </script>
@endsection