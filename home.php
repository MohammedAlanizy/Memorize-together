<?php 

session_start();



if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {



 ?>

<?php 

include_once 'db_conn.php';

$result = mysqli_query($conn,"SELECT * FROM datas");

$namecourse = mysqli_query($conn,"SELECT textis FROM sett");

 $namecourse->fetch_row()[0];

 $Alldata = mysqli_query($conn,"SELECT * FROM conductions ORDER BY id DESC LIMIT 1");

 $XA = mysqli_fetch_array($Alldata);

 $students = mysqli_query($conn,"SELECT * FROM students");

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

      <a href="#"><em>Crossword</em>-MSU</a>

    </div>

    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>

    <nav id="menu" class="main-nav" role="navigation">

      <ul class="main-menu">

        <li><a href="index.php" class="external">Home</a></li>

        <li><a href="logout.php" class="external">Log out</a></li>

      </ul>

    </nav>

  </header>



  <!-- ***** Main Banner Area Start ***** -->



  <!-- ***** Main Banner Area End ***** -->





  <section class="section coming-soon" data-section="section3">

    <div class="container">

      <div class="row">

        <div class="col-md-7 col-xs-12">

          <div class="continer centerIt">

            <div>

              <h4>Select a student to <em>delete it or you can add new student.</em></h4>

              <div class="counter">



                <div class="dayss">

    <div class="top-content">

      <h6>Add a student </h6>

    

    </div>

    <form id="contact" action="addStudent.php" method="POST">

      <div class="row">

      <img style="width: 100px;margin: 20px" src="https://gogeticon.net/files/2068859/0647801fdbfab70fa54dc8ab642bfa2c.png">

        <div class="col-md-12">

          <fieldset>



            <input name="uname" type="text" class="form-control" id="name" placeholder="Name.." required="">

          </fieldset>

        </div>

        <div class="col-md-12">

          <fieldset>

            <button type="submit" href="#section4" id="form-submit" class="button">Add a student</button>

          </fieldset>

        </div>

      </div>

    </form>

    <hr style="height:20px;border-width:0;color:gray;background-color:gray">

    <div class="top-content">

      <h6>Delete account? <em> sure</em> from here. </h6>

    

    </div>

    <form id="contact" action="removeStudent.php" method="POST">

      <div class="row">

        <div class="col-md-12">

        <img style="width: 100px;margin: 20px" src="https://gogeticon.net/files/2068928/dbb9368a4a9c3323474d79926f19b025.png">

        <fieldset>



          <?php echo "<select name='studentsName'>";

while ($rowx =  mysqli_fetch_array($students)) {

    echo "<option value='" . $rowx['id'] . "'>" . $rowx['name'] . "</option>";

}

echo "</select>";



?>

          </fieldset>

        </div>

        <div class="col-md-12">

          <fieldset>

            <button type="submit" href="#section4" id="form-submit" class="button">Delete</button>

          </fieldset>

        </div>

      </div>

    </form>

                  <span></span>

                </div>



              </div>

            </div>

          </div>

        </div>

        

        <div class="col-md-5">

        <div class="right-content continer centerIt">

        <div>

              <h4>You can <em>manage or add an unit.</em></h4>

              <div class="counter">



                <div class="dayss">

                  <span></span>

                </div>

    <div class="top-content">

</div>

        </div>

        

  <div class="right-content">

  <div class="top-content">

      <h6>Manage </h6>

    

    </div>

    <form id="contact" action="ChangecourseName.php" method="POST">

      <div class="row">

        <div class="col-md-12">

        </div>

        <div class="col-md-12">

          <fieldset>

            <img style="width: 64px;margin: 20px" src="https://gogeticon.net/files/3192605/8295cace4ff8a4d02f9565840a4ba5a1.png">

            <div class="counter">

</div>

            <button type="button" onclick="window.location.href='addUnit.php'" >Click Here To Add an Unit...</button>

          </fieldset>

          <hr style="height:0.1px;border-width:0;color:gray;background-color:gray">

          <fieldset>

          <img style="width: 90px;margin: 20px"src="https://blogs.umass.edu/onlinetools/files/2016/11/padlet_logo_jit-288x300.png">

          <div class="counter">

</div>

            <button type="button" onclick="window.open('https://padlet.com/alanizym/dthbq21pngopj1q6', '_blank');" >Click Here To Change the posts for padlet.</button>

          </fieldset>

        </div>

      </div>

    <hr style="height:0.1px;border-width:0;color:gray;background-color:gray">

      <div class="row">

        <div class="col-md-12">

          <img style="width: 100px;margin: 20px" src="https://gogeticon.net/files/2068918/0090ba79c18de4b5d2b41fe46a4eb678.png">

        <fieldset>

   

        <input name="name" type="text" class="form-control" id="name" value="<?php echo $namecourse->fetch_row()[0];?>" placeholder="New Name.." required="">

          </fieldset>

        </div>

        <div class="col-md-12">

          <fieldset>

            <button type="submit" href="#section4" id="form-submit" class="button">Change the course name !</button>

          </fieldset>

        </div>

      </div>
      <hr style="height:0.1px;border-width:0;color:gray;background-color:gray">
      <legend style="color: white">Results :</legend>
    </form>
    
    <form id="contactPOST" action="Saveconductions.php" method="POST">

<fieldset>

<!-- <img style="width: 90px;margin: 20px"src="https://blogs.umass.edu/onlinetools/files/2016/11/padlet_logo_jit-288x300.png"> -->
<div class="counter">
<legend style="color: white">First conduction :</legend>
<label style="color: #3CF" for="uname">If student got between :</label>
<fieldset>
<input name="Conduction1From" type="text" class="form-control" id="Conduction1From" value="<?php echo $XA['Conduction1From'];?>" >
<label style="color: #3CF" for="uname">To: </label>
<input name="Conduction1To" type="number" class="form-control" id="Conduction1To" value="<?php echo $XA['Conduction1To'];?>">
<fieldset>
</legend>
</div>
<div class="counter">
<legend style="color: white">Second conduction :</legend>
<label style="color: #3CF" for="uname">If student got between :</label>
<fieldset>
<input name="Conduction2From" type="number" class="form-control" id="Conduction2From"value="<?php echo $XA['Conduction2From'];?>" >
<label style="color: #3CF" for="uname">To: </label>
<input name="Conduction2To" type="number" class="form-control" id="Conduction2To" value="<?php echo $XA['Conduction2To'];?>" >
<fieldset>
</legend>
<legend style="color: white">Else :</legend>
<legend style="color: #3CF">Show third conduction.</legend>
</div>

<script  type="text/javascript"> 
function checksAll(){
if (document.getElementById("Conduction1From").value >= document.getElementById("Conduction1To").value) {
   alert("Conduction1: Number To is bigger than/equal to number From !; That's not allowed !");
   return false;
}
  if (document.getElementById("Conduction2From").value >= document.getElementById("Conduction2To").value) {
     alert("Conduction2: Number To is bigger than/equal to number From !; That's not allowed !");
     return false;
  }
return true;
}

</script>
  <button type="button"  onclick="if (checksAll()) {document.getElementById('contactPOST').submit();};" >Save.</button>

</fieldset>

</div>
</form>
  </div>

</div>

</div>

</div>

        <?php 



if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

echo 'welcome ' .$_SESSION['user_name'];

}else{

  echo ' ';

};

 ?>



  </section>



  <section class="section courses" data-section="section4">



    <div class="container-fluid">

      <div class="row">

        <div class="col-md-12">

          <div class="section-heading">

          <i class="fa fa-add"></i>  <h2> <a href="addUnit.php"> Click here </a> to add a new unit.</h2>

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

                <a href="remove.php?id=<?php echo $row["id"]; ?>"><i class="fa fa-remove"></i> Delete it. </a>

              </div>

                <a href="results.php?id=<?php echo $row["id"]; ?>"><i class="fa fa-edit"></i> See results. </a>

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

          <p><i class="fa fa-copyright"></i> Copyright 2022 by Mohammed</p>

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