<?php 

session_start();

include_once 'db_conn.php';

function validate($data){

  $data = trim($data);

$data = stripslashes($data);

$data = htmlspecialchars($data);

return $data;

}

if (isset($_GET['studentid']) && isset($_GET['testid']) && isset($_GET['verify'])){

  $studentid = validate($_GET['studentid']);

  $testid = validate($_GET['testid']);

	$sql = "SELECT * FROM studentsdata WHERE id=$studentid AND idtest=$testid";

  $generalrows = "";

  $generalrowsx = "";

  $torf = false;

		$result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {

      $torf = true;

      $row = mysqli_fetch_assoc($result);

      $generalrows = $row;

      $sqlx = "SELECT * FROM datas WHERE id=$testid";

        $resultx = mysqli_query($conn, $sqlx);

        $rowx = mysqli_fetch_assoc($resultx);

        $generalrowsx = $rowx;

    }else{

      $torf = false;

      echo 'No!!';

    }

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

        <li><a href="index.php">Home</a></li>

      </ul>

    </nav>

  </header>

  <section class="section coming-soon" data-section="section3">

    <div class="container">

      <div class="row">

        <div class="col-md-7 col-xs-12">

          <div class="continer centerIt">

            <div>

              <h4><?php if ($torf == false) {echo "Nothing in our data" ;}else{ echo  'Data Found';} ?>, the name is  <em><?php if ($torf == false) {echo "We couldn't find it, IT'S FAKE !!" ;}else{ echo $generalrows['Name'];} ?></em></h4>

              <div class="counter">



                <div class="dayss">

                 

                </div>



              </div>

            </div>

          </div>

        </div>

  <div class="right-content">

    <div class="top-content">

      <h6>Unit name is <?php if ($torf == false) {echo "We couldn't find it, IT'S FAKE !!";}else{ echo $generalrowsx['name'] .' (' . $generalrowsx['Nameis'] .')'; }?></h6>

    

    </div>

    <form id="contact" action="startquiz.php" method="POST">

      <img src="<?php  if ($torf == false) {echo 'https://cliply.co/wp-content/uploads/2021/07/372107370_CROSS_MARK_400px.gif';}else{ echo 'https://cliply.co/wp-content/uploads/2021/03/372103860_CHECK_MARK_400px.gif';} ?>" ></img>

      <div class="row">

        <div class="col-md-12">

          <fieldset>

          <button type="button" id="form-submit"  disabled class="button">Correct answers is <?php if($torf == false){echo "We couldn't find it, IT'S FAKE !!"; }else{ echo $generalrows['Good']; }?></button>

          </fieldset>

        </div>

        <div class="col-md-12">

          <fieldset>

          <button type="button" id="form-submit" disabled class="button">Wrong answers is <?php if($torf == false){echo "We couldn't find it, IT'S FAKE !!"; }else{echo $generalrows['Wrong']; }?></button>

          </fieldset>

        </div>

        <div class="col-md-12">

          <fieldset>

          <button type="button" id="form-submit" disabled class="button">Unit Name is <?php if($torf == false){echo "We couldn't find it, IT'S FAKE !!"; }else{ echo $generalrowsx['name'];} ?></button>

          </fieldset>

        </div>

      </div>

    </form>

  </div>

</div>

</div>

</div> 

</section>

<section class="section why-us" data-section="section2">

<div class="container">

      <div class="row">

        <div class="col-md-12">

          <div class="section-heading">

            <h2>Work hard!</h2>

          </div>

        </div>

        <div class="col-md-12">

          <div id="tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">

            <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">

              <li>Work Hard!</li>

              <li>Have fun!</li>



            </ul>

            <section class="tabs-content">

              <article id="tabs-1">

                <div class="row">

                  <div class="col-md-6">

                  </div>

                  <div class="col-md-6">

                    <h4></h4>

                    <p></p>

                  </div>

                </div>

              </article>

           

                </section></div>

              

            </div></div><div class="container">

      <div class="row">

        <div class="col-md-12">

          <div class="section-heading">

            <h2> HAVE FUN !!</h2>

          </div>

        </div>

        <div class="col-md-12">

          <div id="tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">

            <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">

              <li>Work Hard!</li>

              <li>Have fun!</li>



            </ul>

            <section class="tabs-content">

              <article id="tabs-1">

                <div class="row">

                  <div class="col-md-6">

                  </div>

                  <div class="col-md-6">

                    <h4></h4>

                    <p></p>

                  </div>

                </div>

              </article>

           

                </section></div>

              

            </div></div></div></div>

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

</body>

</html>





<?php

	



}else{

if ( isset($_POST['studentid'])  && isset($_POST['studentname'])  && isset($_POST['unitname']) && isset($_POST['wronganswers'])  && isset($_POST['goodanswers']) && isset($_POST['testid']) && isset($_POST['padletid']) && isset($_POST['wallid'])) {

   



  $goodanswers = validate($_POST['goodanswers']);

  $wronganswers = validate($_POST['wronganswers']);

  $studentname = validate($_POST['studentname']);

  $studentid = validate($_POST['studentid']);

  $testid = validate($_POST['testid']);

  $padletid = validate($_POST['padletid']);

  $wallid = validate($_POST['wallid']);

  $unitname = validate($_POST['unitname']);

 // start from here mooodeyyyyy !!!!!

 $namecourse = mysqli_query($conn,"SELECT textis FROM sett");

 $namecourse->fetch_row()[0];

$result = mysqli_query($conn,"Select * FROM studentsdata where id=$studentid AND idtest=$testid");
$Alldata = mysqli_query($conn,"SELECT * FROM conductions ORDER BY id DESC LIMIT 1");

$XA = mysqli_fetch_array($Alldata);
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  

$CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  

if (mysqli_num_rows($result) > 0) {

 // if ($conn->query($sql) === TRUE) {

    echo "<script>alert('Your answers have been submitted. However, your grade is $goodanswers correct answers, and $wronganswers wrong answers.');</script> <input hidden id='statu' value='true'></input>";

  }else{ //good to move

    //////////////////////////// FUNCTIONS IS HERE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! ////////////////////////////////////////////////

    function getNumbetTosection($numberofthat){

      $opts = array(

        'http'=>array(

          'method'=>"GET",

          'header'=>"Accept-language: en\r\n" .

                    "Cookie: foo=bar\r\n" .

                    "User-agent: BROWSER-DESCRIPTION-HERE\r\n"

        )

      );

      $context3 = stream_context_create($opts);

      $url = "https://padlet.com/api/5/wish_connections?wall_id=156960670";

      $file3 = file_get_contents($url, false, $context3);

      $dataf = json_decode($file3, TRUE);

      foreach ($dataf['data'] as $dataexctract){

        if ($dataexctract['attributes']['from_wish_id'] == $numberofthat){

      return $dataexctract['attributes']['to_wish_id'];

        }

      }

    }

    function Conduction1($CurPageURL,$studentid,$testid,$XA){

      $opts = array(

        'http'=>array(

          'method'=>"GET",

          'header'=>"Accept-language: en\r\n" .

                    "Cookie: foo=bar\r\n" .

                    "User-agent: BROWSER-DESCRIPTION-HERE\r\n"

        )

      );

      $context3 = stream_context_create($opts);

      $url = "https://api.padlet.com/api/5/wishes?wall_id=156960670";

      $file3 = file_get_contents($url, false, $context3);

      $dataf = json_decode($file3, TRUE);

      $targetid =  getNumbetTosection($dataf['data'][count($dataf['data']) - 1]['attributes']['id']);

      foreach ($dataf['data'] as $fulldata){

        if ($fulldata['id'] == $targetid){

          $datafromuser = array("$(studentname)", "$(correctgrades)", "$(wronggrades)","$(unitname)");

          $datafromourdatabase   = array(validate($_POST['studentname']), validate($_POST['goodanswers']), validate($_POST['wronganswers']),validate($_POST['unitname']));

          $postData = array(

            'wall_id' => validate($_POST['padletid']),

            'wall_section_id' => validate($_POST['wallid']),

            'body' => preg_replace('!(<a\s*[^>]*)href="([^"]+)"!','\1 href="' .$CurPageURL .'?verify&studentid='.   $studentid .'&testid=' .$testid .'"', str_replace($datafromuser,$datafromourdatabase,$fulldata['attributes']['body'])),

            'subject' => preg_replace('!(<a\s*[^>]*)href="([^"]+)"!','\1 href="' .$CurPageURL .'?verify&studentid='.   $studentid .'&testid=' .$testid .'"', str_replace($datafromuser,$datafromourdatabase,$fulldata['attributes']['headline'])),

            'attachment' => $fulldata['attributes']['attachment'],

            'attachment_caption' => preg_replace('!(<a\s*[^>]*)href="([^"]+)"!','\1 href="' .$CurPageURL .'?verify&studentid='.   $studentid .'&testid=' .$testid .'"', str_replace($datafromuser,$datafromourdatabase,$fulldata['attributes']['attachment_caption']))

          );

          return $postData;

       /*   $postData = array(

            'wall_id' => $padletid,

            'wall_section_id' => $wallid,

            'body' => '<div><strong><mark>' .$studentname .'</mark></strong> did it with '. $goodanswers. '  correct answers and ' . $wronganswers. ' wrong answers.<br><br><br><a href="' .$CurPageURL .'?verify&studentid='.   $studentid .'&testid=' .$testid .'">Click here to verify that.</a></div>',

            'subject' => $studentname .' need to work hard !!',

            'attachment' => 'https://media2.giphy.com/media/JT7Td5xRqkvHQvTdEu/giphy.gif',

            'attachment_caption' => 'You need to work hard , ' .$studentname    .  ' !!'

          );

          */

        }

      }

    }

    function Conduction2($CurPageURL,$studentid,$testid,$XA){

      $opts = array(

        'http'=>array(

          'method'=>"GET",

          'header'=>"Accept-language: en\r\n" .

                    "Cookie: foo=bar\r\n" .

                    "User-agent: BROWSER-DESCRIPTION-HERE\r\n"

        )

      );

      $context3 = stream_context_create($opts);

      $url = "https://api.padlet.com/api/5/wishes?wall_id=156960670";

      $file3 = file_get_contents($url, false, $context3);

      $dataf = json_decode($file3, TRUE);

      $targetid =  getNumbetTosection($dataf['data'][count($dataf['data']) - 2]['attributes']['id']);

      foreach ($dataf['data'] as $fulldata){

        if ($fulldata['id'] == $targetid){

          $datafromuser = array("$(studentname)", "$(correctgrades)", "$(wronggrades)","$(unitname)");

          $datafromourdatabase   = array(validate($_POST['studentname']), validate($_POST['goodanswers']), validate($_POST['wronganswers']),validate($_POST['unitname']));

          $postData = array(

            'wall_id' => validate($_POST['padletid']),

            'wall_section_id' => validate($_POST['wallid']),

            'body' => preg_replace('!(<a\s*[^>]*)href="([^"]+)"!','\1 href="' .$CurPageURL .'?verify&studentid='.   $studentid .'&testid=' .$testid .'"', str_replace($datafromuser,$datafromourdatabase,$fulldata['attributes']['body'])),

            'subject' => preg_replace('!(<a\s*[^>]*)href="([^"]+)"!','\1 href="' .$CurPageURL .'?verify&studentid='.   $studentid .'&testid=' .$testid .'"', str_replace($datafromuser,$datafromourdatabase,$fulldata['attributes']['headline'])),

            'attachment' => $fulldata['attributes']['attachment'],

            'attachment_caption' => preg_replace('!(<a\s*[^>]*)href="([^"]+)"!','\1 href="' .$CurPageURL .'?verify&studentid='.   $studentid .'&testid=' .$testid .'"', str_replace($datafromuser,$datafromourdatabase,$fulldata['attributes']['attachment_caption']))

          );

          return $postData;

        }

      }

    }
    function Conduction3($CurPageURL,$studentid,$testid,$XA){

      $opts = array(

        'http'=>array(

          'method'=>"GET",

          'header'=>"Accept-language: en\r\n" .

                    "Cookie: foo=bar\r\n" .

                    "User-agent: BROWSER-DESCRIPTION-HERE\r\n"

        )

      );

      $context3 = stream_context_create($opts);

      $url = "https://api.padlet.com/api/5/wishes?wall_id=156960670";

      $file3 = file_get_contents($url, false, $context3);

      $dataf = json_decode($file3, TRUE);

      $targetid =  getNumbetTosection($dataf['data'][count($dataf['data']) - 3]['attributes']['id']);

      foreach ($dataf['data'] as $fulldata){

        if ($fulldata['id'] == $targetid){

          $datafromuser = array("$(studentname)", "$(correctgrades)", "$(wronggrades)","$(unitname)");

          $datafromourdatabase   = array(validate($_POST['studentname']), validate($_POST['goodanswers']), validate($_POST['wronganswers']),validate($_POST['unitname']));

          $postData = array(

            'wall_id' => validate($_POST['padletid']),

            'wall_section_id' => validate($_POST['wallid']),

            'body' => preg_replace('!(<a\s*[^>]*)href="([^"]+)"!','\1 href="' .$CurPageURL .'?verify&studentid='.   $studentid .'&testid=' .$testid .'"', str_replace($datafromuser,$datafromourdatabase,$fulldata['attributes']['body'])),

            'subject' => preg_replace('!(<a\s*[^>]*)href="([^"]+)"!','\1 href="' .$CurPageURL .'?verify&studentid='.   $studentid .'&testid=' .$testid .'"', str_replace($datafromuser,$datafromourdatabase,$fulldata['attributes']['headline'])),

            'attachment' => $fulldata['attributes']['attachment'],

            'attachment_caption' => preg_replace('!(<a\s*[^>]*)href="([^"]+)"!','\1 href="' .$CurPageURL .'?verify&studentid='.   $studentid .'&testid=' .$testid .'"', str_replace($datafromuser,$datafromourdatabase,$fulldata['attributes']['attachment_caption']))

          );

          return $postData;

        }

      }

    }
    ///////////////////////////////////////////////// END OF FUNCTIONS !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! //////////////////////////////////////////////////////////

    date_default_timezone_set("America/New_York");

    $ddaate =date("Y-m-d h:i:sa");

    $sql = "INSERT INTO studentsdata (id,Name,Wrong,Good,date,idtest) VALUES ('$studentid','$studentname','$wronganswers','$goodanswers','$ddaate','$testid')";

    if ($conn->query($sql) === TRUE) { //perfecto to post data into padlet
    try {   //conditon 1 !
// FROM IS 15 
// TO IS 20 
// GOOD ANSWERS ARE 1
if (validate($XA['Conduction1From']) <=  $goodanswers  && $goodanswers  <= validate($XA['Conduction1To']) ){

     try {

      $postData = Conduction1($CurPageURL,$studentid,$testid,$XA);

    if ($postData == null){

      $postData = array(

        'wall_id' => $padletid,

        'wall_section_id' => $wallid,

        'body' => '<div><strong><mark>' .$studentname .'</mark></strong> did it with '. $goodanswers. '  correct answers and ' . $wronganswers. ' wrong answers.<br><br><br><a href="' .$CurPageURL .'?verify&studentid='.   $studentid .'&testid=' .$testid .'">Click here to verify that.</a></div>',

        'subject' => $studentname .' need to work hard !!',

        'attachment' => 'https://media2.giphy.com/media/JT7Td5xRqkvHQvTdEu/giphy.gif',

        'attachment_caption' => 'You need to work hard , ' .$studentname    .  ' !!'

      );

    }

     } catch (\Throwable $th) {

      $postData = array(

        'wall_id' => $padletid,

        'wall_section_id' => $wallid,

        'body' => '<div><strong><mark>' .$studentname .'</mark></strong> did it with '. $goodanswers. '  correct answers and ' . $wronganswers. ' wrong answers.<br><br><br><a href="' .$CurPageURL .'?verify&studentid='.   $studentid .'&testid=' .$testid .'">Click here to verify that.</a></div>',

        'subject' => $studentname .' need to work hard !!',

        'attachment' => 'https://media2.giphy.com/media/JT7Td5xRqkvHQvTdEu/giphy.gif',

        'attachment_caption' => 'You need to work hard , ' .$studentname    .  ' !!'

      );

     }

    

   }elseif (validate($XA['Conduction2From']) <= $goodanswers  && $goodanswers <= validate($XA['Conduction2To'])) {

     try {

      $postData = Conduction2($CurPageURL,$studentid,$testid,$XA);

      if ($postData == ''){

        $postData = array(

          'wall_id' => $padletid,

          'wall_section_id' => $wallid,

          'body' => '<div><strong><mark>' .$studentname .'</mark></strong> did it with '. $goodanswers. '  correct answers and ' . $wronganswers. ' wrong answers.<br><br><br><a href="' .$CurPageURL .'?verify&studentid='.   $studentid .'&testid=' .$testid .'">Click here to verify that.</a></div>',

          'subject' => $studentname .' need to work hard !!',

          'attachment' => 'https://media2.giphy.com/media/JT7Td5xRqkvHQvTdEu/giphy.gif',

          'attachment_caption' => 'You need to work hard , ' .$studentname    .  ' !!'

        );

      }

     } catch (\Throwable $th) {

      $postData = array(

        'wall_id' => $padletid,

        'wall_section_id' => $wallid,

        'body' => '<div><strong><mark>' .$studentname .'</mark></strong> did it with '. $goodanswers. '  correct answers and ' . $wronganswers. ' wrong answers.<br><br><br><a href="' .$CurPageURL .'?verify&studentid='.   $studentid .'&testid=' .$testid .'">Click here to verify that.</a></div>',

        'subject' => $studentname .' need to work hard !!',

        'attachment' => 'https://media2.giphy.com/media/JT7Td5xRqkvHQvTdEu/giphy.gif',

        'attachment_caption' => 'You need to work hard , ' .$studentname    .  ' !!'

      );

     }

  }else{
    try {

      $postData = Conduction3($CurPageURL,$studentid,$testid,$XA);

      if ($postData == ''){

        $postData = array(

          'wall_id' => $padletid,

          'wall_section_id' => $wallid,

          'body' => '<div><strong><mark>' .$studentname .'</mark></strong> did it with '. $goodanswers. '  correct answers and ' . $wronganswers. ' wrong answers.<br><br><br><a href="' .$CurPageURL .'?verify&studentid='.   $studentid .'&testid=' .$testid .'">Click here to verify that.</a></div>',

          'subject' => $studentname .' need to work hard !!',

          'attachment' => 'https://media2.giphy.com/media/JT7Td5xRqkvHQvTdEu/giphy.gif',

          'attachment_caption' => 'You need to work hard , ' .$studentname    .  ' !!'

        );

      }

     } catch (\Throwable $th) {

      $postData = array(

        'wall_id' => $padletid,

        'wall_section_id' => $wallid,

        'body' => '<div><strong><mark>' .$studentname .'</mark></strong> did it with '. $goodanswers. '  correct answers and ' . $wronganswers. ' wrong answers.<br><br><br><a href="' .$CurPageURL .'?verify&studentid='.   $studentid .'&testid=' .$testid .'">Click here to verify that.</a></div>',

        'subject' => $studentname .' need to work hard !!',

        'attachment' => 'https://media2.giphy.com/media/JT7Td5xRqkvHQvTdEu/giphy.gif',

        'attachment_caption' => 'You need to work hard , ' .$studentname    .  ' !!'

      );

     }
  }
} catch (\Throwable $th) {
  $postData = array(

    'wall_id' => $padletid,

    'wall_section_id' => $wallid,

    'body' => '<div><strong><mark>' .$studentname .'</mark></strong> did it with '. $goodanswers. '  correct answers and ' . $wronganswers. ' wrong answers.<br><br><br><a href="' .$CurPageURL .'?verify&studentid='.   $studentid .'&testid=' .$testid .'">Click here to verify that.</a></div>',

    'subject' => $studentname .' did it !!',

    'attachment' => 'https://media2.giphy.com/media/JT7Td5xRqkvHQvTdEu/giphy.gif',

    'attachment_caption' => 'Nice, ' .$studentname    .  ' !'

  );
}
    $authToken = 'Bearer x';

    $ch = curl_init('https://padlet.com/api/5/wishes');

    curl_setopt_array($ch, array(

        CURLOPT_POST => TRUE,

        CURLOPT_RETURNTRANSFER => TRUE,

        CURLOPT_HTTPHEADER => array(

         //   'Authorization: '.$authToken,

            'Content-Type: application/json',

            'Authorization: ' .$authToken

               ),

        CURLOPT_POSTFIELDS => json_encode($postData)

    ));

    $response = curl_exec($ch);

    if($response === FALSE){

        die(curl_error($ch));

    }

    $responseData = json_decode($response, TRUE);

    curl_close($ch);

    echo "<script>alert('Your answers have been submitted. However, your grade is $goodanswers correct answers, and $wronganswers wrong answers.');</script> <input hidden id='statu' value='true'></input></script>;";;

    }else{ //error saving

      echo "<script>alert('Error submitting, please contact with Mohammed. However, your grade is $goodanswers correct answers, and $wronganswers wrong answers.');</script> <input hidden id='statu' value='true'></input></script>;";;



    }

  }





// The data to send to the API

/* 

*/

 ?>



<?php 



//get questions&answers from quizlet

 }else{

echo "No permission, Please log in !! + Don't play with me :)";

 }

}

?>









