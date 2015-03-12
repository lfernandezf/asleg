<?php
	
	include("conexcion.php");
	
	 session_start();
 if ($_SESSION['user']==null){
	header("location:index.html");
	exit();
	
	}
	
	if ($_SESSION['user']=='admin'){
		 include("conexcion.php");
	mysql_select_db($database, $con);
	
	$user = $_POST['user'];
	$pwd = md5($_POST['contrasena']);
	$rool = $_POST['rool'];
	$nombres = $_POST['nombre'];
	$apellidos = $_POST['apellido'];
	$cedula = $_POST['cedula'];
	
if ( (isset($user)) && (isset($pwd)) && (isset($rool)) && (isset($nombres)) && (isset($apellidos)) && (isset($cedula))   )
	{	
	

$sql1 = "INSERT INTO `usuarios`(`user`, `password`, `rool`, `nombre`, `apellidos`, `cedula`) VALUES ('$user', '$pwd', '$rool', '$nombres', '$apellidos', '$cedula')";
	



$resultado1 = mysql_query($sql1, $con);

if (mysql_num_rows($resultado1) > 0){
	
	
	
 header("location:registrousu.php?mensaje=1.");
    
}
else{
 header("location:registrousu.php?mensaje=2");
}

mysql_close($con);

 

	
}


	}
	

	
?> 