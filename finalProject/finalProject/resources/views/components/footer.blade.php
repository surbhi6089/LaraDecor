<footer class="text-center footer">
    <!-- Grid container -->
    <div class="container">
      <form action={{url("/newsletter")}} method="POST" class="newsletter-form">
        @csrf
        <div>
            <p>Subscribe to our newsletter!</p>
        </div>
        <div class="newsletter-column">
            <div class="newsletter-input">
                <label class="subscribe-logo">
                    <img src="{{asset('/storage/images/home/logo.png')}}"  alt="...">
                </label>
                <input name="email" type="email" placeholder="Your email address">
            </div>
            <div>
                <button type="submit" class="subscribe-button">Subscribe</button>
            </div>
        </div>
    </form>
      <hr class="my-5" />

      <!-- Section: Text -->
      <section class="mb-3">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <p>
              Happy Interior Shopping!
            </p>
          </div>
        </div>
      </section>
      <!-- Section: Social -->
      <section class="text-center mb-5">
        <a href="" class="text-white me-4">
          <i class="fa fa-facebook-f"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fa fa-twitter"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fa fa-instagram"></i>
        </a>
      </section>
      <!-- Section: Social -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3 footer-copyright">
      © 2023 Copyright
      <a class="text-white" href="https://mdbootstrap.com/"
         >LaraDecor</a
        >
    </div>
    <!-- Copyright -->
  </footer>
