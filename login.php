<?php
session_start();
include './header.php';
?>

<!-- Login page start -->
<section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact" method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>LOGIN</h2>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                    <input type="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="YOUR EMAIL..." name="email" required="">
                  </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input type="password" id="password" placeholder="PASSWORD...*" required="" name="pass">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button" name="sub">Login</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>Copyright © 2023 canva design, Ltd. All Rights Reserved. 
          <br>Design: <a href="https://www.vkpatialvi.in" target="_parent" title="free css templates">HTML CSS CODEX</a></p>
    </div>
  </section>
  <?php

include "./cone.php";

if(isset($_POST['sub'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $a = "SELECT * FROM users where email='$email' and password = '$pass'";
    $b = mysqli_query($cone,$a);
    $c = mysqli_num_rows($b);

    if($c>0){

        $r = mysqli_fetch_array($b);
        $_SESSION['uid']= $r['sno'];
        $_SESSION['uname']= $r['name'];

        echo "<script>
        alert('Login Success');
        window.location.href='index.php';
        </script>";
    }
    else{
        echo "<script>
            alert('login failed');
            window.location.href='login.php';
        </script>";
        mysqli_error($cone);
    }
}
?>
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
</body>

</body>
</html>

