<?php
 session_start();
include ('conexcion.php');

mysql_select_db($database, $con);
 

$usu = $_POST["usuario"];
$pass = md5($_POST['contrasena']);

/*echo $usu;
echo $pass;*/
if ((isset($usu)) && (isset($pass)))
 {
$sql = "SELECT * FROM usuarios WHERE user='$usu' AND password='$pass'";


 $resultado = mysql_query($sql, $con);

if (mysql_num_rows($resultado) > 0){
$arreglo=mysql_fetch_array($resultado);
$_SESSION['user']=$arreglo['rool'];
echo $_SESSION['user'];
           header("location: pagina2.php");
}
else{
  header("location:mensaje.html");	
}
mysql_close($con);
 }
?>