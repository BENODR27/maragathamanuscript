@extends('layouts.adminlayout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Page Heading -->

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3 d-flex justify-content-between">
         <h6 class="font-weight-bold text-primary">EDIT CATEGORY</h6> 
         {{-- <a class="btn btn-primary"href="{{route('category.browse')}}">Back</a> --}}
     </div>
     <div class="card-body">
        <form action="{{route('category.update',['category_id'=>$category->id])}}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">DESCRIPTION</label>
              <textarea required value="{{$category->description}}"   name="description" placeholder="" class="form-control" oninvalid="this.setCustomValidity('Enter Valid Description')" oninput="this.setCustomValidity('')">{{$category->description}}</textarea>

            </div>
            <div class="mb-3">
              <label for="category_type" class="form-label">Category Type</label>
              <select required name="category_type" class="form-select form-control" id="category_type" aria-describedby="categoryIdHelp" oninvalid="this.setCustomValidity('Select Valid Category')" oninput="this.setCustomValidity('')">
                  
                <option value="{{$category->category_type}}">{{($category->category_type=="book_ebook")?"Book, Audio Book and E-Book":"Audio & Video"}}</option>
                      {{-- <option value="book_ebook">Book, Audio Book and E-Book</option>
                      <option value="audio_video">Audio & Video</option> --}}
              </select>
          </div>
          {{-- @if($category->name!="OTHERS")
            <div class="mb-3">
              <label for="category_image" class="form-label">CATEGORY IMAGE</label>
              <input  type="file" name="category_image" class="form-control" id="category_image" aria-describedby="posterImageHelp" oninvalid="this.setCustomValidity('Please Select Valid Category Image')" oninput="this.setCustomValidity('')">
          </div>

          <div class="mb-3" id="uploaded_image_div" >
              <label>Uploaded Category Image:</label>
              <img id="uploaded_image" src="{{ Storage::disk('s3')->url('categoryimages/'.$category->category_image_name) }}" alt="Uploaded Image" style="max-width: 100px;">
          </div>
          @endif --}}
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">NAME</label>
              <input type="text" value="{{$category->name}}" name="name" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
     </div>
 </div>


</div>
<!-- /.container-fluid -->
<script>
  // JavaScript to display the uploaded image
  const posterImageInput = document.getElementById('category_image');
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