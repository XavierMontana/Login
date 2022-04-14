<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="navbar.css">
</head>
<body>

  <?php
    session_start();
    if(!isset($_SESSION['user']))
    {
      header("Location:index.html");
    }
  ?>

<div class="topnav">
    <a class="active" href="#home">Home</a>
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <div class="topnav-right">
      <a href="#search">Search</a>
      <a href="close_session.php">Cerrar sesion</a>
    </div>
  </div>

  <?php
    echo "<h1 class='title'> Bienvenido " . $_SESSION['user'] . "</h1>";
  ?>

</body>
</html>