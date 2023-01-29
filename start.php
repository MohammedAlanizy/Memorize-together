<?php 
if (isset($_GET['id'])) {
  $idis = $_GET['id'];
    ?>
      <form id="contact" action="test.php" method="POST">
      <input hidden name="testid" value="<?php echo $idis; ?>"></input>
      <input hidden id="id" name="id" value='<?php echo $idis; ?>'></input>
      </form>
      <script>  document.forms["contact"].submit();</script>
<?php }else{
      	header("Location: index.php");
        exit();
    } ?>