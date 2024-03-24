@extends('layouts.website.layout1')
@section('content')
<!-- header banner -->
<section class="header-banner bookpress-parallax p-5" id="header-banner-id">
  <div class="container d-flex justify-content-between align-items-center text-white">
      <div class="overlay-out">
          <h1 class="banner-title">{{$pageTitle}}</h1>
          <p class="text-white"><a href="/" class="text-decoration-none text-white">Home</a> /
              <span  onclick="history.back()" class="text-decoration-none text-white">Appointments</span>
          </p>
      </div>
      <img src="{{asset("layout/assets/images/banner-image.png")}}" class="img-fluid" alt="Books">
      <div class="parallax start-0 top-0 w-100 h-100"></div>
  </div>
</section>
<!-- header banner end -->
<section class="submissions-add p-5">
    <div class="container">
        <form class="row g-3" action="{{route('appointment.save')}}" method="post">
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
            <div class="col-md-12">
              <label for="inputAuthor4" class="form-label">AUTHOR NAME</label>
              <input required type="text" value="{{Auth::user() ? Auth::user()->name :""}}" readonly name="author_name" class="form-control" id="inputAuthor4" oninvalid="this.setCustomValidity('Enter Valid Author Name ')" oninput="this.setCustomValidity('')">
            </div>
            <div class="col-md-12">
              <label for="inputTitle4" class="form-label">APPOINTMENT FOR</label>
              <textarea required maxlength="120" minlength="10"  name="for" placeholder="" class="form-control" oninvalid="this.setCustomValidity('Enter Valid Reason For Appointment')" oninput="this.setCustomValidity('')"></textarea>
            </div>
            <div class="col-12">
                <label for="inputState" class="form-label">MODE</label>
                <select required id="inputState"name="mode" class="form-select" oninvalid="this.setCustomValidity('Select Mode Of Appointment')" oninput="this.setCustomValidity('')">
                  <option hidden value="">Select a mode</option>
                  <option value="online">online</option>
                  <option value="offline">offline</option>
                 
                </select>
            </div>
            <div class="col-md-12">
              <label for="inputTitle4" class="form-label">CHOOSE DATE & TIME</label>
              <input required type="datetime-local" name="dateandtime" class="form-control" id="inputTitle4" oninvalid="this.setCustomValidity('Select Valid Date & Time')" oninput="this.setCustomValidity('')">
            </div>
            <div class="col-12">
              <div class="form-check">
                <input required class="form-check-input" name="terms"type="checkbox" id="gridCheck" oninvalid="this.setCustomValidity('Please Accept Terms & Conditions To Continue')" oninput="this.setCustomValidity('')">
                <label class="form-check-label" for="gridCheck" >
                  Terms and Conditions <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#termsconditionsmodal">(T&C)</a>
                </label>
                
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">SUBMIT</button>
            </div>
          </form>
    </div>
</section>


@endsection