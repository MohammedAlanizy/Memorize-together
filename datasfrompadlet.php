<?php 
session_start();

if (isset($_GET['linkis']) ) {

  include_once 'db_conn.php';
  function validate($data){
    $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
  $padletname = validate($_GET['linkis']);
 // start from here mooodeyyyyy !!!!!
// try to find id of the padlet
// get list of padlet names 
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n" .
              "User-agent: BROWSER-DESCRIPTION-HERE\r\n"
  )
);
$wall_id  = "";
$context = stream_context_create($opts);
$url = "https://api.padlet.com/api/5/links?url=" .$padletname;
$file = file_get_contents($url, false, $context);
$jsonx = json_decode($file,true);
$padletnumber =  str_replace("-","",filter_var($jsonx['data']['id'], FILTER_SANITIZE_NUMBER_INT));
$context2 = stream_context_create($opts);
$url = "https://padlet.com/api/5/wall_sections?wall_id=" .$padletnumber;
$file2 = file_get_contents($url, false, $context2);
$jsonxx = json_decode($file2,true);
printf($file2);
foreach($jsonxx['data'] as $jjss){
  $wall_id = $jjss['attributes']['id'] ;
}
//echo $wall_id;
//echo '<script>alert("ss")</script>';
  } else {
    echo "Error adding student contact with Mohammed please :) ";
 }
?>




