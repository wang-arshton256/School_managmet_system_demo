<?php
include 'action.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/fontawesome.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Home</title>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Exodus App</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="records.php">Records</a>
      </li>
    </ul>

  </div>
  <form class="form-inline" action="action.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-primary" type="submit">Search</button>
  </form>
</nav>
<div class="container-fluid">
<div class="row justify-content-center">
<div class=" col-md-10">
	<h3 class="text-center text-dark mt-3">Advanced CRUD APP using PHP & Mysqli Prepared Stament (object Oriented)</h3>
<hr>
<?php if (isset($_SESSION['response'])) {?>
<div class="alert alert-<?=$_SESSION['res_type'];?>alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times</button>
<b><?=$_SESSION['response'];?></b>
</div>
<?php }
unset($_SESSION['response']);?>
</div>
</div>




<div class="row">
<div class="col-md-6 offset-md-3">
<h3 class="text-center text-info mt-3">Add Record</h3>
<form action="action.php" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?=$id;?>">
<div class=" form-group">
<input type="text" name="name" value="<?=$name;?>" class="form-control" placeholder="Enter name "required>
</div>
<div class=" form-group">
<input type="text" name="email" value="<?=$email;?>" class="form-control" placeholder="Enter e-mail "required>
</div>
<div class=" form-group">
<input type="text" name="class" value="<?=$class;?>" class="form-control" placeholder="Enter Class "required>
</div>
<div class=" form-group">
<input type="tel" name="phone" value="<?=$phone;?>" class="form-control" placeholder="Enter Phone "required>
</div>
<div class=" form-group">
  <div class=" form-group">
<input type="number" name="regfees" value="<?=$regfees;?>" class="form-control" placeholder="Enter Registration Fee "required>
</div>
<div class=" form-group">
  <div class=" form-group">
<input type="number" name="feesdis" value="<?=$feesdis;?>" class="form-control" placeholder="Enter Tuition Fee discount "required>
</div>
<div class=" form-group">
  <div class=" form-group">
<input type="number" name="fees" value="<?=$fees;?>" class="form-control" placeholder="Enter Tuition Fee "required>
</div>
<input type="number" name="amount_paid" value="<?=$amount_paid;?>" class="form-control" placeholder="Enter Amount Paid "required>
</div>
	<input type="hidden" name="oldimage" value="<?=$photo;?>">
<input type="file" name="image"  class="fcustom-file" >

<img src="<?=$photo;?>" width="120" class="img-thumnail">

</div>
<div class="form-group">
	<?php if ($update == true) {?>
	<input type="submit" name="update" class="btn btn-success" value="Update Record">
<?php } else {?>
	<input type="submit" name="add" class="btn btn-primary" value="Add Record">
<?php }?>
</div>
</form>
</div>
</div>
</div>
</body>

<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</html>