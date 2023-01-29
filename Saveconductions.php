<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && (isset($_POST['Conduction1From']) && isset($_POST['Conduction1To']) && isset($_POST['Conduction2From']) && isset($_POST['Conduction2To']) ))  {

  include_once 'db_conn.php';
  function validate($data){
    $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
  $Conduction1From = validate($_POST['Conduction1From']);
  $Conduction1To = validate($_POST['Conduction1To']);
  $Conduction2From = validate($_POST['Conduction2From']);
  $Conduction2To = validate($_POST['Conduction2To']);
  $sql = "INSERT INTO conductions (Conduction1From,Conduction1To,Conduction2From,Conduction2To) VALUES ('$Conduction1From','$Conduction1To','$Conduction2From','$Conduction2To')";
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