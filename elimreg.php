<?php

include "conexcion.php";  

 session_start();
 if ($_SESSION['user']==null){
	header("location:index.html");
	exit();
	
	}
	
	if ($_SESSION['user']=='admin'){
		
		 include("conexcion.php");
	mysql_select_db($database, $con);
	
	$cedula = $_POST['cedula'];
    $codigo = $_POST['codigo'];
	/*echo $cedula;*/
	if(isset($cedula) && isset($codigo))
	{
	$sql ="DELETE FROM `caso` WHERE  `id caso`='$codigo' and cedula='$cedula'";
	
	$resultado = mysql_query($sql, $con);
	
	if (mysql_num_rows($resultado) > 0){
	
	
	
 header("location:eliminarusu.php?mensaje=1.");
    
}
else{
 header("location:eliminarusu.php?mensaje=2");

}	
mysql_close($con);

						
					
						}

	}
 

?>