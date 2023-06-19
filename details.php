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
        <a class="nav-link" href="records.php">Records</a>
      </li>
    </ul>
</div>
</nav>
  </div>

  <div class="container">
    <div class="row justify-content-center mt-3">
      <div class="col-md-6 bg-info p-2 rounded">
        <h2 class="bg-light pt-2 rounded text-center text-dark">ID:<?=$vid;?></h2>
        <div class="text-center">
          <img src="<?=$vid;?>" width="300" class="image-thumbnail">
        </div>
        <h4 class="text-light">name:<?=$vname;?></h4>
        <h4 class="text-light">email:<?=$vemail;?></h4>
        <h4 class="text-light">phone:<?=$vphone;?></h4>


      </div>
    </div>
  </div>
</body>
</html>