<?php
$page=isset($_GET['page']) ? ($_GET['page']) : "";
if ($page=='action') {
$koneksi = mysqli_connect('localhost','root','','db_crud');
$id				= $_POST['id'];
$name     = $_POST['name'];
$gender   = $_POST['gender'];
$phone    = $_POST['phone'];
$address  = $_POST['address'];
$query = mysqli_query($koneksi,"UPDATE customer SET name='$name',gender='$gender',phone='$phone',address='$address' WHERE id_cust='$id'");
if($query) {
  echo "<script> alert('Data Berhasil DiPerbaharui')
      window.location.href='index.php'
  </script>";
}
else {
    echo "<script> alert('Data Gagal DiPerbaharui')
      window.location.href='index.php'
    </script>";
}
}
$koneksi = mysqli_connect('localhost','root','','db_crud');
$id = $_GET['id'];
$query=mysqli_query($koneksi,"SELECT * FROM customer WHERE id_cust='$id'");
$data = mysqli_fetch_array($query);
 ?>
<div class="panel panel-default">
<div class="panel-heading">
Edit Data
</div>
<div class="panel-body">
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#home">Edit</a></li>
</ul>

<div class="tab-content">
      <div id="home" class="tab-pane fade in active">
				<form  action="edit.php?page=action" method="post" enctype="multipart/form-data">
        <table class="table" border="0">
					<input type="hidden" name="id" value="<?php echo $data['id_cust'] ?>">
            <tr>
              <td>Name</td><td><input class="form-control" type="text" name="name" value="<?php echo $data['name'] ?>"> </td>
            </tr>
            <tr>
              <td>Gender</td>
              <td>
                <select class="form-control" name="gender">
                  <option value="<?php echo $data['gender'] ?>" selected>Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>Phone Number</td><td><input class="form-control" type="text" name="phone" value="<?php echo $data['phone'] ?>"> </td>
            </tr>
            <tr>
              <td>Address</td><td><input class="form-control" type="text" name="address" value="<?php echo $data['address'] ?>"> </td>
            </tr>
        </table>
        <button class="btn btn-success" type="submit" name="button">Submit</button>
        <button class="btn btn-danger" type="reset" name="reset">Reset</button>
        </form>
      </div>
		</div>
					</div>
