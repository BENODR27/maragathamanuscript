<div class="scrollable-row">
    <div class="card  bg-white" style="width: 12rem;">
      
            <figure class="book m-3">
  
                <!-- Front -->

                    <ul class="hardcover_front">
                        <li>
                            <img src={{asset('storage/thumbnail/posterimages/'.$product->poster_image_name)}} class="card-img-top p-2" alt="Card Image">                        </li>
                        
                            <li></li>
                    </ul>

                <!-- Pages -->

                    <ul class="page">
                        <li></li>
                        <li>
                            <a class="btn" href="{{route('category.publications_comics_others.product',['product_id'=>$product->id])}}">View More</a>

                        </li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>

                <!-- Back -->

                    <ul class="hardcover_back">
                        <li></li>
                        <li></li>
                    </ul>
                    {{-- <ul class="book_spine">
                        <li></li>
                        <li></li>
                    </ul> --}}
                
                </figure>
        <div class="card-body">
           <div class="row">
            <h6 class="card-text product-title">{{$product->title }}</h6>
           </div>
           <div class="row">
            <div class = "product-rating">
                @if($product->rating_average!=0)
                  @for ($i = 1; $i <= $product->rating_average; $i++)
                  <i style="color:green"class = "fa fa-star"></i>
                  @endfor
                  @for ($i = $product->rating_average+1; $i <= 5; $i++)
                  <i class = "fa fa-star"></i>
                  @endfor
                  <span>({{$product->viewers}})</span>
                @else
                  <p><span><small>No ratings yet!</small></span></p>
                @endif
                  
                </div>
           </div>
          
           <div class="row">
            <div class="col product-genre">
               {{$product->genre->name }}
            </div>
           </div>
         
        </div>
    </div>
    </div> 

    <style>
        /*
	A. Mini Reset 
*/





ul {
	
	list-style: none;
}

a {
	color: #2c3e50;
	text-decoration: none;
}

.btn {
	display: inline-block;
	text-transform: uppercase;
	border: 2px solid #2c3e50;
	margin-top: 100px; 
	font-size: 0.9em;
	font-weight: 700;
	padding: 0.1em 0.4em;
	text-align: center;
	-webkit-transition: color 0.3s, border-color 0.3s;
	-moz-transition: color 0.3s, border-color 0.3s;
	transition: color 0.3s, border-color 0.3s;
}

.btn:hover {
	border-color: #16a085;
	color: #16a085;
}

/* basic grid, only for this demo */

.align {
	clear: both;
	margin: 90px auto 20px;
	width: 100%;
	max-width: 1170px;
	text-align: center;
}

.align > li {
	width: 500px;
	min-height: 300px;
	display: inline-block;
	margin: 30px 20px 30px 30px;
	padding: 0 0 0 60px;
	vertical-align: top;
}

/* ///////////////////////////////////////////////////

HARDCOVER
Table of Contents

1. container
2. background & color
3. opening cover, back cover and pages
4. position, transform y transition
5. events
6. Bonus
	- Cover design
	- Ribbon
	- Figcaption
7. mini-reset

/////////////////////////////////////////////////////*/

/*
	1. container
*/

.book {
	position: relative;
	width: 160px; 
	height: 220px;
	-webkit-perspective: 1000px;
	-moz-perspective: 1000px;
	perspective: 1000px;
	-webkit-transform-style: preserve-3d;
	-moz-transform-style: preserve-3d;
	transform-style: preserve-3d;
}

/*
	2. background & color
*/

/* HARDCOVER FRONT */
.hardcover_front li:first-child {
	background-color: #eee;
	-webkit-backface-visibility: hidden;
	-moz-backface-visibility: hidden;
	backface-visibility: hidden;
}

/* reverse */
.hardcover_front li:last-child {
	background: #fffbec;
}

/* HARDCOVER BACK */
.hardcover_back li:first-child {
	background: #fffbec;
}

/* reverse */
.hardcover_back li:last-child {
	background: #fffbec;
}

.book_spine li:first-child {
	background: #eee;
}
.book_spine li:last-child {
	background: #333;
}

/* thickness of cover */

.hardcover_front li:first-child:after,
.hardcover_front li:first-child:before,
.hardcover_front li:last-child:after,
.hardcover_front li:last-child:before,
.hardcover_back li:first-child:after,
.hardcover_back li:first-child:before,
.hardcover_back li:last-child:after,
.hardcover_back li:last-child:before,
.book_spine li:first-child:after,
.book_spine li:first-child:before,
.book_spine li:last-child:after,
.book_spine li:last-child:before {
	background: #999;
}

