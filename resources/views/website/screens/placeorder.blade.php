@extends('layouts.website.layout1')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-10 col-lg-12 col-xl-12 text-center p-0 mt-3 mb-2">
                <div class="card  pt-4  mt-5 mb-3 p-4">
                    {{-- <h2 id="heading">Sign Up Your User Account</h2>
                    <p>Fill all form field to go to next step</p> --}}
                    <form id="msform" action="{{route('confirmorder')}}" method="post">
                        @csrf
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>ADDRESS</strong></li>
                            <li id="personal"><strong>DELIVERY</strong></li>
                            <li id="payment"><strong>PAYMENT</strong></li>
                            <li id="confirm"><strong>PLACE ORDER</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> <br> <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Address Information:</h2>
                                    </div>
                                    <div class="col-5">
                                        {{-- <h2 class="steps">1</h2> --}}
                                    </div>
                                </div> 
                                <label class="fieldlabels">Door No :</label>
                                 <input type="text" name="door_no" value="{{$address->door_no}}"placeholder="Eg:22/7" />
                                <label class="fieldlabels">Street Name :</label>
                                 <input type="text" name="street_name" value="{{$address->street_name}}" placeholder="Eg:Theer street" />
                                <label class="fieldlabels">Locality / LandMark</label>
                                 <input type="text" name="locality_landmark" value="{{$address->locality_landmark}}" placeholder="Eg:Near Nagaraja Kovil" />
                                <label class="fieldlabels">District</label>
                                 <input type="text" name="district" value="{{$address->district}}" placeholder="Eg:Kanniyakumari" />
                                <label class="fieldlabels">State</label>
                                 <input type="text" name="state" value="{{$address->state}}" placeholder="Eg:TamilNadu" />
                                <label class="fieldlabels">Country</label>
                                 <input type="text" name="country" value="{{$address->country}}" placeholder="Eg:India" />
                                <label class="fieldlabels">Pincode</label>
                                 <input type="text" name="pincode" value="{{$address->pincode}}" placeholder="Eg:629001" />
                                 
                            </div> <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Delivery Information:</h2>
                                    </div>
                                    <div class="col-5">
                                        {{-- <h2 class="steps">2</h2> --}}
                                    </div>
                                </div> <label class="fieldlabels">Name: *</label>
                                 <input type="text" name="name" value="{{Auth::user() ? Auth::user()->name :""}}" placeholder="Your Name" />
                              
                                  <label class="fieldlabels">Mobile.: *</label>
                                   <input type="text" name="mobile_number" value="{{Auth::user() ? Auth::user()->mobile_number :""}}" placeholder="Eg:9876543210" /> 
                                  <label class="fieldlabels">Email: *</label>
                                   <input type="email" name="email" readonly value="{{Auth::user() ? Auth::user()->email:""}}" placeholder="Eg:yourmail@mail.com." />
                            </div> <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Payment method:</h2>
                                    </div>
                                    <div class="col-5">
                                        {{-- <h2 class="steps">3</h2> --}}
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="fieldlabels">Cash On Delivery</div>
                                </div>
                              
                                
                            </div> <input type="button" name="next" class="next action-button" value="Next" /> 
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    {{-- <div class="col-7">
                                        <h2 class="fs-title">Status</h2>
                                    </div> --}}
                                    <div class="col-5">
                                        {{-- <h2 class="steps">4</h2> --}}
                                    </div>
                                </div> <br><br>
                                {{-- <h2 class="purple-text text-center"><strong> !</strong></h2> <br> --}}
                                <div class="row justify-content-center">
                                    <div class="col-3">
                                         {{-- <img src="https://i.imgur.com/GwStPmg.png" class="fit-image">  --}}
                                        </div>
                                </div> <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5 class="purple-text text-center">Click Here To Place Order</h5>
                                        <button type="submit"class="btn btn-primary mt-3">CONFIRM ORDER</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

<style>




p {
    color: grey
}

#heading {
    text-transform: uppercase;
    color: #098c16;
    font-weight: normal
}

#msform {
    text-align: center;
    position: relative;
    margin-top: 20px
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

.form-card {
    text-align: left
}

#msform fieldset:not(:first-of-type) {
    display: none
}

#msform input,
#msform textarea {
    padding: 8px 15px 8px 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    background-color: #ECEFF1;
    font-size: 16px;
    letter-spacing: 1px
}

#msform input:focus,
#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #098c16;
    outline-width: 0
}

#msform .action-button {
    width: 100px;
    background: #098c16;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right
}

#msform .action-button:hover,
#msform .action-button:focus {
    background-color: #311B92
}

#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    background-color: #000000
}

.card {
    z-index: 0;
    border: none;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #098c16;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
}

.purple-text {
    color: #098c16;
    font-weight: normal
}

.steps {
    font-size: 25px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right
}

.fieldlabels {
    color: gray;
    text-align: left
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #098c16
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f13e"
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007"
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f030"
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #098c16
}

.progress {
    height: 20px
}

.progress-bar {
    background-color: #098c16
}

.fit-image {
    width: 100%;
    object-fit: cover
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);

$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(++current);
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});

function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
}

$(".submit").click(function(){
return false;
})

});
</script>

@endsection