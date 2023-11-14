   <!-- footer section -->
   <footer id="footer" class="footer pt-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 gx-5 gy-4">
            <div class="col">
                <h4 class="mb-4 footerheader">{{ GoogleTranslate::trans("Contact", app()->getLocale()) }}</h4>
                <ul class="li-unstyled ps-0 footer-content footer-contact">
                    <li class="mb-3"><a href="#"><i class="fa-solid fa-location-dot"></i>&nbsp 
                        {{ GoogleTranslate::trans("Maragathaa Manuscripts", app()->getLocale()) }}</a></li>
                    <li class="mb-3"><a href="#"><i class="fa-solid"></i> 13/91 A2 ,{{ GoogleTranslate::trans("J.A.S Illam", app()->getLocale()) }}</a></li>
                    <li class="mb-3"><a href="#"><i class="fa-solid "></i> {{ GoogleTranslate::trans("Pattatharavilai, Changai,", app()->getLocale()) }}</a></li>
                    <li class="mb-3"><a href="#"><i class="fa-solid "></i> {{ GoogleTranslate::trans("Kanjiracode Post.", app()->getLocale()) }}
                        </a>
                    </li>
                    <li class="mb-3"><a href="#"><i class="fa-solid "></i>
                        {{ GoogleTranslate::trans("Kanyakumari District.", app()->getLocale()) }}</a>
                    </li>
                    <li class="mb-3"><a href="#"><i class="fa-solid "></i>  {{ GoogleTranslate::trans("PIN:", app()->getLocale()) }}629155</a></li>
                </ul>
            </div>
            <div class="col">
                <div class="footer-links">
                    <h4 class="mb-4 footerheader">{{ GoogleTranslate::trans("Navigation", app()->getLocale()) }}</h4>
                    <ul class="li-unstyled ps-0 footer-content hyphen-icon">
                        <li class="mb-3"><a href="/"><span class="ms-1">
                            @if(app()->getLocale()=="en")
                            HOME
                            @else
                            முகப்பு
                            @endif
                        </span></a></li>
                        <li class="mb-3"><a href="#product-category"><span class="ms-1">{{ GoogleTranslate::trans("Shop", app()->getLocale()) }}</span></a></li>
                        <li class="mb-3"><a href="#author-id"><span class="ms-1">{{ GoogleTranslate::trans("About us", app()->getLocale()) }}</span></a></li>
                        <li class="mb-3"><a href="#footer"><span class="ms-1">{{ GoogleTranslate::trans("Contact", app()->getLocale()) }}</span></a></li>
                    </ul>
                </div>
            </div>
            
            
            <div class="col">
                <div class="footer-links">
                    <h4 class="mb-4 footerheader">{{ GoogleTranslate::trans("Others", app()->getLocale()) }}</h4>
                    <ul class="li-unstyled ps-0 footer-content hyphen-icon">
                        <li class="mb-3"><a href="/"><span class="ms-1">{{ GoogleTranslate::trans("Terms & Conditions", app()->getLocale()) }}</span></a></li>
                        {{-- <li class="mb-3"><a href="#product-category"><span class="ms-1">Shop</span></a></li>
                        <li class="mb-3"><a href="#author-id"><span class="ms-1">About us</span></a></li>
                        <li class="mb-3"><a href="#footer"><span class="ms-1">Contact</span></a></li> --}}
                    </ul>
                </div>
            </div>
            <div class="col ">
                {{-- <a href="#"><img src="assets/images/index2/logo-main-2.png" alt="Footer logo"
                        class="img-fluid mb-3"></a> --}}
                <p>{{ GoogleTranslate::trans("“Books are mirrors: you only see in them what you already have inside you.” “The whole world opened to me when I learned to read.” “A reader lives a thousand lives before he dies, said Jojen. The man who never reads lives only one.”", app()->getLocale()) }}
                    
                </p>
                <ul class="d-flex gap-3 ps-0 pt-5 social-icons">
                    <li><a href="#" target="_blank" class="blue-bg"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="#" target="_blank" class="bg-primary"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="#" target="_blank" class="dark-blue-bg"><i class="fa-brands fa-vimeo-v"></i></a>
                    </li>
                    <li><a href="#" target="_blank" class="orange-bg"><i class="fa-brands fa-pinterest"></i></a>
                    </li>
                </ul>
            </div>
           
        </div>
    </div>
    <div class="copyright mt-5">
        <p class="py-4">&copy; 2023 futureinterstellar. All Rights Reserved</p>
    </div>


    <!-- Scroll Back to Top -->
    <a href="#section-hero" class="back-to-top"><i class="fa-solid fa-arrow-up"></i></a>
    <!-- End Scroll Back to Top -->
  <style>
    .footerheader{
        color: green !important;

    }
  </style>
</footer>
<!-- footer section end -->