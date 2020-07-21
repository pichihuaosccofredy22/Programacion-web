<html>
<body>
<?php 
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db);
    if ($conexion->connect_error) die ("Fatal error");

    if(isset($_POST['correo']) && isset($_POST['contraseña']))
    {
        $correo= mysql_fix_string($conexion, $_POST['correo']);
        $contraseña = $_POST['contraseña'];

        $query = "SELECT * FROM usuario WHERE  correo='$correo' AND contraseña='$contraseña'";

        $result = $conexion->query($query);
        if ($result->num_rows >= 1)
            echo  "<center><h1><font color=#0AA90A>BIENVENIDOS A NOTAS UNAJMA EPIS </font></h1></center>
             <a href='diario.php'><center><h2><font color=#32B4FF>ENTRA Y ADMINISTRA TUS NOTAS POR AQUÍ</font></h2></center></a><br>";
        
        else
        echo"<center>
                       
                 <br><h1><font color=#FF3232>:( TU CONTRASEÑA O USUARIO INGRESADO ES INCORRECTO‼ </font></h1>
                     <a href='registrar.php'><center><h2><font color=#32B4FF>REGISTRATE AQUÍ!!</font></h2></center></a>
                  </center><br>"; 
        echo "<center>
                    <br><a href='iniciarCesion.php'><center><h2><font color=#32B4FF>SALIR</font></h2></center></a>
                 </center>";
    }
    else
    {
$cadena = "INICIAR SISION"; 
$color = "#0AA90A"; 
echo "<center><h1><font color='".$color."'>".$cadena."</font></h1></center>";
     echo '<center><div><style>
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
    border-radius: 20% 5%; 
     }</style>
                         <img src="img/login.png" widh=200 height=200 />
                      
             <form action="iniciarCesion.php" method="post"><pre>
             <FONT COLOR="FFFFFF"><h2>GMAIL </h2></FONT>  <input class="cajita" type="text" name="correo">
             <FONT COLOR="FFFFFF"><h2>CONTRASEÑA </h2></FONT><input class="cajita" type="password" name="contraseña"><br>
             <input type=image src="img/ingreso.png" width="200" height="50">   
              </form>
              <form action="index.php" method="post">  
             <input type=image src="img/salir.png" width="200" height="50"> </form>
          
           </div></center> ';
         
       
    }/* 
    
    
    <form action="iniciarCesion.php" method="post">  
    <input type=image src="img/ingreso.png" width="200" height="50"> </form>*/
    function mysql_fix_string($coneccion, $string)
    {
        if (get_magic_quotes_gpc())
            $string = stripcslashes($string);
        return $coneccion->real_escape_string($string);
    }
    
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
background-color: #fff;

}.cajita {
  margin: 0;padding:0 20px;background-color: #83FFF2;opacity:45;text-align: center;font-size:12px;border-radius:10px;width:300px;height:25px;}
</style> 