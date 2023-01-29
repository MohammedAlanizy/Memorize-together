<?php 
session_start();

if (1) {

 ?>
<?php 
include_once 'db_conn.php';
$result = mysqli_query($conn,"SELECT * FROM datas");
$namecourse = mysqli_query($conn,"SELECT textis FROM sett");
 $namecourse->fetch_row()[0];
 $students = mysqli_query($conn,"SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="en">

  <head>
<link rel="icon" href="https://cdn.iconscout.com/icon/premium/png-64-thumb/crossword-138946.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Welcome To Memorize-Together.</title>
    
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
      <a href="#"><em>Memorize</em>-Together</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li><a href="index.php" class="external">Home</a></li>
      </ul>
    </nav>
  </header>

  <!-- ***** Main Banner Area Start ***** -->

  <!-- ***** Main Banner Area End ***** -->

  <script>
    function IsJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}
function removeOptions(selectElement) {
   var i, L = selectElement.options.length - 1;
   for(i = L; i >= 0; i--) {
      selectElement.remove(i);
   }
}
   function send() {

$.ajax
({
    type: 'GET',
    url: 'datasfrompadlet.php',
    data:'linkis=' + document.getElementById('pname').value,
    success: function (x) {
    if (IsJsonString(x) == true){
      document.getElementById('studentsName').style.display = "block";
      document.getElementById('ssname').style.display = "block";
      var jsonResult = JSON.parse(x);
      removeOptions(document.getElementById('studentsName'));
      jsonResult['data'].forEach(function(datax) {
        $('#studentsName').append('<option  value="' + datax.attributes.id   + '">' + datax.attributes.title + '</option>');
});}else{
  document.getElementById('studentsName').style.display = "none";
  document.getElementById('ssname').style.display = "none";
}
    },
    error: function () {
      document.getElementById('studentsName').style.display = "none";
      document.getElementById('ssname').style.display = "none";
    }
});
}
</script>
  <section class="section coming-soon" data-section="section3">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-xs-12">
          <div class="continer centerIt">
            <div>
              <h4>Hello there, <em>you can add a unit easily, simple, and with one click.</em></h4>
         
              <div class="counter">

                <div class="dayss">
                  <span></span>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
        <div class="right-content">
    <div class="top-content">
</div>
        </div>
  <div class="right-content">
    <div class="top-content">
      <h6>Add something awesome ! </h6>
    
    </div>
    <form id="contact" action="addUnitP.php" method="POST">
      <div class="row">
        <div class="col-md-12">
          <fieldset>
          <label style="color: #3CF" for="uname">Name of Session:</label>
            <input name="uname" type="text" class="form-control" id="uname" placeholder="Enter the Name of the Session.." required="">
          </fieldset>
          <fieldset>
          <label style="color: #3CF" for="cname">Name of the course:</label>
          <input name="cname" type="text" class="form-control"  id="cname" placeholder="Name of the course.." required="">
          </fieldset>
          <fieldset>
          <label style="color: #3CF" for="pname">Enter Padlet link :</label>
          <input disabled value="https://padlet.com/CrossWordAdmin/qvxqlbm6dswt3z9q" name="pname" type="text" class="form-control"   id="pname" placeholder="https://padlet.com/CrossWordAdmin/qvxqlbm6dswt3z9q" required="">
          </fieldset>
          <fieldset>
          <input value="153664975" style="color: #3CF;display: none" hidden name="studentsName" id='studentsName' for="studentsName"></input>
          <select  style="display: none;width:300px;height:30px;margin: 10px" hidden >
          </select>
          </fieldset>
          <fieldset>
          <label style="color: #3CF" for="qname">Enter Quizlet link :</label>
          <input name="qname" type="text" class="form-control" id="qname" placeholder="Ex. https://quizlet.com/xxxxxxxx" required="">
          </fieldset>
        <div class="col-md-12">
          <fieldset>
            <button type="submit" href="#section4" id="form-submit" class="button">Add </button>
          </fieldset>
          </div>
        </div>
      </div>
    </form>
    <hr style="height:20px;border-width:0;color:gray;background-color:gray">
</div>
</div>
</div>

  </section>

  <section class="section courses" data-section="section4">

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
          <i class="fa fa-add"></i>  <h2> <a href="addUnit.php"> Units </a> :</h2>
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
            <img src="<?php echo $row["imgsrc"]; ?>" alt="<?php echo $row["name"]; ?>">
            <div class="down-content">
              <h4><?php echo $row["name"]; ?></h4>
              <p><?php echo $row["Nameis"]; ?></p>
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





  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p><i class="fa fa-copyright"></i> Copyright 2022 by Mohammed & Saleem</p>
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

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
