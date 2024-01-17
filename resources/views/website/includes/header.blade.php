<nav class="navbar navbar-expand-lg  py-3">
    
    <input type="checkbox" id="nav-toggle">
    <div class="logo p-5"><img src="{{asset('img/mm/logo.png')}}" alt="" width="50"></div>
   <ul class="links">
       <li><a href="/">
        HOME
       
    </a></li>
       <li><a href="{{route('genres.list')}}">GENRES</a></li>
       <li><a href="{{route('submission.list')}}">SUBMISSIONS</a></li>
       <li><a href="{{route('appointment.list')}}">APPOINTMENTS</a></li>
       <li><a href="{{route('website.user.notifications')}}">NOTIFICATIONS</a></li>
       <li><a href="{{route('website.user.about')}}">ABOUT</a></li>
       @if(!Auth::user())

       <li><a href="{{route('website.auth.login')}}">LOGIN</a></li>

       @endif
   </ul>
   <label for="nav-toggle" class="icon-burger">
       <div class="line"></div>
       <div class="line"></div>
       <div class="line"></div>
   </label>
</nav>

<style>
    nav {
    position: fixed;
    z-index: 10;
    left: 0;
    right: 0;
    top: 0;
    height: 100px;
    background-color: hsl(94, 74%, 82%);
   

}
nav .logo { 
    float: left;
    width: 40%;
    height: 100%;
    display: flex;
    align-items: center;
    font-size: 24px;
    color: #000000;
}
nav .links {
    float: right;
    padding: 0;
    margin: 0;
    width: 60%;
    height: 100%;
    display: flex;
    justify-content: space-around;
    align-items: center;
}
nav .links li {
    list-style: none;
}
nav .links a {
    display: block;
    padding: 1em;
    font-size: 16px;
    font-weight: bold;
    color: #000000;
    text-decoration: none;
    position: relative;
}
nav .links a:hover {
    color: rgb(0, 0, 0);
}
nav .links a::before {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: rgb(0, 0, 0);
    visibility: hidden;
    transform: scaleX(0);
    transition: all 0.3s ease-in-out 0s;
}
nav .links a:hover::before {
    visibility: visible;
    transform: scaleX(1);
    color: rgb(0, 0, 0);
}
#nav-toggle {
     position: absolute;
     top: -100px;
}
nav .icon-burger {
    display: none;
    position: absolute;
    right: 5%;
    top: 50%;
    transform: translateY(-50%);
}
nav .icon-burger .line {
    width: 30px;
    height: 5px;
    background-color: #000000;
    margin: 5px;
    border-radius: 3px;
    transition: all .5s ease-in-out;
}
@media screen and (max-width: 768px) {
    nav .links a {
    display: block;
    padding: 1em;
    font-size: 16px;
    font-weight: bold;
    color: #ffffff;
    text-decoration: none;
    position: relative;
}
    nav .logo {
        float: none;
        width: auto;
        justify-content: center;
    }
    nav .links {
        float: none;
        position: fixed;
        z-index: 9;
        left: 0;
        right: 0;
        top: 100px;
        bottom: 100%;
        width: auto;
        height: auto;
        flex-direction: column;
        justify-content: space-evenly;
        background-color: rgba(0, 0, 0, 0.8);
        overflow: hidden;
        transition: all .5s ease-in-out;
    }
    nav .links a {
        font-size: 20px;
    }
    nav :checked ~ .links {
        bottom: 0;
    }
    nav .icon-burger {
        display: block;
    }
    nav :checked ~ .icon-burger .line:nth-child(1) {
        transform: translateY(10px) rotate(225deg);
    }
    nav :checked ~ .icon-burger .line:nth-child(3) {
        transform: translateY(-10px) rotate(-225deg);
    }
    nav :checked ~ .icon-burger .line:nth-child(2) {
        opacity: 0;
    }
}
</style>