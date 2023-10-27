  <!-- 
    - #FOOTER
  -->

  <footer>
    <div class="container">

      <div class="card footer">

        <div class="section footer-top">

          <div class="footer-brand">

            <a href="#" class="logo">
              <img src="{{asset('frontend/FullLogo_Transparent.png')}}" width="119" height="37" loading="lazy" alt="Wren logo">
            </a>

            <p class="footer-text">
              When an unknown prnoto sans took a galley and scrambled it to make specimen book not only five When an
              unknown prnoto sans took a galley and scrambled it to five centurie.
            </p>

            <p class="footer-list-title">Address</p>

            <address class="footer-text address">
              123 Main Street <br>
              New York, NY 10001
            </address>

          </div>

          <div class="footer-list">

            <p class="footer-list-title">Categories</p>

            <ul>
              @php
                  $categories = DB::table('categories')->get()
              @endphp
              @forelse ($categories as $category)
              <li>
                <a href="#" class="footer-link hover-2">{{$category->name}}</a>
              </li>
                  
              @empty
                  
              @endforelse


              

           

            </ul>

          </div>

          {{-- <div class="footer-list">

            <p class="footer-list-title">Newsletter</p>

            <p class="footer-text">
              Sign up to be first to receive the latest stories inspiring us, case studies, and industry news.
            </p>

            <div class="input-wrapper">
              <input type="text" name="name" placeholder="Your name" required class="input-field" autocomplete="off">

              <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
            </div>

            <div class="input-wrapper">
              <input type="email" name="email_address" placeholder="Emaill address" required class="input-field"
                autocomplete="off">

              <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>
            </div>

            <a href="#" class="btn btn-primary">
              <span class="span">Subscribe</span>

              <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
            </a>

          </div> --}}

        </div>

        <div class="footer-bottom">

          <p class="copyright">
            &copy;<a href="#" class="copyright-link">NostalgiNEScape {{date('Y')}}.</a>
          </p>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>

                <span class="span">Twitter</span>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>

                <span class="span">LinkedIn</span>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-instagram"></ion-icon>

                <span class="span">Instagram</span>
              </a>
            </li>

          </ul>

        </div>

      </div>

    </div>
  </footer>





  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="arrow-up-outline" aria-hidden="true"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="{{asset('frontend/assets/js/script.js')}}"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>