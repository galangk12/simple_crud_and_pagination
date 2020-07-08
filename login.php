<?php
$page=isset($_GET['page']) ? ($_GET['page']) : "";
if($page=='action') {
  $koneksi = mysqli_connect('localhost','root','','db_crud');
  if ($koneksi) {
    echo "";
  }
  else {
    echo "Can't Connect To Database";
  }
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$query="SELECT * FROM users WHERE username='$user' AND password='$pass'";
	$cek=mysqli_query($koneksi,$query);
	$data=mysqli_fetch_array($cek);
	if ($data['username']==$user && $data['password']==$pass) {
		Session_start();
		$_SESSION['username']=$user;
			header("Location:index.php");
	}
	else {
		Echo "<script>
 alert('Maaf Username/Password Salah Atau Belum Terdaftar') window.location.href=('login.php'); </script>
"; } }
 ?>
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <link rel="stylesheet" href="style.css">
 <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
 <title>Login</title>
 <div class="container">
 <div class="col-md-4 col-centered">
 <div class="login-panel panel panel-default">
                     <div class="panel-heading">
                         <h3 class="panel-title">Sign In</h3>
                     </div>
                     <div class="panel-body">
                         <form role="form" action="login.php?page=action" method="post">
                             <fieldset>
                                 <div class="form-group">
                                     <input class="form-control" placeholder="Username" name="username" type="text" autofocus="">
                                 </div>
                                 <div class="form-group">
                                     <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                 </div>
                                 <!-- Change this to a button or input when using this as a form -->
                                 <button class="btn btn-sm btn-success" type="submit">Login</button>
                             </fieldset>
                         </form>
                     </div>
                 </div>
 </div>
 <hr>

 </div>
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
