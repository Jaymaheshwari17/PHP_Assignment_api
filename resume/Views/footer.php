<!-- Footer -->
  <footer class="w3l-footer">
    <div id="footers14-block" class="py-3">
      <div class="container">
        <div class="footers14-bottom text-center">
          <div class="social">
            <a href="#facebook" class="facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
            <a href="#google" class="google"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
            <a href="#twitter" class="twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
            <a href="#instagram" class="instagram"><span class="fa fa-instagram" aria-hidden="true"></span></a>
            <a href="#youtube" class="youtube"><span class="fa fa-youtube" aria-hidden="true"></span></a>
          </div>
          <div class="copyright mt-1">
            <p>| Design by <a href="https://w3layouts.com/">Jay Maheshwari</a></p>
          </div>
        </div>
      </div>
    </div>
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
      <span class="fa fa-angle-up" aria-hidden="true"></span>
    </button>
    <script>
      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function () {
        scrollFunction()
      };

      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("movetop").style.display = "block";
        } else {
          document.getElementById("movetop").style.display = "none";
        }
      }

      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
    <!-- /move top -->

  </footer>
  <!-- Footer -->

  <!-- jQuery and Bootstrap JS -->
  <script src="<?php echo $this->baseurl;?>/js/jquery-3.4.1.slim.min.js"></script>
  <script src="<?php echo $this->baseurl;?>/js/bootstrap.min.js"></script>

  <!-- Template JavaScript -->
  <script src="<?php echo $this->baseurl;?>/js/jquery.magnific-popup.min.js"></script>
  <script>
    $(document).ready(function () {
      $('.popup-with-zoom-anim').magnificPopup({
        type: 'inline',

        fixedContentPos: false,
        fixedBgPos: true,

        overflowY: 'auto',

        closeBtnInside: true,
        preloader: false,

        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
      });

      $('.popup-with-move-anim').magnificPopup({
        type: 'inline',

        fixedContentPos: false,
        fixedBgPos: true,

        overflowY: 'auto',

        closeBtnInside: true,
        preloader: false,

        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-slide-bottom'
      });
    });
  </script>

  <!-- disable body scroll which navbar is in active -->
  <script>
    $(function () {
      $('.navbar-toggler').click(function () {
        $('body').toggleClass('noscroll');
      })
    });
  </script>
  <!-- disable body scroll which navbar is in active -->


  <script src="<?php echo $this->baseurl;?>/js/smartphoto.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const sm = new SmartPhoto(".js-img-viwer", {
        showAnimation: false
      });
      // sm.destroy();
    });
  </script>


</body>

</html>