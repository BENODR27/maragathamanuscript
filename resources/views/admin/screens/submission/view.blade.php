@extends('layouts.adminlayout')
@section('content')
<div class="container-fluid">
  <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex justify-content-between">
          <h6 class="font-weight-bold text-primary">ADD NEW PRODUCT TO OTHERS</h6>
          <a class="btn btn-primary" href="{{ route('product.browse') }}">Back</a>
      </div>
      <div class="card-body">
          <form action="{{ route('publish.work') }}" method="post" enctype="multipart/form-data">
              @csrf
             <div class="mb-3">
                <label for="segment_id" class="form-label">Segment</label>
                <select required name="segment" class="form-select form-control" id="segment_id" aria-describedby="categoryIdHelp">
                    <option hidden value="">Select a segment</option>
                    @foreach ($segments as $segment)
                        <option value="{{ $segment->id }}">{{ $segment->name }}</option>
                    @endforeach
                </select>
             </div>
           
              <div class="mb-3">
                <label for="product_type" class="form-label">Product Type</label>

                <select name="product_type" class="form-select form-control"  aria-describedby="categoryIdHelp">
                    <option id="product_type" value="{{$work->product_type}}">{{$work->product_type=="ebook"?"E-Book":"Book"}}</option>
                      @if($work->product_type=="ebook")
                    <option value="book">Book</option>
                    @else
                    <option value="ebook">E-Book</option>
                    @endif
                    
                </select>
            </div>
              <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category" class="form-select form-control" id="category_id" aria-describedby="categoryIdHelp">
                    <option default value="{{ $category->id }}">{{$category->name}}</option>
                    {{-- @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach --}}
                </select>
            </div>
            
            {{-- <div class="mb-3">
              <label for="poster_image" class="form-label">Poster Image / Thumbnail (Change if needed)</label>
              <input type="file" name="poster_image" class="form-control" id="poster_image" aria-describedby="posterImageHelp">
          </div> --}}
          <div class="mb-3" id="uploaded_image_div" >
              <label>Uploaded Poster/ Thumbnail Image:</label>
              <img id="uploaded_image" src="{{ Storage::disk('s3')->url('posterimages/thumbnail/'.$product->poster_image_name) }}" alt="Uploaded Image" style="max-width: 100px;">
          </div>
          <div  id="ebookDiv">
            <h6 class="font-weight-bold text-primary p-4">E-BOOK SECTION</h6>

            <div class="mb-3">
              <label for="e_book_file" class="form-label">Uploaded E-Book </label>
              <a class="btn btn-primary" href="{{asset("work/".$work->file_name)}}" download>DOWNLOAD</a>
          </div>
          </div>

        {{-- <div class="mb-3">
            <label for="e_book_file" class="form-label">Re-Upload book if needed</label>
            <input type="file" name="e_book_file" class="form-control" id="e_book_file" aria-describedby="posterImageHelp">
        </div> --}}
            <div class="mb-3">
                <label for="genre_id" class="form-label">Genre</label>
                <select required name="genre" class="form-select form-control" id="genre" aria-describedby="genreIdHelp">
                    
                    @foreach ($genres as $genre)
                    @if($work->genre_id==$genre->id)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endif
                    @endforeach
                  
                    @foreach ($genres as $genre)
                    @if($work->genre_id!=$genre->id)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
         
        
         
              <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input required type="text" value="{{$work->title}}" name="title" class="form-control" id="title" aria-describedby="nameHelp">
              </div>
            
              <div class="mb-3">
                <label for="language" class="form-label">Language</label>
                <select required name="language" class="form-select form-control" id="language" aria-describedby="language">
                        <option  value="{{$work->language}}">{{$work->language=="tamil"?"TAMIL":"ENGLISH"}}</option>
                        {{-- <option value="tamil">TAMIL</option>
                        <option value="english">ENGLISH</option> --}}
                </select>
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
                <input type="number" name="price" class="form-control" id="price" aria-describedby="priceHelp">
              </div>
            <div class="mb-3" id="quantityDiv">
              <label for="quantity" class="form-label">Quantity</label>
              <input type="number" name="quantity" class="form-control" id="quantity" aria-describedby="quantityHelp">
            </div>
         
       
            <div class="department_section">
                <h6 class="font-weight-bold text-primary p-4 ">SUBJECTS SEGMENT</h6>
                <div class="mb-3">
                <label for="department_id" class="form-label">Department</label>
                <select name="department" class="form-select form-control" id="department" aria-describedby="departmentIdHelp">
                    <option hidden value="">Select a department</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                </div>
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
        // Initially hide the Quantity div
        $("#quantityDiv").hide();
        // $("#ebookDiv").hide();
        $("#priceDiv, .department_section").hide();
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
            // $("#ebookDiv").hide();
            $("#e_book_file").prop("required", false);
            $("#quantity").prop("required", true);
            $("#priceDiv").show();
            $('#quantity').val(1);
            $('#quantity').attr('min', 1);
        } else if (selectedValue == "ebook") {
            // $("#ebookDiv").show();
            $("#quantityDiv").hide();
            $("#quantity").prop("required", false);
            $("#e_book_file").prop("required", true);
            $("#priceDiv").hide();
            $('#quantity').val(0);
            $('#quantity').attr('min', 0);
        } 



        
        });
    
    </script>
@endsection