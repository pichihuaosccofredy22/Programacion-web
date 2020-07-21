<html>
<body>
<?php 
echo'<form form action="cerrarsession.php" method="post"><pre> 
<input type="hidden" name="reg" value="yes">
<input class="btn1" type="submit" value="CERRAR SESION">
</form>';
require_once 'login.php';
require_once 'buscar.php';
$conexion = new mysqli($hn, $un, $pw, $db);
if ($conexion->connect_error) die ("Fatal error");

if(isset($_POST['titulo']) && isset($_POST['fecha'])&&isset($_POST['discripcion']))
{
    
    $titulo = $_POST['titulo'];
    $fecha = $_POST['fecha'];
    $discripcion = $_POST['discripcion'];

    /*LA CONSULTA DE MYSQL DONDE INSERTAMOS VALORES A LA TABLA DIARIO */
    $query = "INSERT INTO diario VALUES('$titulo','$fecha','$discripcion')";
    $result = $conexion->query($query);
    if (!$result) die ("Falló registro");
    
/*LA CONSULTA DE MYSQL DONDE MOSTRAMOS VALORES DE TABLA DIARIO */
    $query = "SELECT * FROM diario";
$result = $conexion->query($query);
if (!$result) die("Error fatal");
$filas = $result->num_rows;
header("location: mostrar.php");
for ($j = 0; $j < $filas; ++$j)
{
    $fila = $result->fetch_array(MYSQLI_ASSOC);
    
    echo 'titulo: ' . htmlspecialchars($fila['titulo']) . '<br>';
    echo 'fecha: ' . htmlspecialchars($fila['fecha']) . '<br>';
    echo 'discripcion: ' . htmlspecialchars($fila['discripcion']) . '<br>';
  
} 
   /* echo "Registro exitoso <a href='miDiario.php'>Ingresar</a>";*/
}else{/*<form action="direccion" method="post">*/
    $cadena = "ANOTA TUS NOTAS"; 
    $color = "#0AA90A"; 
    echo "<center><h1><font color='".$color."'>".$cadena."</font></h1></center>";
    echo' <center><div>  <style>
    div { 
      width: 50%;
      height: auto;
      background-color: 0000; 
    }
  </style> 
           <form form action="diario.php" method="post"><pre> 
           <FONT COLOR="#FFFB00"><h2>TITULO</h2> </FONT>  <input class="cajita" type="text"  name="titulo">
           <FONT COLOR="#FFFB00"><h2>FECHA</h2> </FONT> <input class="cajita" type="date"  name="fecha" step="1" min="2020-01-01" max="2020-12-31" value="2020-01-01">
           <FONT COLOR="#FFFB00"><h2>DISCRIPCION </h2></FONT> <textarea class="cajitagrande" name="discripcion"cols="32" rows="4" wrap="off" placeholder="agrega tu discipcion!!"></textarea>
           
              <input type="hidden" name="reg" value="yes">
              <input class="epis" type="submit" value="AGREGAR A MIS NOTAS">
             
           </form>
           <form form action="mostrar.php" method="post"><pre> 
           <input class="epis1" type="submit" value="VER MIS NOTAS">
           
          
        </form>
         </center></div>';
} 
?> 
<style> 
/*ESTOS ES MI DISEÑO DE MIS FURMULARIOS Y BUTTONES DE DIARIO.PHP */
.cajita {
  margin: 0;
padding:0 20px;background-color: #FDEBA2;opacity:45;text-align: center;font-size:12px;border-radius:10px;width:200px;height:25px;}
.cajitagrande{
  margin: 0;padding:0 20px;background-color: #FDEBA2;opacity:45;text-align: center;font-size:12px;border-radius:10px;width:300;height:100px;
}
.epis{
  border:none;outline:none;width:150px;height:25px;background:#00FFA0 ;color:#000;font-size:10px;border-radius:10px;
}.epis1{  border:none;outline:none;width:150px;height:25px;background:#00A4FF ;color:#000;font-size:10px;border-radius:10px;}
/*AQUI TERMINA MI DISEÑO DE MIS FURMULARIOS Y BUTTONES DE DIARIO.PHP */
</style> 
<center><div><style>/*ESTO ES EL INTERFAZ DE LA FUNCION BUSCAR DE DIARIO.PHP */
    div { 
      width: 50%;
      height: auto;
      background-color: 0000; 
    }
  </style> 
<h1 style="color: #9BFF00">BUSCA TUS NOTAS POR AQUÍ</h1>
<form id="buscador" name="buscador" method="post" action="<?php echo
$_SERVER['PHP_SELF'] ?>">
<input class="cajita" id="buscar" name="buscar" type="search" placeholder="Ingresa una letra del titulo.."
autofocus >
 <input class="epis1" type="submit" name="buscador" value="buscar">
</form><br></div></center>;
<?php
  $color1 = "#FFFFF";
  $color2 = "#FFFF00"; 
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
  border-radius: 35% 5%; 
}
</style> 
<h1><font color=#9BFF00>AQUI SE MUESTRAN TUS NOTAS QUE BUSCASTE</font></h1>
<h2><font color='".$color1."'>".$registros."</font></h2>
<h2><font color='".$color2."'>".$texto."</font></h2>
</div></center>";
?>
</body>
</html>
<style> 
/*ESTO ES MI DISEÑO DE TODO DIARIO.PHP */
body {
background-image: url(img/fondo1.jpg);
background-position: center center;
background-repeat: no-repeat;
background-attachment: fixed;
background-size: cover;
background-color: #fff;
}.btn1{  border:none;outline:none;width:200px;height:25px;background:#FF4900 ;color:#000;font-size:20px;border-radius:10px;
    float:right;}
</style> 