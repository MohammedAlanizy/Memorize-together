<?php 

session_start();

if ( isset($_POST['uname'])  && isset($_POST['cname'])   && isset($_POST['qname'])) {



  include_once 'db_conn.php';

  function validate($data){

    $data = trim($data);

  $data = stripslashes($data);

  $data = htmlspecialchars($data);

  return $data;

  }

  $unitname = validate($_POST['uname']);

  $coursename = validate($_POST['cname']);

  $quizletname = validate($_POST['qname']);

  $padletname = 'https://padlet.com/CrossWordAdmin/jgncuezky84d2m5v';

  $wall_id = '153672561';

 // start from here mooodeyyyyy !!!!!

// try to find id of the padlet

// get list of padlet names 



 ?>



<?php 

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

function getMessageCreated($padletnumber, $wall_id, $wronganswers,$myBase,$lastid,$unitname){

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

  $targetid =  getNumbetTosection($dataf['data'][count($dataf['data']) - 4]['attributes']['id']);

  foreach ($dataf['data'] as $fulldata){

    if ($fulldata['id'] == $targetid){

      if ($fulldata['attributes']['attachment'] == null){

           $linkattachment = $myBase . '/start.php?id=' . $lastid;

      }else{

             $linkattachment = $fulldata['attributes']['attachment'];

              }

      $postData = array(

        'wall_id' => $padletnumber,

        'wall_section_id' => $wall_id,

        'body' => str_replace("$(unitname)",$unitname,preg_replace('!(<a\s*[^>]*)href="([^"]+)"!','\1 href="' . $myBase . '/start.php?id=' . $lastid .'"',$fulldata['attributes']['body'])),

        'subject' => str_replace("$(unitname)",$unitname,preg_replace('!(<a\s*[^>]*)href="([^"]+)"!','\1 href="' . $myBase . '/start.php?id=' . $lastid .'"',$fulldata['attributes']['headline'])),

        'attachment' => $linkattachment,

        'attachment_caption' => str_replace("$(unitname)",$unitname,preg_replace('!(<a\s*[^>]*)href="([^"]+)"!','\1 href="' . $myBase . '/start.php?id=' . $lastid .'"',$fulldata['attributes']['attachment_caption']))

      );

      return $postData;

    }

  }

}

$lastid = 0;

//get questions&answers from quizlet

$opts = array(

  'http'=>array(

    'method'=>"GET",

    'header'=>"Accept-language: en\r\n" .

              "Cookie: foo=bar\r\n" .

              "User-agent: BROWSER-DESCRIPTION-HERE\r\n"

  )

);

$string = $quizletname;

preg_match('|/([0-9]+)/|',$string,$matches);

$num = $matches[1];

$context = stream_context_create($opts);

$url = "https://quizlet.com/webapi/3.4/studiable-item-documents?filters%5BstudiableContainerId%5D=" . $num  . "&filters%5BstudiableContainerType%5D=1&perPage=9999&page=1";

$file = file_get_contents($url, false, $context);

$jsonx = json_decode($file,true);

$jss = $jsonx['responses'];

$allfinal = "";

$arr = array ();

foreach($jss as $country) {

  foreach($country['models']['studiableItem'] as $countryss) {

    $wordis = "";

    $xword = "";

    $xxmeaning = "";

    foreach($countryss['cardSides'] as $countryss2) {

      if ( $countryss2['label'] == "word"){

      $xword = str_replace(" ","",$countryss2['media'][0]['plainText']);
      $xword = preg_replace('/[^a-z]/i','', $xword);

    //    $wordis = $wordis .'{"word":"'.$countryss2['media'][0]['plainText'] .'",' ;

      }elseif ( $countryss2['label'] == "definition"){

        $xxmeaning = $countryss2['media'][0]['plainText'];

      //  $wordis =  $wordis .'"defenition":"'. $countryss2['media'][0]['plainText'] .'"},' ;

      }

        };

        $arr =  array_merge($arr,array(

          array('value' => $xword,'clue' =>  $xxmeaning))); 

          

  };



};

$finaljsondataquizlet = json_encode($arr);

$opts = array(

  'http'=>array(

    'method'=>"GET",

    'header'=>"Accept-language: en\r\n" .

              "Cookie: foo=bar\r\n" .

              "User-agent: BROWSER-DESCRIPTION-HERE\r\n"

  )

);

$context = stream_context_create($opts);

$url = "https://api.padlet.com/api/5/links?url=" .$padletname;

$file = file_get_contents($url, false, $context);

$jsonx = json_decode($file,true);

$padletnumber =  str_replace("-","",filter_var($jsonx['data']['id'], FILTER_SANITIZE_NUMBER_INT));

  $context3 = stream_context_create($opts);

  $url = "https://padlet.com/walls/" .$padletnumber;

  $file3 = file_get_contents($url, false, $context3);

  $photobefore = json_decode($file3, TRUE);

  $photofinal = $photobefore['background']['url'];

  $photoavatar = $photobefore['builder']['avatar'];

$finaljsondataquizlet = str_replace("'","",$finaljsondataquizlet);

  $sql = "INSERT INTO datas (name,data,Nameis,padlet_id,wall_id,imgsrc,avater) VALUES ('$unitname','$finaljsondataquizlet','$coursename','$padletnumber','$wall_id','$photofinal','$photoavatar')";

 if ($conn->query($sql) === TRUE) {

  $lastid = mysqli_insert_id($conn);

  $myBase =  (((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

  // The data to send to the API

  try {

    $postData = getMessageCreated($padletnumber, $wall_id, $wronganswers,$myBase,$lastid,$unitname);

    if ($postData == null){

     $postData = array(

       'wall_id' => $padletnumber,

       'wall_section_id' => $wall_id,

       'body' => '<div><br><a href="' . $myBase . '/start.php?id=' . $lastid  .'">Click here to start the game !</a></div>',

       'subject' => 'New Crossword - '. $unitname .' !',

       'attachment' => $myBase . '/start.php?id=' . $lastid

   );

 }

  } catch (\Throwable $th) {

   $postData = array(

     'wall_id' => $padletnumber,

     'wall_section_id' => $wall_id,

     'body' => '<div><br><a href="' . $myBase . '/start.php?id=' . $lastid  .'">Click here to start the game !</a></div>',

     'subject' => 'New Crossword - '. $unitname .' !',

     'attachment' => $myBase . '/start.php?id=' . $lastid

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

    echo "Student added successfully";

   header("Location: home.php");

    exit();

  } else {

    echo "Error adding student contact with Mohammed please :) ";



} }else{

echo "No permission, Please log in !! + Don't play with me :)";

 }

?>









