<!doctype html>
<html>
<head>
 <meta charset="utf-8">
<title>ASLEG</title>
<link href="css/estilobase.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/buttons.css">
</head>

<body>
<?php  
  
include "conexcion.php";  

 session_start();
 if ($_SESSION['user']==null){
	header("location:index.html");
	exit();
}


		 
           
			
?>
<div id="general" >
            <div id="banner"  >
            <center>
            <img  src="img/logo2.jpg" width="525" height="151"  />
            </center>
            </div>
           
 <aside>
                    <a href="pagina2.php"  class="button orange">Inicio</a>
				<a href="salir.php" class="button orange">Salir</a>
				<fieldset>
					<legend>Registro</legend>
                    <?php  
					include "conexcion.php";  
					
					if ($_SESSION['user']=='admin'){
						echo '<a href="registrousu.php" class="button orange" >Ingresar usuario</a><br />';
						echo '<a href="eliminarusu.php" class="button orange" >Eliminar usuario</a><br />';
						echo '<a href="eliminaregistro.php" class="button orange" >Eliminar caso</a><br />';
						
						}
?>
                    
						<a href="registro.php" class="button orange" >Ingresar Caso</a><br />
				</fieldset>
				<fieldset>
					<legend>Control</legend>
						<a href="buscar.php" class="button orange"  >Buscar Caso</a><br />
						<a href="actualizar.php" class="button orange"  >Actualizar Caso</a><br />
				</fieldset>
				
			</aside>
            
            <section>
              <?php
	include("conexcion.php");
	mysql_select_db($database, $con);
	
	
	$nombres = $_POST['nombre'];
	$apellidos = $_POST['apellido'];
	$cedula = $_POST['cedula'];
	$dirreccion = $_POST['dirreccion'];
	$barrio = $_POST['barrio'];
	$telefono = $_POST['telefono'];
	$descripcion = $_POST['des'];
	$tipocaso = $_POST['tipocaso'];
	$estadocaso = $_POST['estadocaso'];
	$ingreso = $_POST['ingreso'];
	$vencimiento = $_POST['vencimiento'];
	$recibe = $_POST['recibe'];
	if ( (isset($nombres)) && (isset($apellidos)) && (isset($cedula)) && (isset($dirreccion)) && (isset($barrio)) && (isset($telefono)) && (isset($descripcion))  && (isset($tipocaso)) && (isset($estadocaso)) && (isset($ingreso)) && (isset($vencimiento))  && (isset($recibe))  )
	{
$sql1 = "INSERT INTO `persona`(`cedula`, `nombres`, `apellidos`, `dirreccion`, `barrio`, `telefono`) VALUES ('$cedula', '$nombres', '$apellidos', '$dirreccion', '$barrio', '$telefono')";
	
$sql2 = "INSERT INTO `caso`(`cedula`, `descripcion`, `tipo de caso`, `estado del caso`, `fecha_ingreso`, `fecha_vencimiento`, `recibe`) VALUES ('$cedula', '$descripcion', '$tipocaso', '$estadocaso', '$ingreso', '$vencimiento', '$recibe')";

$resultado1 = mysql_query($sql1, $con);
$resultado2 = mysql_query($sql2, $con);

$sql3 = "SELECT  * FROM `caso` WHERE `cedula`='$cedula' and `fecha_vencimiento`='$vencimiento'";
$resultado3 = mysql_query($sql3, $con);

while ($row = mysql_fetch_array ($resultado3))  
{
	 echo '<fieldset>';
					
	 echo '<label> <h2> datos guardado corectamente fabor informale al usuario del codigo de su caso el cual es:</h2> </label>';
	echo '<center><h1>'.$row[0].'</center></h1>';
	echo '</fieldset>';
	
	} 
mysql_close($con);
	}
?> 
        <center><a href="registro.php" class="button" >Ingresar otro Caso</a><br /></center>
				
			</section>           

   </div>


        <div id="pie">
             <center>
            <h1>WWW.ASLEG.COM</h1>
            </center>
        </div>
 

</body>
</html>
