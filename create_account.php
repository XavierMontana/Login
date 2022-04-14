<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Usuario</title>
</head>
<body>
<?php

  $user     = htmlentities(addslashes($_POST['user']));
  $sname    = htmlentities(addslashes($_POST['sname']));
  $state    = htmlentities(addslashes($_POST['state']));
  $city     = htmlentities(addslashes($_POST['city']));
  $country  = htmlentities(addslashes($_POST['country']));
  $street   = htmlentities(addslashes($_POST['street']));
  $cel      = htmlentities(addslashes($_POST['cel']));
  $email    = htmlentities(addslashes($_POST['email']));
  $pass     = htmlentities(addslashes($_POST['pass']));
  $PE       = password_hash($pass, PASSWORD_DEFAULT, array('cost'=>12));

  try
  {
    $conexion = new PDO('mysql:host=localhost; dbname=login','root','');
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = $conexion -> prepare(" INSERT INTO usuarios (Nombre, Apellido, Estado, Ciudad, Colonia, Calle, NumCel, Correo, Contraseña) VALUES (:nam, :sna, :sta, :cit, :cou, :str, :cel, :ema, :pas) ");
    $query->execute(array(':nam'=> $user, ':sna'=>$sname, ':sta'=>$state, ':cit'=>$city, ':cou'=>$country, ':str'=>$country, ':cel'=>$cel, ':ema'=>$email, ':pas'=>$PE));

    //echo "Registro realizado exitosamente";
    echo "<script>alert ('Usuario registrado exitosamente');window.location.href='index.html';</script>";
  }

  catch (Exception $e)
  {
    die('El error es:'.$e->getMessage());
  }

?>

<p><a href="index.html">Inicio</a></p>
</body>
</html>