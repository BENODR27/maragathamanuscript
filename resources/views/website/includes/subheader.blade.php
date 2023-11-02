<nav>
    
    <div class="logo">{{$pageTitle}}</div>

   <div for="nav-toggle" id="backButton"class="back-button">
    <i class="fa fa-arrow-left" aria-hidden="true"></i>
   </div>
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
    padding: 0 5%;

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



nav .back-button {
    display: none;
    position: absolute;
    left: 9%;
    top: 38%;
    width: 50px;
    height: 50px;
    
}
nav .back-button .line {
    width: 30px;
    height: 5px;
    background-color: #000000;
    margin: 5px;
    border-radius: 3px;
    transition: all .5s ease-in-out;
}

    nav .logo {
        float: none;
        width: auto;
        justify-content: center;
    }

   
    nav .back-button {
        display: block;
    }
  

</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    // Get the back button element by its ID
    var backButton = document.getElementById("backButton");

    // Add a click event listener to the button
    backButton.addEventListener("click", function () {
        // Navigate back in the browser's history
        window.history.back();
    });
});
</script>