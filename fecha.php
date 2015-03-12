<?php
include("conexcion.php");
	
	 session_start();
 if ($_SESSION['user']==null){
	header("location:index.html");
	exit();
	
	}
	include("conexcion.php");
	mysql_select_db($database, $con);
date_default_timezone_set('UTC');	
$fecha = date("d-m-Y");
$partes = explode("-", $fecha) ;
$dia=$partes[0];
$mes=$partes[1];
$y=$partes[2];

$sql = "SELECT * FROM `caso` ";
$resultado = mysql_query($sql, $con);
 
if (mysql_num_rows($resultado) > 0){
	while ($row = mysql_fetch_array ($resultado))
	{
	$venci=$row[6];
	$par = explode("-", $venci);
	$yv = $par[0];
	$mesv = $par[1];
	$diav = $par[2];
	
	$restad = $diav - $dia  ;
	$restam = $mesv - $mes;
	$restay = $y - $yv;
	
	
	 if ($restad <=3) 
  {
	  $cedula = $row[1];
      echo 'los siguientes casos identficados con numero de cedula de usuario ' ;
	  echo $cedula;
	  echo 'estan apuntos de vencer';
 
  }
	}
	
	
}


mysql_close($con);



?>