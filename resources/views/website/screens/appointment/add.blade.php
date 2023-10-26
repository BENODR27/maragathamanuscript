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
            <div class="col-md-12">
              <label for="inputAuthor4" class="form-label">AUTHOR NAME</label>
              <input type="text" name="author_name" class="form-control" id="inputAuthor4">
            </div>
            <div class="col-md-12">
              <label for="inputTitle4" class="form-label">APPOINTMENT FOR</label>
              <input type="text" name="for" class="form-control" id="inputTitle4">
            </div>
            <div class="col-12">
                <label for="inputState" class="form-label">MODE</label>
                <select id="inputState"name="mode" class="form-select">
                  <option hidden>Choose...</option>
                  <option value="online">online</option>
                  <option value="offline">offline</option>
                 
                </select>
            </div>
            <div class="col-md-12">
              <label for="inputTitle4" class="form-label">CHOOSE DATE & TIME</label>
              <input type="datetime-local" name="dateandtime" class="form-control" id="inputTitle4">
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" name="terms"type="checkbox" id="gridCheck">
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

@endsection