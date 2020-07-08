<div class="panel panel-default">
<div class="panel-heading">
Dashboard
</div>
<div class="panel-body">
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#home">Data</a></li>
<li><a data-toggle="tab" href="#menu1">Input Data</a></li>
</ul>

<div class="tab-content">
<div id="home" class="tab-pane fade in active">
  <table class="table table-hover table-nowarp">
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Gender</th>
      <th>Phone</th>
      <th>Address</th>
      <th>Action</th>
    </tr>
    <?php
      $batas   = 5;
      $halaman = @$_GET['halaman'];
      if(empty($halaman)){
      $posisi  = 0;
      $halaman = 1;
      }
      else {
      $posisi  = ($halaman-1) * $batas;
      }
      $koneksi = mysqli_connect('localhost','root','','db_crud');
      $no = $posisi+1;
      $query = mysqli_query($koneksi,"SELECT * FROM customer LIMIT $posisi,$batas");
      while ($data = mysqli_fetch_array($query)) {
     ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $data['name'] ?></td>
      <td><?php echo $data['gender'] ?></td>
      <td><?php echo $data['phone'] ?></td>
      <td><?php echo $data['address'] ?></td>
      <td>
        <a class="btn btn-success" href="index.php?page=edit&id=<?php echo $data['id_cust'] ?>">Edit</a>
        <a class="btn btn-danger" href="index.php?page=delete&id=<?php echo $data['id_cust'] ?>">Delete</a>
      </td>
    </tr>
    <?php
      }
    $query2     = mysqli_query($koneksi, "select * from customer");
    $jmldata    = mysqli_num_rows($query2);
    $jmlhalaman = ceil($jmldata/$batas);
     ?>
  </table>
  <center>
    <ul class="pagination justify-content-center">
    <?php
    for($i=1;$i<=$jmlhalaman;$i++)
    if ($i != $halaman){
     echo "
     <li class='page-item'><a class='page-link' href=\"index.php?halaman=$i\">$i</a></li>";
    }
    else{
     echo "
     <li class='page-item active'><a class='page-link' href=''>$i<span class='sr-only'>(current)</span></a></li>";
    }
     ?>
    </ul>
  </center>
</div>
<div id="menu1" class="tab-pane fade">
  <form  action="index.php?page=input" method="post" enctype="multipart/form-data">
  <table class="table" border="0">
      <tr>
        <td>Name</td><td><input class="form-control" type="text" name="name" placeholder="Insert Name.."> </td>
      </tr>
      <tr>
        <td>Gender</td>
        <td>
          <select class="form-control" name="gender">
            <option value="#" selected disabled>Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Phone Number</td><td><input class="form-control" type="text" name="phone" placeholder="Insert Phone Number.."> </td>
      </tr>
      <tr>
        <td>Address</td><td><input class="form-control" type="text" name="address" placeholder="Insert Address.."> </td>
      </tr>
  </table>
  <button class="btn btn-success" type="submit" name="button">Submit</button>
  <button class="btn btn-danger" type="reset" name="reset">Reset</button>
  </form>
</div>
</div>
</div>
</div>
