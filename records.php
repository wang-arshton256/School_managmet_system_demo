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
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
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
<div class="col-md-10 offset-md-1">
<?php
$query = "SELECT *FROM data";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
?>

<h3 class="text-center text-info mt-3">Records Present In The Database</h3>

  <table class="table  table-bordered table-striped">
    <thead>
      <tr>
        <th># </th>
        <th>Image</th>
        <th>name</th>
        <th>Email</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Reg Fee</th>
        <th>Fees Disc</th>
        <th>Tuition Fee</th>
        <th>Discount</th>
        <th>Amount Paid</th>
        <th>Fees balance</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()) {?>
      <tr>
        <td><?=$row['id'];?></td>
        <td><img src="<?=$row['photo'];?>" width="35 border"></td>
        <td><?=$row['name'];?></td>
        <td><?=$row['email'];?></td>
        <td><?=$row['class'];?></td>
        <td><?=$row['phone'];?></td>
        <td><?=$row['regfees'];?></td>
        <td><?=$row['feesdis'];?></td>
        <td><?=$row['fees'];?></td>
        <td><?=$row['discount'];?></td>
        <td><?=$row['amount_paid'];?></td>
        <td><?=$row['balance'];?></td>
    <td><a href="details.php?details=<?=$row['id'];?>" class="btn btn-primary pt-2">Details</a> |
      <a href="action.php?delete=<?=$row['id'];?>" class="btn btn-danger pt-2" onclick="return confirm('Do you want to delete this record?');">Delete</a> |
      <a href="index.php?edit=<?=$row['id'];?>" class=" btn btn-success pt-2">Edit</a></td>

      </tr>
  <?php }?>
    </tbody>
  </table>
</div>
</div>
</div>
</body>

<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</html>