<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_GET['id'])) {
  include_once 'db_conn.php';
  function validate($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }

$idis = validate($_GET['id']);
$total_pages =  $conn->query("SELECT * FROM studentsdata where idtest='$idis'")->num_rows;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
// Number of results to show on each page.
$num_results_on_page = 20;
if ($stmt =  $conn->prepare("SELECT * FROM studentsdata where idtest='$idis' LIMIT ?,?")) {
	// Calculate the page to get the results we need from our table.
	$calc_page = ($page - 1) * $num_results_on_page;
	$stmt->bind_param('ii', $calc_page, $num_results_on_page);
	$stmt->execute(); 
	// Get the results...
	$resultxx = $stmt->get_result();
	?>
?>
<!DOCTYPE html>
<html lang="en">
<style>
			table {
				border-collapse: collapse;
				width: 500px;
			}
			td, th {
				padding: 10px;
			}
			th {
				background-color: #54585d;
				color: #ffffff;
				font-weight: bold;
				font-size: 13px;
				border: 1px solid #54585d;
			}
			td {
				color: #636363;
				border: 1px solid #dddfe1;
			}
			tr {
				background-color: #f9fafb;
			}
			tr:nth-child(odd) {
				background-color: #ffffff;
			}
			.pagination {
				list-style-type: none;
				padding: 10px 0;
				display: inline-flex;
				justify-content: space-between;
				box-sizing: border-box;
			}
			.pagination li {
				box-sizing: border-box;
				padding-right: 10px;
			}
			.pagination li a {
				box-sizing: border-box;
				background-color: #e2e6e6;
				padding: 8px;
				text-decoration: none;
				font-size: 12px;
				font-weight: bold;
				color: #616872;
				border-radius: 4px;
			}
			.pagination li a:hover {
				background-color: #d4dada;
			}
			.pagination .next a, .pagination .prev a {
				text-transform: uppercase;
				font-size: 12px;
			}
			.pagination .currentpage a {
				background-color: #518acb;
				color: #fff;
			}
			.pagination .currentpage a:hover {
				background-color: #518acb;
			}
			</style>
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
      <a href="#"><em>Crossword</em>- MSU</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li><a href="index.php">Home</a></li>
      </ul>
    </nav>
  </header>
  <section class="section coming-soon" data-section="section3">
            <div class="col-md-12">
          <div class="section-heading">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-xs-12">
          <div class="continer centerIt">
            <div>
            <h4>Students :<em></em></h4>
            <div class="continer centerIt">
              <div class="counter">
                <div class="dayss">
                <table>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Correct answers</th>
          <th>Wrong answers</th>
					<th>Date</th>
				</tr>
				<?php while ($row = $resultxx->fetch_assoc()): ?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['Name']; ?></td>
					<td><?php echo $row['Good']; ?></td>
          <td><?php echo $row['Wrong']; ?></td>
					<td><?php echo $row['date']; ?></td>
				</tr>
				<?php endwhile; ?>
			</table>
			<?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
			<ul class="pagination">
				<?php if ($page > 1): ?>
				<li class="prev"><a href="results.php?page=<?php echo $page-1 ?>&id= <?php echo $idis;?>">Prev</a></li>
				<?php endif; ?>

				<?php if ($page > 3): ?>
				<li class="start"><a href="results.php?page=1&id= <?php echo $idis;?>">1</a></li>
				<li class="dots">...</li>
				<?php endif; ?>

				<?php if ($page-2 > 0): ?><li class="page"><a href="results.php?page=<?php echo $page-2 ?>&id= <?php echo $idis;?>"><?php echo $page-2 ?></a></li><?php endif; ?>
				<?php if ($page-1 > 0): ?><li class="page"><a href="results.php?page=<?php echo $page-1 ?>&id= <?php echo $idis;?>"><?php echo $page-1 ?></a></li><?php endif; ?>

				<li class="currentpage"><a href="results.php?page=<?php echo $page ?>&id= <?php echo $idis;?>"><?php echo $page ?></a></li>

				<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="results.php?page=<?php echo $page+1 ?>&id= <?php echo $idis;?>"><?php echo $page+1 ?></a></li><?php endif; ?>
				<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="results.php?page=<?php echo $page+2 ?>&id= <?php echo $idis;?>"><?php echo $page+2 ?></a></li><?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
				<li class="dots">...</li>
				<li class="end"><a href="results.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>&id= <?php echo $idis;?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
				<?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
				<li class="next"><a href="results.php?page=<?php echo $page+1 ?>&id= <?php echo $idis;?>">Next</a></li>
				<?php endif; ?>
			</ul>
      <?php endif; ?>

                </div>

              </div>
            </div>
          </div>
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
    <?php 
    ?>
  
</body>
</html>
<?php
	$stmt->close();
}}
?>