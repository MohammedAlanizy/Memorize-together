<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_POST['uname'])) {

  include_once 'db_conn.php';
  function validate($data){
    $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
  $idis = validate($_POST['uname']);
  $sql = "INSERT INTO students (name) VALUES ('$idis')";
  if ($conn->query($sql) === TRUE) {
    echo "Student added successfully";
    header("Location: home.php");
    exit();
  } else {
      echo $conn -> error;
    echo "Error adding student contact with Mohammed please :) ";

}}else{
echo "No permission, Please log in !! + Don't play with me :)";
}
 ?>