/* page */

.page > li {
	background: -webkit-linear-gradient(left, #e1ddd8 0%, #fffbf6 100%);
	background: -moz-linear-gradient(left, #e1ddd8 0%, #fffbf6 100%);
	background: -ms-linear-gradient(left, #e1ddd8 0%, #fffbf6 100%);
	background: linear-gradient(left, #e1ddd8 0%, #fffbf6 100%);
	box-shadow: inset 0px -1px 2px rgba(50, 50, 50, 0.1), inset -1px 0px 1px rgba(150, 150, 150, 0.2);
	border-radius: 0px 5px 5px 0px;
}

/*
	3. opening cover, back cover and pages
*/

.hardcover_front {
	-webkit-transform: rotateY(-34deg) translateZ(8px);
	-moz-transform: rotateY(-34deg) translateZ(8px);
	transform: rotateY(-34deg) translateZ(8px);
	z-index: 100;
}

.hardcover_back {
	-webkit-transform: rotateY(-15deg) translateZ(-8px);
	-moz-transform: rotateY(-15deg) translateZ(-8px);
	transform: rotateY(-15deg) translateZ(-8px);
}

.page li:nth-child(1) {
	-webkit-transform: rotateY(-28deg);
	-moz-transform: rotateY(-28deg);
	transform: rotateY(-28deg);
}

.page li:nth-child(2) {
	-webkit-transform: rotateY(-30deg);
	-moz-transform: rotateY(-30deg);
	transform: rotateY(-30deg);
}

.page li:nth-child(3) {
	-webkit-transform: rotateY(-32deg);
	-moz-transform: rotateY(-32deg);
	transform: rotateY(-32deg);
}

.page li:nth-child(4) {
	-webkit-transform: rotateY(-34deg);
	-moz-transform: rotateY(-34deg);
	transform: rotateY(-34deg);
}

.page li:nth-child(5) {
	-webkit-transform: rotateY(-36deg);
	-moz-transform: rotateY(-36deg);
	transform: rotateY(-36deg);
}

/*
	4. position, transform & transition
*/

.hardcover_front,
.hardcover_back,
.book_spine,
.hardcover_front li,
.hardcover_back li,
.book_spine li {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	-webkit-transform-style: preserve-3d;
	-moz-transform-style: preserve-3d;
	transform-style: preserve-3d;
}

.hardcover_front,
.hardcover_back {
	-webkit-transform-origin: 0% 100%;
	-moz-transform-origin: 0% 100%;
	transform-origin: 0% 100%;
}

.hardcover_front {
	-webkit-transition: all 0.8s ease, z-index 0.6s;
	-moz-transition: all 0.8s ease, z-index 0.6s;
	transition: all 0.8s ease, z-index 0.6s;
}

/* HARDCOVER front */
.hardcover_front li:first-child {
	cursor: default;
	-webkit-user-select: none;
	-moz-user-select: none;
	user-select: none;
	-webkit-transform: translateZ(2px);
	-moz-transform: translateZ(2px);
	transform: translateZ(2px);
}

.hardcover_front li:last-child {
	-webkit-transform: rotateY(180deg) translateZ(2px);
	-moz-transform: rotateY(180deg) translateZ(2px);
	transform: rotateY(180deg) translateZ(2px);
}

/* HARDCOVER back */
.hardcover_back li:first-child {
	-webkit-transform: translateZ(2px);
	-moz-transform: translateZ(2px);
	transform: translateZ(2px);
}

.hardcover_back li:last-child {
	-webkit-transform: translateZ(-2px);
	-moz-transform: translateZ(-2px);
	transform: translateZ(-2px);
}

/* thickness of cover */
.hardcover_front li:first-child:after,
.hardcover_front li:first-child:before,
.hardcover_front li:last-child:after,
.hardcover_front li:last-child:before,
.hardcover_back li:first-child:after,
.hardcover_back li:first-child:before,
.hardcover_back li:last-child:after,
.hardcover_back li:last-child:before,
.book_spine li:first-child:after,
.book_spine li:first-child:before,
.book_spine li:last-child:after,
.book_spine li:last-child:before {
	position: absolute;
	top: 0;
	left: 0;
}

/* HARDCOVER front */
.hardcover_front li:first-child:after,
.hardcover_front li:first-child:before {
	width: 4px;
	height: 100%;
}

.hardcover_front li:first-child:after {
	-webkit-transform: rotateY(90deg) translateZ(-2px) translateX(2px);
	-moz-transform: rotateY(90deg) translateZ(-2px) translateX(2px);
	transform: rotateY(90deg) translateZ(-2px) translateX(2px);
}

.hardcover_front li:first-child:before {
	-webkit-transform: rotateY(90deg) translateZ(158px) translateX(2px);
	-moz-transform: rotateY(90deg) translateZ(158px) translateX(2px);
	transform: rotateY(90deg) translateZ(158px) translateX(2px);
}

.hardcover_front li:last-child:after,
.hardcover_front li:last-child:before {
	width: 4px;
	height: 160px;
}

.hardcover_front li:last-child:after {
	-webkit-transform: rotateX(90deg) rotateZ(90deg) translateZ(80px) translateX(-2px) translateY(-78px);
	-moz-transform: rotateX(90deg) rotateZ(90deg) translateZ(80px) translateX(-2px) translateY(-78px);
	transform: rotateX(90deg) rotateZ(90deg) translateZ(80px) translateX(-2px) translateY(-78px);
}
.hardcover_front li:last-child:before {
	box-shadow: 0px 0px 30px 5px #333;
	-webkit-transform: rotateX(90deg) rotateZ(90deg) translateZ(-140px) translateX(-2px) translateY(-78px);
	-moz-transform: rotateX(90deg) rotateZ(90deg) translateZ(-140px) translateX(-2px) translateY(-78px);
	transform: rotateX(90deg) rotateZ(90deg) translateZ(-140px) translateX(-2px) translateY(-78px);
}

/* thickness of cover */

.hardcover_back li:first-child:after,
.hardcover_back li:first-child:before {
	width: 4px;
	height: 100%;
}

.hardcover_back li:first-child:after {
	-webkit-transform: rotateY(90deg) translateZ(-2px) translateX(2px);
	-moz-transform: rotateY(90deg) translateZ(-2px) translateX(2px);
	transform: rotateY(90deg) translateZ(-2px) translateX(2px);
}
.hardcover_back li:first-child:before {
	-webkit-transform: rotateY(90deg) translateZ(158px) translateX(2px);
	-moz-transform: rotateY(90deg) translateZ(158px) translateX(2px);
	transform: rotateY(90deg) translateZ(158px) translateX(2px);
}

.hardcover_back li:last-child:after,
.hardcover_back li:last-child:before {
	width: 4px;
	height: 160px;
}

.hardcover_back li:last-child:after {
	-webkit-transform: rotateX(90deg) rotateZ(90deg) translateZ(80px) translateX(2px) translateY(-78px);
	-moz-transform: rotateX(90deg) rotateZ(90deg) translateZ(80px) translateX(2px) translateY(-78px);
	transform: rotateX(90deg) rotateZ(90deg) translateZ(80px) translateX(2px) translateY(-78px);
}

.hardcover_back li:last-child:before {
	box-shadow: 10px -1px 80px 20px #666;
	-webkit-transform: rotateX(90deg) rotateZ(90deg) translateZ(-140px) translateX(2px) translateY(-78px);
	-moz-transform: rotateX(90deg) rotateZ(90deg) translateZ(-140px) translateX(2px) translateY(-78px);
	transform: rotateX(90deg) rotateZ(90deg) translateZ(-140px) translateX(2px) translateY(-78px);
}

/* BOOK SPINE */
.book_spine {
	-webkit-transform: rotateY(60deg) translateX(-5px) translateZ(-12px);
	-moz-transform: rotateY(60deg) translateX(-5px) translateZ(-12px);
	transform: rotateY(60deg) translateX(-5px) translateZ(-12px);
	width: 16px;
	z-index: 0;
}

.book_spine li:first-child {
	-webkit-transform: translateZ(2px);
	-moz-transform: translateZ(2px);
	transform: translateZ(2px);
}

.book_spine li:last-child {
	-webkit-transform: translateZ(-2px);
	-moz-transform: translateZ(-2px);
	transform: translateZ(-2px);
}

/* thickness of book spine */
.book_spine li:first-child:after,
.book_spine li:first-child:before {
	width: 4px;
	height: 100%;
}

.book_spine li:first-child:after {
	-webkit-transform: rotateY(90deg) translateZ(-2px) translateX(2px);
	-moz-transform: rotateY(90deg) translateZ(-2px) translateX(2px);
	transform: rotateY(90deg) translateZ(-2px) translateX(2px);
}

.book_spine li:first-child:before {
	-webkit-transform: rotateY(-90deg) translateZ(-12px);
	-moz-transform: rotateY(-90deg) translateZ(-12px);
	transform: rotateY(-90deg) translateZ(-12px);
}

.book_spine li:last-child:after,
.book_spine li:last-child:before {
	width: 4px;
	height: 16px;
}

.book_spine li:last-child:after {
	-webkit-transform: rotateX(90deg) rotateZ(90deg) translateZ(8px) translateX(2px) translateY(-6px);
	-moz-transform: rotateX(90deg) rotateZ(90deg) translateZ(8px) translateX(2px) translateY(-6px);
	transform: rotateX(90deg) rotateZ(90deg) translateZ(8px) translateX(2px) translateY(-6px);
}

.book_spine li:last-child:before {
	box-shadow: 5px -1px 100px 40px rgba(0, 0, 0, 0.2);
	-webkit-transform: rotateX(90deg) rotateZ(90deg) translateZ(-210px) translateX(2px) translateY(-6px);
	-moz-transform: rotateX(90deg) rotateZ(90deg) translateZ(-210px) translateX(2px) translateY(-6px);
	transform: rotateX(90deg) rotateZ(90deg) translateZ(-210px) translateX(2px) translateY(-6px);
}

.page,
.page > li {
	position: absolute;
	top: 0;
	left: 0;
	-webkit-transform-style: preserve-3d;
	-moz-transform-style: preserve-3d;
	transform-style: preserve-3d;
}

.page {
	width: 100%;
	height: 98%;
	top: 1%;
	left: 3%;
	z-index: 10;
}

.page > li {
	width: 100%;
	height: 100%;
	-webkit-transform-origin: left center;
	-moz-transform-origin: left center;
	transform-origin: left center;
	-webkit-transition-property: transform;
	-moz-transition-property: transform;
	transition-property: transform;
	-webkit-transition-timing-function: ease;
	-moz-transition-timing-function: ease;
	transition-timing-function: ease;
}

.page > li:nth-child(1) {
	-webkit-transition-duration: 0.6s;
	-moz-transition-duration: 0.6s;
	transition-duration: 0.6s;
}

.page > li:nth-child(2) {
	-webkit-transition-duration: 0.6s;
	-moz-transition-duration: 0.6s;
	transition-duration: 0.6s;
}

.page > li:nth-child(3) {
	-webkit-transition-duration: 0.4s;
	-moz-transition-duration: 0.4s;
	transition-duration: 0.4s;
}

.page > li:nth-child(4) {
	-webkit-transition-duration: 0.5s;
	-moz-transition-duration: 0.5s;
	transition-duration: 0.5s;
}

.page > li:nth-child(5) {
	-webkit-transition-duration: 0.6s;
	-moz-transition-duration: 0.6s;
	transition-duration: 0.6s;
}

/*
	5. events
*/

.book:hover > .hardcover_front {
	-webkit-transform: rotateY(-145deg) translateZ(0);
	-moz-transform: rotateY(-145deg) translateZ(0);
	transform: rotateY(-145deg) translateZ(0);
	z-index: 0;
}

.book:hover > .page li:nth-child(1) {
	-webkit-transform: rotateY(-30deg);
	-moz-transform: rotateY(-30deg);
	transform: rotateY(-30deg);
	-webkit-transition-duration: 1.5s;
	-moz-transition-duration: 1.5s;
	transition-duration: 1.5s;
}

.book:hover > .page li:nth-child(2) {
	-webkit-transform: rotateY(-35deg);
	-moz-transform: rotateY(-35deg);
	transform: rotateY(-35deg);
	-webkit-transition-duration: 1.8s;
	-moz-transition-duration: 1.8s;
	transition-duration: 1.8s;
}

.book:hover > .page li:nth-child(3) {
	-webkit-transform: rotateY(-118deg);
	-moz-transform: rotateY(-118deg);
	transform: rotateY(-118deg);
	-webkit-transition-duration: 1.6s;
	-moz-transition-duration: 1.6s;
	transition-duration: 1.6s;
}

.book:hover > .page li:nth-child(4) {
	-webkit-transform: rotateY(-130deg);
	-moz-transform: rotateY(-130deg);
	transform: rotateY(-130deg);
	-webkit-transition-duration: 1.4s;
	-moz-transition-duration: 1.4s;
	transition-duration: 1.4s;
}

.book:hover > .page li:nth-child(5) {
	-webkit-transform: rotateY(-140deg);
	-moz-transform: rotateY(-140deg);
	transform: rotateY(-140deg);
	-webkit-transition-duration: 1.2s;
	-moz-transition-duration: 1.2s;
	transition-duration: 1.2s;
}

/*
	6. Bonus
*/

/* cover CSS */

.coverDesign {
	position: absolute;
	top: 0;
	left: 0;
	bottom: 0;
	right: 0;
	overflow: hidden;
	z-index: 1;
	-webkit-backface-visibility: hidden;
	-moz-backface-visibility: hidden;
	backface-visibility: hidden;
}

.coverDesign::after {
	background-image: -webkit-linear-gradient( -135deg, rgba(255, 255, 255, 0.45) 0%, transparent 100%);
	background-image: -moz-linear-gradient( -135deg, rgba(255, 255, 255, 0.45) 0%, transparent 100%);
	background-image: linear-gradient( -135deg, rgba(255, 255, 255, 0.45) 0%, transparent 100%);
	position: absolute;
	top: 0;
	left: 0;
	bottom: 0;
	right: 0;
}

.coverDesign h1 {
	color: #fff;
	font-size: 2.2em;
	letter-spacing: 0.05em;
	text-align: center;
	margin: 54% 0 0 0;
	text-shadow: -1px -1px 0 rgba(0,0,0,0.1);
}

.coverDesign p {
	color: #f8f8f8;
	font-size: 1em;
	text-align: center;
	text-shadow: -1px -1px 0 rgba(0,0,0,0.1);
}

.yellow {
	background-color: #f1c40f;
	background-image: -webkit-linear-gradient(top, #f1c40f 58%, #e7ba07 0%);
	background-image: -moz-linear-gradient(top, #f1c40f 58%, #e7ba07 0%);
	background-image: linear-gradient(top, #f1c40f 58%, #e7ba07 0%);
}

.blue {
	background-color: #3498db;
	background-image: -webkit-linear-gradient(top, #3498db 58%, #2a90d4 0%);
	background-image: -moz-linear-gradient(top, #3498db 58%, #2a90d4 0%);
	background-image: linear-gradient(top, #3498db 58%, #2a90d4 0%);
}

.grey {
	background-color: #f8e9d1;
	background-image: -webkit-linear-gradient(top, #f8e9d1 58%, #e7d5b7 0%);
	background-image: -moz-linear-gradient(top, #f8e9d1 58%, #e7d5b7 0%);
	background-image: linear-gradient(top, #f8e9d1 58%, #e7d5b7 0%);
}

/* Basic ribbon */

.ribbon {
	background: #c0392b;
	color: #fff;
	display: block;
	font-size: 0.7em;
	position: absolute;
	top: 11px;
	right: 1px;
	width: 40px;
	height: 20px;
	line-height: 20px;
	letter-spacing: 0.15em; 
	text-align: center;
	-webkit-transform: rotateZ(45deg) translateZ(1px);
	-moz-transform: rotateZ(45deg) translateZ(1px);
	transform: rotateZ(45deg) translateZ(1px);
	-webkit-backface-visibility: hidden;
	-moz-backface-visibility: hidden;
	backface-visibility: hidden;
	z-index: 10;
}

.ribbon::before,
.ribbon::after{
	position: absolute;
	top: -20px;
	width: 0;
	height: 0;
	border-bottom: 20px solid #c0392b;
	border-top: 20px solid transparent;
}

.ribbon::before{
}

.ribbon::after{
	right: -20px;
	border-right: 20px solid transparent;
}

/* figcaption */

figcaption {
	padding-left: 40px;
	text-align: left;
	position: absolute;
	top: 0%;
	left: 160px;
	width: 310px;
	-webkit-backface-visibility: hidden;
}

figcaption h1 {
	margin: 0;
}

figcaption span {
	color: #16a085;
	padding: 0.6em 0 1em 0;
	display: block;
}

figcaption p {
	color: #63707d;
	line-height: 1.3;
}

/* Media Queries */
@media screen and (max-width: 37.8125em) {
	.align > li {
		width: 100%;
		min-height: 440px;
		height: auto;
		padding: 0;
	}


	figcaption {
		text-align: center;
		width: 320px;
		top: 250px;
		padding-left: 0;
		font-size: 90%;
	}
}

    </style>




 