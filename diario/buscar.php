<?php
require_once 'login.php';
$conexion = new mysqli($hn, $un, $pw, $db);
if ($conexion->connect_error) die ("Fatal error1");
// Conexión

function desconectar(){
global $conexion;
mysqli_close($conexion);
}
//Variable para el resultado de la búsqueda
$texto = '';
//Variable para el número de registros encontrados
$registros = '';
if($_POST){
 $busqueda = trim($_POST['buscar']);
 $entero = 0;
 if (empty($busqueda)){
 
 }else{
 // Si hay información para buscar, se abre la conexión


 //Consulta la base de datos, se utiliza un comparador LIKE
$query = "SELECT * FROM diario WHERE titulo LIKE '%".$busqueda. "%' ORDER BY titulo";
$result = $conexion->query($query); // Consulta
 //Si hay resultados
 if (mysqli_num_rows($result) > 0){
 // Registra el número de resultados
$registros = '<p>SE HAN ENCONTRADO TUS NOTAS TIENES: ' . mysqli_num_rows($result) . '
NOTA CON ESTE NOMBRE  </p>';
 // Se almacenan las cadenas de resultado
 while($fila = mysqli_fetch_assoc($result)){
 $texto .= $fila['titulo'] . ' <br >';
 $texto .= $fila['fecha'] . '<br >';
 $texto .= $fila['discripcion'] . ' <br >';
 }
 }else{
 $texto = "NO TIENES NINGUNA NOTA CON ESTE NOMBRE";
 }
 // No deja conexiones abiertas)
 mysqli_close($conexion);
 }
}
?>

