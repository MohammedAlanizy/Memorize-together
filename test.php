<?php 

if ( (isset($_POST['id'])) && isset($_POST['testid'])) {
    session_start();
  include_once 'db_conn.php';
  function validate($data){
    $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
$testid = validate($_POST['id']);
$idis = validate($_POST['id']);
$result = mysqli_query($conn,"SELECT * FROM datas where id=$idis" );
$namecourse = mysqli_query($conn,"SELECT textis FROM sett");
$students = mysqli_query($conn,"SELECT * FROM students");
$namecourse->fetch_row()[0];
}else{
	header("Location: index.php");
	exit();
}
?>
     <?php
       if (mysqli_num_rows($result) > 0) {
  ?>
  <?php
  $i=0;
  while($row = mysqli_fetch_array($result)) {
    $data = $row['data'];
    $wallid = $row['wall_id'];
    $padletid = $row['padlet_id'];
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Crosswords Game - MSU </title>

    <!--Bootstrap-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">

    <!--Styles-->
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/media.css" />
</head>

<body>
    <!-- Start section Start -->
    <section class="start-bg">
        <div class="container">
        <div class="game_name">
        <div style = "top: 333px" class="relative px-6 pt-10 pb-8 bg-white shadow-xl ring-1 ring-gray-900/5 sm:max-w-lg sm:mx-auto sm:rounded-lg sm:px-10">
    <div class="max-w-md mx-auto">
      <div class="divide-y divide-gray-300/50">
        <div class="py-8 text-base leading-7 space-y-6 text-gray-600">
          <p>Hello there 🖐🏼,</p>
          <ul class="space-y-4">
            <li class="flex items-center">
              <svg class="w-6 h-6 flex-none fill-sky-100 stroke-sky-500 stroke-2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="11" />
                <path d="m8 13 2.165 2.165a1 1 0 0 0 1.521-.126L16 9" fill="none" />
              </svg>
              <p class="ml-4">
                Session:
                <code class="text-sm font-bold text-gray-900"><?php echo $row["name"]; ?> </code> 
              </p>
            </li>
            <li class="flex items-center">
              <svg class="w-6 h-6 flex-none fill-sky-100 stroke-sky-500 stroke-2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="11" />
                <path d="m8 13 2.165 2.165a1 1 0 0 0 1.521-.126L16 9" fill="none" />
              </svg>
              <p class="ml-4">
                Course:
                <code class="text-sm font-bold text-gray-900"><?php echo $row["Nameis"]; ?></code>
              </p>
            </li>
          </ul>
          <p>Please Enter your name to start.</p>
        </div>
        <div class="pt-8 text-base leading-7 font-semibold">
          <p class="text-gray-900">Your name is :</p>
          <p>
          <input  style="padding: 10px" id="std" onChange="update()" name="studentsid"></input>
                    <?php echo '';
                        
                        echo '	<script type="text/javascript">
                        function update() {
                          var select = document.getElementById("std");
                          var option = document.getElementById("std");
                          document.getElementById("studentid").value = select.value;
                          document.getElementById("studentnamex").value  = document.getElementById("std").value;
                          document.getElementById("nameofstudent").innerHTML  = document.getElementById("std").value;
                          document.getElementById("goodanswers").value = 0
                          document.getElementById("wronganswers").value = (document.querySelectorAll("*[numberofwords]").length) 
                        }
                        
                        update();
                        </script>'
                        
                        ?>
            <a style="color: white;" class="content-center place-self-end text-sky-1200 p-13 hover:text-sky-1200">.</a>
          </p>
          <div>
          <a  id="quiz-start-btn"  style="display: flex; justify-content: space-around" class="btn btn-primary startBtn">
            Let's Start
          </a>
         </div>
        </div>
      </div>
    </div>
  </div>
</div>
        </div>
                    </div>
</section>
    <section class="game_bg">

        <div id="flex-wrapper" role="main">
            <div id="puzzle" class="valid-parent">
                <div class="crossword row"></div>
            </div>
                    <div id="wrapper">
                </div>
            <img  alt="" class="player">

        


    </section>
    <!-- End game section -->

    <!-- Start you win section -->
    <section class="win_bg">
        <div class="final_score">
            <p>Score</p>
            <span>0</span>
        </div>
    </section>
    <!-- End you win section -->

    <!-- Start you lose section -->
    <section class="lose_bg">
        <div class="final_score">
            <p>Score</p>
            <span>0</span>
        </div>
    </section>
    <!-- End you lose section -->

    <!-- Start the Rotate msg if Portrait -->
<!--  <div class="rotateMessage">
    <div class="rotateMessage-container">
        <div class="rotateMessage-content">
            <div class="rotateMessage-text">
                Please use landscape mode
            </div>
        </div>
    </div>
</div>
-->
    <!-- End the Rotate msg if Portrait -->


    <!-- Start game loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End game loader -->

    <!-- End game confirm popup -->
    <div id="confirm">
        <div class="inner">
            <h4>Are you sure for submitting the answers ?</h4>
            <p>You are going to end game with: <span class="score">0</span> correct answers.</span></p>
            <div class="btns">
                <img class="hover-animation" id="end-game-button" src="assets/images/yes-btn.svg" alt="">
                <img class="hover-animation" id="continue-game-button" src="assets/images/no-btn.svg" alt="">
            </div>
        </div>
    </div>
    <!-- End game confirm popup -->

    <script type="text/javascript" src="assets/js/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
<script>var input = document.getElementById('std');
input.focus();
input.select();
</script>


    <?php 
     echo '<script type="text/javascript"> var wordxx = ' .$data .';</script>
     <script type="text/javascript" src="assets/js/index.js"></script>
     <script type="text/javascript" src="assets/js/game.js"></script>';
    ?>


<form id="contact" target="contentx" action="Submitanswers.php" method="POST">
      <input hidden name="testid" value="<?php echo $testid; ?>"></input>
      <input hidden id="studentnamex" name="studentname" value=""></input>
      <input hidden id="padletid" name="padletid" value="<?php echo $padletid; ?>"></input>
      <input hidden id="wallid" name="wallid" value="<?php echo $wallid; ?>"></input>     
      <input hidden id="studentid" name="studentid" value=""></input>     
      <input hidden id="goodanswers" name="goodanswers" value="0"></input>     
      <input hidden id="wronganswers" name="wronganswers" value="0"></input> 
      <input hidden id="unitname" name="unitname" value="<?php echo $row["Nameis"] ?>"></input> 
</form>
<iframe  onload="custom()" id="contentxlol" name="contentx" style="display: none">  
</iframe>
</body>

</html>
<?php } }else{
      	header("Location: index.php");
        exit();
    } ?>