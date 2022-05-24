<?php
  session_start();
  if (isset($_SESSION)) {
    session_destroy();
  }
 

  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $us=$_POST['nombre'];
    $ps=$_POST['pass'];

    require_once("conectar_utd.php");

    $consulta="select username, password, privilegio from usuarios where username='$us' and password='$ps'";
    //ejecutar la consulta
    $query=mysqli_query($conexion,$consulta) or die("Error al ejecutar la consulta");
    
    if($columna=mysqli_fetch_array($query)) 
     {
       $priv=$columna['privilegio'];
     }

    if (mysqli_num_rows($query)>0)
    {
        session_start();
        $_SESSION['user']=$us;
        $_SESSION['pass']=$ps;
       
        

        if ($priv=="admin")
          $_SESSION['priv']="admin";
        else if($priv=="estandar")
          $_SESSION['priv']="estandar";
       
          echo "<script> alert('Inicio de Sesion, - B I E N V E N I D O -');
                         location.href='menu.php'; 
               </script> ";
        
          //header('Location: menu.php');

    }
    else
     {
       echo "<script>
              window.alert('Usuario y/o Contraseña incorrectas, por favor verifique ... ');
              window.location.href='login.php';
            </script> ";   
     }
     
  }
  
?>
<!DOCTYPE html>
<html>
  <head>
   <meta charset="utf-8">	
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="estiloslogin.css">
   <title>LOGIN DE ACCESO</title>

  </head>
  <body>
    <div class="contenedor">
      <div class="titulo"><h3> ACCESO AL SISTEMA </h3></div>
        <img src="usu.png" alt="" width="100em" height="100em">
            <!-- <form action="comprueba.php" method="post"> -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div>
                  <label for="nombre"></label>
                  <input type="text" name="nombre"  required placeholder="Usuario">
                </div>
                <div>
                  <label for="pass"></label>
                  <input type="password" name="pass" required placeholder="*******">
                </div>
                <div class="botones">
                  <input type="submit" name="enviar" value="LOGIN" >
                </div>
            </form>
    </div>
  </body>
</html>