<?php

  $user=htmlentities(addslashes($_POST['user']));
  $pass=htmlentities(addslashes($_POST['pass']));
  $admin=0;
  $crud=0;

  try
  {
    $conexion = new PDO('mysql:host=localhost; dbname=login','root','');
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = $conexion -> prepare(" SELECT * FROM usuarios WHERE nombre=:nom ");
    $query -> execute(array(':nom'=>$user));
    
    while($result = $query -> fetch(PDO::FETCH_ASSOC))
    {
      if(password_verify($pass, $result['Contraseña']) AND $result['Perfil'] == 'admin')
      {
        $admin++;
      }
      else
      {
        $crud++;
      }
    }

    if($admin>0)
    {
      session_start();
      $_SESSION['user'] = $_POST['user'];
      header('location:crudadmin.php');
    }

    else if ($crud>0)
    {
      session_start();
      $_SESSION['user'] = $_POST['user'];
      header("Location:crud.php");
    }

    else
    {
      header('location:index.html');
    }

  }

  catch (Exception $e)
  {
    die('Error: ' .$e->getMessage());
  }

?>