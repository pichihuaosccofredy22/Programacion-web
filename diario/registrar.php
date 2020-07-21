<html>
<body>
<?php 
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db);
    if ($conexion->connect_error) die ("Fatal error");

    if(isset($_POST['correo']) && isset($_POST['contraseña']))
    {
        
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];
        
        $query = "INSERT INTO usuario VALUES('$correo','$contraseña')";
        $result = $conexion->query($query);
        if (!$result) die ("<center><h2><font color=##FF0000>error al registrarte ingresa nuevamente con otro nombre de usuario :(</font></h2>
        <a href='registrar.php'><center><h2><font color=#32B4FF>volver a registrarse</font></h2></center></a></center>");

        echo  "<center><h1><font color=#0AA90A>BIENVENIDOS A NOTAS UNAJMA EPIS </font></h1></center>
        <a href='diario.php'><center><h2><font color=#32B4FF>ENTRA Y ADMINISTRA TUS NOTAS POR AQUÍ</font></h2></center></a><br>";
        
    }else{/*<form action="direccion" method="post">*/
        $cadena = "REGISTRATE"; 
        $color = "#0AA90A"; 
        echo "<center><h1><font color='".$color."'>".$cadena."</font></h1></center>";
        echo' <center><div><style>
        div { 
          width: 50%;
          height: auto;
          background-color: #FFFFFF; 
          border: none;
          border-radius: 5% 5%;  
         
        }</style>
        <img src="img/banner2.png" width=95% height=25%/>
               <form action="registrar.php" method="post"><pre><br> 
               <FONT COLOR="#FF0045"><h2>INGRESA TU GMAIL </h2> <input class="cajita" type="text" name="correo"><br>
               <FONT COLOR="#FF0045"><h2>INGRESA TU CONTRASEÑA </h2> <input class="cajita" type="text" name="contraseña"><br>
                  <input type="hidden" name="reg" value="yes">
                  <input type=image src="img/registrar.png" width="200" height="50">
               </form>
               <form form action="index.php" method="post"><pre> 
               <input type="hidden" name="reg" value="yes">
              <input class="btn1" type="submit" value="SALIR">
                </form>
               
             </div></center>';
   
}   
?>

</html>
</body>
<style> 
body {
background-image: url(img/fondo2.jpg);
background-position: center center;
background-repeat: no-repeat;
background-attachment: fixed;
background-size: cover;
background-color: #fff;
}.btn1{  border:none;outline:none;width:200px;height:25px;background:#FF4900 ;color:#000;font-size:20px;border-radius:10px;
    }.cajita {
  margin: 0;padding:0 20px;background-color: #91FFF3;opacity:45;text-align: center;font-size:12px;border-radius:10px;width:400px;height:25px;}
</style> 