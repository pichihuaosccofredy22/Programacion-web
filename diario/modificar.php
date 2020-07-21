<html>
<body>
    
 <?php
require_once 'login.php';
$conexion = new mysqli($hn, $un, $pw, $db);

if ($conexion->connect_error) die ("Fatal error1");

$cadena = "MODIFICAR TU NOTA"; 
$color = "#0AA90A"; 
echo'<center><form form action="mostrar.php" method="post"><pre> 
<input type="hidden" name="reg" value="yes">
<input class="btn1" type="submit" value="volver"></center>

</form>';

echo "<center><h1><font color='".$color."'>".$cadena."</font></h1></center>";


     //AQUI
     //COPIA
     $query = "SELECT * FROM diario";
    $result = $conexion->query($query);
    
    if (!$result) die("Error fatal2");
   echo'';
    
    $filas = $result->num_rows;
    //header("location: mostrar.php");
    
    for ($j = 0; $j < $filas; ++$j){//echo"<table><tr><td>";
        $fila = $result->fetch_array(MYSQLI_ASSOC);
       //<FONT COLOR="#FFFB00"><h2>FECHA</h2> </FONT> <input class="cajita" type="date"  name="fecha" step="1" min="2020-01-01" max="2020-12-31" value="2020-01-01">
  echo"<center><form action='mostrar.php' method='get'>";
  echo"<center><input class='cajita' type='text' name'titulo' value='".htmlspecialchars($fila['titulo'])."'></center><br>";
  echo"<center><input class='cajita'  type='date' name='fecha' step='1' min='2020-01-01' max='2020-12-31' value='".htmlspecialchars($fila['fecha'])."'></center><br>";
  echo"<center><input class='cajitagrande' name'discripcion' value='".htmlspecialchars($fila['discripcion'])."'></center><br>";   
echo"<center><input class='btn' type='submit' name='enviando' value='GUARDAR CAMBIOS'></center><br>";
"</form>";

      
    }

  
    if(isset($_POST['titulo']) && isset($_POST['fecha'])&&isset($_POST['discripcion']))
    {
        
        $titulo = $_POST['titulo'];
        $fecha = $_POST['fecha'];
        $discripcion = $_POST['discripcion'];
    ///$query="UPDATE diario SET titulo='$titulo'where titulo='$nuevo' 
        $query="UPDATE diario SET titulo='$titulo', fecha='$fecha', discripcion='$discripcion'
        where titulo='$titulo' ";
        $result = $conexion->query($query);
        if (!$result) {
            echo"error en ma consulta";
    
        }else{
            echo "registro actualizado con exito";
            echo "<table><tr><td>$titulo</td></tr>";
            echo "<table><tr><td>$fecha</td></tr>";
            echo "<table><tr><td>$discripcion</td></tr></table>";
            
        }
    }

?>


</html>
<style> 
body {
background-image: url(img/fondo1.jpg);
background-position: center center;
background-repeat: no-repeat;
background-attachment: fixed;
background-size: cover;
background-color: #fff;}
.cajita {
  margin: 0;padding:0 20px;background-color: #FDEBA2;opacity:45;text-align: center;font-size:12px;border-radius:10px;width:400px;height:25px;}
.cajitagrande{
  margin: 0;padding:0 20px;background-color: #FDEBA2;opacity:45;text-align: center;font-size:12px;border-radius:10px;width:400;height:100px;
}

.btn{  border:none;outline:none;width:150px;height:25px;background:#00A4FF ;color:#000;font-size:13px;border-radius:10px;}
.btn1{  border:none;outline:none;width:150px;height:25px;background:#FF4900 ;color:#000;font-size:20px;border-radius:10px;
    float:right;}

</style> 
