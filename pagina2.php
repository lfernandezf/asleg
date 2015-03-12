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
				<article>
                <fieldset>
							<legend>ALERTA</legend>
                <?php
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
	$esta=$row[4];
	$venci=$row[6];
	$par = explode("-", $venci);
	$yv = $par[0];
	$mesv = $par[1];
	$diav = $par[2];
	
	$restad =   $diav - $dia   ;
	$restam = $mesv - $mes;
	$restay = $yv - $y  ;
if ( ($restad >0) && ($restad <=3) && ($restam==0) && ($restay==0) && ($esta=='espera') )
  {
	  $codigo = $row[0];
	  $cedula = $row[1];
	  
      echo '<h1>el caso identificado con numero de cedula de usuario</h1>' ;
	  echo '<h2>'.$cedula.'</h2>';
	  echo '<h1>y codigo de caso</h1>         ';
	  echo '<h2>'.$codigo.'</h2>';
	  echo '<h1>esta a punto de vencer </h1>';
	  echo '<br>';
 
  }
  
  else{
	  echo '<h1>NO HAY CASOS POR VENCER AUN </h1>';  
  }
  
	
	
	/* if (($restad <=0) && ($restam==0) && ($restay==0) && ($esta=='espera') )
  {
	  $codigo = $row[0];
	  $cedula = $row[1];
	  
      echo '<h1>el caso identificado con numero de cedula de usuario</h1>' ;
	  echo '<h2>'.$cedula.'</h2>';
	  echo '<h1>y codigo de caso</h1>         ';
	  echo '<h2>'.$codigo.'</h2>';
	  echo '<h1>esta vencido</h1>';
	  echo '<br>';
 
  }*/
  

}
	
}


mysql_close($con);



?>
					
  </fieldset>                  
				</article>
			</section>           

   </div>


        <div id="pie">
             <center>
            <h1>WWW.ASLEG.COM</h1>
            </center>
        </div>
 

</body>
</html>
