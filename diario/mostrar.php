<html>
<body>
  <?php     echo'<form form action="cerrarsession.php" method="post"><pre> 
<input type="hidden" name="reg" value="yes">
<input class="btn1" type="submit" value="CERRAR SESION">

</form>';?>
<center><div><style>
    div { 
      width: 50%;
      height: auto;
      background-color: #FFAE00; 
    }
  </style> 
<h1 style="color: #FFFFFF;">BUSCA TUS NOTAS POR AQUÍ</h1>
<form id="buscador" name="buscador" method="post" action="<?php echo
$_SERVER['PHP_SELF'] ?>">
<input class="cajita" id="buscar" name="buscar" type="search" placeholder="Ingresa una letra de tu nota para buscar"
autofocus >
 <input class="botones" type="submit" name="buscador" value="buscar">
</form>
<form action="diario.php" method="post">  
<input class="botones" type="submit" value="REGISTRAR OTRA NOTA"></form>
<br></div></center>;
<style>
  .cajita{padding:0 10px;background-color: rgb(255, 255, 255,.5);opacity:45;text-align: center;font-size:12px;border-radius:10px;width:300px;height:25px;}
  .botones { 
    border:none;outline:none;width:150px;height:25px;background:#00FFA0 ;color:#000;font-size:10px;border-radius:10px;
  }.btn1{  border:none;outline:none;width:200px;height:25px;background:#FF4900 ;color:#000;font-size:20px;border-radius:10px;
    float:right;}
  </style> 
<?php 
    require_once 'login.php';
    require_once 'buscar.php';
   
    $conexion = new mysqli($hn, $un, $pw, $db);

    if ($conexion->connect_error) die ("Fatal error1");
    $color1 = "#00FF9E";
    $color2 = "#FF8300"; 

  echo"<center><div><style>
  div { 
    width: 50%;
    height: auto;
    background-image: url(img/epis1.jpg);
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  background-color: #fff;
    border: none;
    border-radius: 15% 5%; 
  }
  </style> 
  <h1><font color=#FFEC00>AQUI SE MUESTRAN TUS NOTAS QUE BUSCASTE</font></h1>
  <h2><font color='".$color1."'>".$registros."</font></h2>
  <li><h2><font color='".$color2."'>".$texto."</font></h2></li>
  </div></center>";
    $query = "SELECT * FROM diario" ;
    $result = $conexion->query($query);
    
    if (!$result) die("Error fatal2");
    
    $filas = $result->num_rows;
    echo "<center><ul><h1><font color=#0023FF>ESTOS SON TUS NOTAS REGISTRADAS</font></h1></ul></center>";
    for ($j = 0; $j < $filas; ++$j)
    
    {
        
        $fila = $result->fetch_array(MYSQLI_ASSOC);
        $cadena1 = "TU NOTA FUE AGREGADA EL DIA: "; 
        $color1 = "#A70000";
    
     
        echo "<center><ul><h2><font color='".$color1."'>".$cadena1 . htmlspecialchars($fila['fecha']).'</font></h2></ul></center>';
        echo '<center><h3>titulo: </h3> ' . htmlspecialchars($fila['titulo']) . '</center>'; 
        echo '<center><h3>fecha:</h3> ' . htmlspecialchars($fila['fecha']) .'</center>';
        echo '<center><h3>discripcion:</h3> ' . htmlspecialchars($fila['discripcion']) .'</center>';
        echo'<center><form form action="modificar.php" method="post"><pre> 
        <input type="hidden" name="reg" value="yes">
        <input class="BUTEDITAR" type="submit" value="EDITAR MI NOTA"></center>
       
     </form>';
        
        
  //aqui pls
//esto me muetra los datos en una tablita
 /* echo"<center><form action='funcion.php' method='get'>";
  echo"<center><input type='text' name'titulo' value='".htmlspecialchars($fila['titulo'])."'></center><br>";
  echo"<center><input type='text' name'fecha' value='".htmlspecialchars($fila['fecha'])."'></center><br>";
  echo"<center><input type='text' name'discripcion' value='".htmlspecialchars($fila['discripcion'])."'></center><br>";   
echo"<center><input type='submit' name='enviando' value='EDITAR MI NOTA'></center>";
echo"</form>";*/
/*reuperar si no fonciona

*/


      
    }
    $result->close();
    $conexion->close();
?>
</body>

</html>
<style> 
body {
background-image: url(img/fondo1.jpg);
background-position: center center;
background-repeat: no-repeat;
background-attachment: fixed;
background-size: cover;
background-color: #fff;}
  .BUTEDITAR { 
    border:none;outline:none;width:125px;height:35px;background:#FF4900 ;color:#000;font-size:12px; border-radius:40px;
}</style> 