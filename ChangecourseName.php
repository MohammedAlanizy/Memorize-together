<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_POST['name'])) {

  include_once 'db_conn.php';
  function validate($data){
    $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
  $idis = validate($_POST['name']);
  $sql = "UPDATE sett  SET textis = '$idis'";
  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: home.php");
    exit();
  } else {
    echo "Error updating course name contact with Mohammed please :) ";

}}else{
echo "No permission, Please log in !! + Don't play with me :)";
}
 ?>