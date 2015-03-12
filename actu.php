<?php
	include("conexcion.php");
	session_start();
 if ($_SESSION['user']==null){
	header("location:index.html");
	exit();
}
	mysql_select_db($database, $con);
	
	$cedula = $_POST['cedula'];	
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$dirreccion = $_POST['dirreccion'];
	$barrio = $_POST['barrio'];
	$telefono = $_POST['telefono'];
	$caso = $_POST['id'];
	$estadocaso = $_POST['estado'];
	$ingreso = $_POST['ingreso'];
	$vencimiento = $_POST['vencimiento'];
	$recibe = $_POST['recibe'];
	
	
	/*echo $cedula;
	echo $nombres;
	echo $apellidos;
	echo $dirreccion;
	echo $barrio;
	echo $telefono;
	echo $estadocaso;
	echo $ingreso;
	echo $vencimiento;
	echo $recibe;*/
	if ((isset($nombres)) && (isset($apellidos)) && (isset($dirreccion)) &&  (isset($barrio)) && (isset($telefono)) && (isset($estadocaso)) && (isset($ingreso)) && (isset($vencimiento)) && (isset($recibe)) )
	{
	$sql1 = " UPDATE `persona` SET `nombres`='$nombres',`apellidos`='$apellidos',`dirreccion`='$dirreccion',`barrio`='$barrio',`telefono`='$telefono' WHERE `cedula`='$cedula'";
	
	$sql2 = " UPDATE `caso` SET `estado del caso`='$estadocaso',`fecha_ingreso`='$ingreso',`fecha_vencimiento`='$vencimiento',`recibe`='$recibe' WHERE `id caso`='$caso' and `cedula`='$cedula'";
	
	$resultado1 = mysql_query($sql1, $con);
    $resultado2 = mysql_query($sql2, $con);
	
	if ((mysql_num_rows($resultado1) > 0) && (mysql_num_rows($resultado2) > 0)){
 header("location:actualizar.php?mensaje=1");
    
}
else{
 header("location:actualizar.php?mensaje=2");
}

mysql_close($con);
	}
	

?>