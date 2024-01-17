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
        <form class="row " action="{{route('submission.save')}}" method="post" enctype="multipart/form-data">
          @csrf
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
            <div class="col-md-12 mb-3">
              <label for="inputAuthor4" class="form-label">AUTHOR NAME</label>
              <input type="text" required class="form-control" name="author_name" id="inputAuthor4" oninvalid="this.setCustomValidity('Please Enter Author Name')" oninput="this.setCustomValidity('')">
            </div>
            <div class="col-md-12 mb-3">
              <label for="inputTitle4" class="form-label">TITLE OF WORK</label>
              <input type="text" required class="form-control" name="title" id="inputTitle4" oninvalid="this.setCustomValidity('Please Enter Title Of Work')" oninput="this.setCustomValidity('')">
            </div>
            <div class="mb-3">
              <label for="product_type" class="form-label">Book Type</label>
              <select name="product_type" required class="form-select form-control" id="product_type" aria-describedby="categoryIdHelp" oninvalid="this.setCustomValidity('Please Select Valid Book Type')" oninput="this.setCustomValidity('')">
                  <option hidden value="">Select a type</option>
                     <option value="book">Book</option>
                      <option value="ebook">E-Book</option>
                  
              </select>
          </div>
          <div class="mb-3">
            <label for="product_type" class="form-label">Poster Image</label>
@include('includes.imagecrop')
</div>
            <div class="col-12 mb-3">
              <label for="inputState" class="form-label">Genre</label>
                <select name="genre" required id="inputState" class="form-select" oninvalid="this.setCustomValidity('Please Select Valid Genre')" oninput="this.setCustomValidity('')">
                  <option hidden  value="">Select a genre</option>
                  @foreach ($genres as $genre)
                  <option value="{{$genre->id}}">{{$genre->name}}</option>
                  @endforeach
                 
                  
                </select>
                {{-- <input class="form-control" name="genrename" type="text" list="genredl" >
                <datalist id="genredl">
                    @foreach ($genres as $genre)
                    <option value="{{$genre->name}}">
                      @endforeach
                </datalist> --}}

            </div>
            <div class="col-12 mb-3">
                <label for="inputState" class="form-label">LANGUAGE OF STORY</label>
                <select name="language" required id="inputState" class="form-select" oninvalid="this.setCustomValidity('Please Select Valid Language')" oninput="this.setCustomValidity('')">
                  <option hidden value="" >Select a language</option>
                  <option value="tamil">TAMIL</option>
                  <option value="english">ENGLISH</option>
                  {{-- <option value="BOTH">BOTH</option> --}}
                </select>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">SUBMIT THE WORK (E-book)</label>
                    <input required class="form-control @error('file') is-invalid @enderror" name="file" type="file" id="formFileMultiple" oninvalid="this.setCustomValidity('Please Upload Valid E-Book')" oninput="this.setCustomValidity('')">
                  </div>
            </div>
         
            
            <div class="col-12 mb-3">
              <div class="form-check">
                <input class="form-check-input" required name="terms" type="checkbox" id="gridCheck" {{ old('terms') ? 'checked' : '' }} oninvalid="this.setCustomValidity('Please Accept Terms & Conditions To Continue')" oninput="this.setCustomValidity('')">
                <label class="form-check-label" for="gridCheck">
                  Terms and Conditions
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">SUBMIT</button>
              {{-- <button type="submit" class="btn btn-warning">SAVE IN DRAFT</button> --}}
            </div>
        </form>
    </div>
</section>

@endsection