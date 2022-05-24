<?php
  
  

  session_start();
  if (!isset($_SESSION['user'])) 
  {
		header("location:");
	}
  else 
  {
    $us=$_SESSION['user'];
    $ps=$_SESSION['pass'];
    $priv=$_SESSION['priv'];
    
	}
       
?> 
    <!DOCTYPE html>
    <html>  
      <head>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MENÚ</title>
        <link rel="stylesheet" href="estilosutd.css">
      </head>
      <body>
        <div class="cont">
        <h1> <align="center"> MENÚ PRINCIPAL </h1>
        <h3> <align="center"> ¿Que desea realizar?</h3>
        <hr>
        <form action="acciones.php" method="post">
          <table align="center">
            <select name="operacion" required >
             <div class="boton"> 
                <?php 
                 if ($priv=="admin")
                 {
                  echo "<option value='a'>Alta</option>"; 
                  echo "<option value='b'>Baja</option>"; 
                  echo "<option value='c'>Consulta</option>"; 
                  echo "<option value='m'>Modificacion</option>";
                  }
                  else if ($priv=="estandar")
                  { 
                   echo "<option value='c'>Consulta</option>"; 
                  } 
               ?>
              </div>
            </select>
            
            <tr>
              <select name="tabla" required>
               <option value="a">Alumnos</option>
               <option value="c">Contactos</option>
               <option value="u">Usuarios</option>
              </select>
              
            </tr>
        </form>
        <hr>  
        </div>
        <tr>
         <input type="submit" name="enviar" value="Enviar">
         <input type="reset" name="borrar" value="Borrar">
        </tr>
          </table>
            <input type="hidden" name="us" value="<? echo $us; ?>">
            <input type="hidden" name="ps" value="<? echo $ps; ?>">
      </body>
      <a href='login.php'><h3 align=center >Cerrar sesión</h3></a>
   </html> 


   
  
       
