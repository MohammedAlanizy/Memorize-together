<?php 
        session_start();
include_once 'db_conn.php';
$result = mysqli_query($conn,"SELECT * FROM datas");
$namecourse = mysqli_query($conn,"SELECT textis FROM sett");
 $namecourse->fetch_row()[0];
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Welcome To Crossword Game.</title>
    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
  </head>

<body>

   
  <!--header-->
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="#"><em>MEMORIZE</em>-TOGETHER</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li><a href="#section1">Home</a></li>
        <li><a href="#section4">Community</a></li>
        <?php 

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
  echo  '<li><a href="home.php" class="external">Admin page</a></li>';
  echo  '<li><a href="logout.php" class="external">Log out</a></li>';
}else{
  echo  '<li><a href="#section3">Login</a></li>';
}
  ?>
        <li class="has-submenu"><a href="#section2">Extra</a>
          <ul class="sub-menu">
            <li><a href="#section1">Nothing :)</a></li>
            <?php 

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
  echo  '<li><a href="home.php" class="external">Admin page</a></li>';
  echo  '<li><a href="logout.php" class="external">Log out</a></li>';
}else{
  echo  '<li><a href="#section3">Login</a></li>';
}
  ?>
            <li><a href="#section4">Community</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <source src="assets/images/course-video.mp4" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
          <div class="caption">
              <h6>Welcome To </h6>
              <h2><em>Memorize-Together</em> Community </h2>
              <div class="main-button">
                  <div class="scroll-to-section"><a href="#section4">Explore the Community.</a></div>
                  <div style="padding: 30px " class="scroll-to-section2"><a href="addUnit.php">Add to the Community.</a></div>
              </div>
          </div>
      </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->


  <section class="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-12">
          <div class="features-post">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fa fa-pencil"></i>All Sessions</h4>
              </div>
              <div class="content-hide">
                <p>You can go and explore the community.</p>
                <div class="scroll-to-section">
                  <a href="#section4">Explore the Community.</a>
              </div>
            </div>
            <a href="addUnit.php">Add to the Community.</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-12">
          <div class="features-post second-features">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fa fa-graduation-cap"></i>Study with fun.</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-12">
          <div class="features-post third-features">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fa fa-book"></i>Real words</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
  echo '<section class="section coming-soon" data-section="section3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="continer centerIt">
          <div>
          <div class="counter">
            <h4 >Click here to go to <a href="home.php">Admin page</a> or click here to <a href="logout.php">Log out</a> </h4>
            </div>
          </div>
        </div>
      </div>';
  }else{

?>
  <section class="section courses" data-section="section4">
  <div class="top-content">
    <div class="container-fluid">
      <div class="row">
        
        <div class="col-md-12">
          
          <div class="section-heading">
            <h2>Sessions: </h2>      

          </div>
        </div>
        <div class="owl-carousel owl-theme">
        <?php
       if (mysqli_num_rows($result) > 0) {
  ?>
  <?php
  $i=0;
  while($row = mysqli_fetch_array($result)) {
  ?>
          <div class="item">
            <img onclick='window.location.href = "start.php?id=<?php echo $row["id"]; ?>"' src="<?php echo $row["imgsrc"]; ?>" alt="<?php echo $row["name"]; ?>">
            <div class="down-content">
              <h4 oclick='window.location.href = "start.php?id=<?php echo $row["id"]; ?>"'><?php echo $row["name"]; ?></h4>
              <p onclick='window.location.href = "start.php?id=<?php echo $row["id"]; ?>"'><?php echo $row["Nameis"]; ?></p>
              <div class="author-image">
                <img src="<?php echo $row["avater"]; ?>" onclick='window.location.href = "start.php?id=<?php echo $row["id"]; ?>"'>
              </div>
              <div class="text-button-pay">
                <a href="start.php?id=<?php echo $row["id"]; ?>">Start <i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>
          </div>
          <?php
  $i++;
}
?>
 <?php
}
else{ ?>
          <div class="item">
            <div class="down-content">
              <h4>Sorry!, Nothing here....</h4>
              </div>
              <div class="text-button-pay">
              </div>
            </div>
          </div>


<?php
}
?>
   <div class="item" hidden >
     
            <div class="down-content">
              <h4></h4>
              <p>Y</p>
              <div class="author-image">

              </div>
              <div class="text-button-pay">
                <a href="#"><i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>
          </div>
          <div class="item" hidden >

            <div class="down-content">
              <h4></h4>
              <p>Y</p>
              <div class="author-image">
            
              </div>
              <div class="text-button-pay">
                <a href="#"><i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>
          </div>
          <div class="item" hidden >
       
            <div class="down-content">
              <h4></h4>
              <p>Y</p>
              <div class="author-image">

              </div>
              <div class="text-button-pay">
                <a href="#"><i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>
          </div>
          <div class="item" hidden >
            <div class="down-content">
              <h4></h4>
              <p>Y</p>
              <div class="author-image">
              </div>
              <div class="text-button-pay">
                <a href="#"><i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>
          </div>
  </section>

  <section class="section coming-soon" data-section="section3">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-xs-12">
          <div class="continer centerIt">
            <div>
              <h4>Are you <em>an admin?</em></h4>
              <div class="counter">

                <div class="dayss">
                  <span>Login to your account.</span>
                </div>

              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-5">
        <div class="right-content">
    <div class="top-content">
        <h6>	<?php if (isset($_GET["error"])) { ?>
 <p class="error fa fa-warning" style="Color: red"><?php echo ' ' .$_GET["error"];
 ?></p>
<?php } ?> </h6>
</div>
        </div>
  <div class="right-content">
    <div class="top-content">
      <h6>You can login via your username <em>and</em> your password.</h6>
    
    </div>
    <form id="contact" action="login.php" method="POST">
      <div class="row">
        <div class="col-md-12">
          <fieldset>
            <input name="uname" type="text" class="form-control" id="name" placeholder="Username" required="">
          </fieldset>
        </div>
        <div class="col-md-12">
          <fieldset>
            <input name="password" type="password" class="form-control" id="password" placeholder="Password" required="">
          </fieldset>
        </div>
        <div class="col-md-12">
          <fieldset>
            <button type="submit" href="#section4" id="form-submit" class="button">Login</button>
          </fieldset>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>
    <?php 
}
 ?>

  </section>



  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p><i class="fa fa-copyright"></i> Copyright 2023 by Mohammed & Saleem</p>
        </div>
      </div>
    </div>
  </footer>

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
          var direction = section.replace(/#/, ''),
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

        $('.main-menu, .scroll-to-section').on('click', 'a', function (e) {
          if($(e.target).hasClass('external')) {
            return;
          }
          e.preventDefault();
          $('#menu').removeClass('active');
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>

<?php if (isset($_GET["error"])) { ?>
 <?php  echo '<script>showSection("#section3",true);</script>';} ?>
</body>
</html>