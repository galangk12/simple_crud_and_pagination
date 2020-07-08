<?php
//Session//
session_start();
if(!isset($_SESSION['username'])) {
	echo "<script>
			window.location.href=('login.php');
			</script>";
}
//Page//
$sid=session_id();
$page=isset($_GET['page']) ? ($_GET['page']) : "";
if ($page=='logout') {
  logout();
}
elseif ($page=='input') {
$koneksi = mysqli_connect('localhost','root','','db_crud');
$name     = $_POST['name'];
$gender   = $_POST['gender'];
$phone    = $_POST['phone'];
$address  = $_POST['address'];
$query = mysqli_query($koneksi,"INSERT INTO customer (name,gender,phone,address) values ('$name','$gender','$phone','$address')");
if($query) {
  echo "<script> alert('Data Berhasil Diunggah')
      window.location.href='index.php'
  </script>";
}
else {
    echo "<script> alert('Data Gagal Diunggah')
      window.location.href='index.php'
    </script>";
}
}
elseif($page=='delete') {
  $koneksi = mysqli_connect('localhost','root','','db_crud');
  $id = $_GET['id'];
  $query = mysqli_query($koneksi,"DELETE FROM customer WHERE id_cust='$id'");
  if($query) {
    echo "<script> alert('Data Berhasil DiHapus')
        window.location.href='index.php'
    </script>";
  }
  else {
      echo "<script> alert('Data Gagal DiHapus')
        window.location.href='index.php'
      </script>";
  }
}
 ?>
 <?php
function logout () {
unset ($_SESSION['username']);
session_destroy();
echo "<script>window.location.href=('login.php');</script>
 "; }
  ?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<title>CRUD</title>
<!--- Include the above in your HEAD tag ---------->

<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
			MENU
			</button>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				Administrator
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
  	<div class="container-fluid main-container">
  		<div class="col-md-2 sidebar">
  			<div class="row">
	<!-- uncomment code for absolute positioning tweek see top comment in css -->
	<div class="absolute-wrapper"> </div>
	<!-- Menu -->
	<div class="side-menu">
		<nav class="navbar navbar-default" role="navigation">
			<!-- Main Menu -->
			<div class="side-menu-container">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
					<li><a href="index.php?page=logout"><span class="glyphicon glyphicon-log-out"></span>Logout &nbsp;</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>

	</div>
</div>  		</div>
  		<div class="col-md-10 content">
        <?php
              if($page=='edit') {
                include 'edit.php';
              }
              else {
                include 'data.php';
              }
             ?>
      </div>
  		<footer class="pull-left footer">
  			<p class="col-md-12">
  				<hr class="divider">
  				Copyright &COPY; 2020 <a href="#">Unknown</a>
  			</p>
  		</footer>
  	</div>
<script>
$(function () {
  $('.navbar-toggle-sidebar').click(function () {
    $('.navbar-nav').toggleClass('slide-in');
    $('.side-body').toggleClass('body-slide-in');
    $('#search').removeClass('in').addClass('collapse').slideUp(200);
  });

  $('#search-trigger').click(function () {
    $('.navbar-nav').removeClass('slide-in');
    $('.side-body').removeClass('body-slide-in');
    $('.search-input').focus();
  });
});
</script>
