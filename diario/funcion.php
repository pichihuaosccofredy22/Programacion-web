<?php
require_once 'modificar.php';


require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db);

    if ($conexion->connect_error) die ("Fatal error1");
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

   /* $query = "SELECT * FROM diario";
    $result = $conexion->query($query);
    
    if (!$result) die("Error fatal");

$filas = $result->num_rows;
header("location: mostrar.php");
for ($j = 0; $j < $filas; ++$j)
{
    $filas = $result->fetch_array(MYSQLI_ASSOC);

    echo '<center><h3>titulo: </h3> ' . htmlspecialchars($fila['titulo']) . '</center>'; 
    echo '<center><h3>fecha:</h3> ' . htmlspecialchars($fila['fecha']) .'</center>';
    echo '<center><h3>discripcion:</h3> ' . htmlspecialchars($fila['discripcion']) . '</center>';
}*/
} 
?>