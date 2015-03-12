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
            
            <fieldset>
                     <?php
					  $tipocaso = $_POST['tipocaso'];
					 ?>
					<legend>Casos de tipos <?php echo $tipocaso ?></legend>
                      
                       <?php
			      include "conexcion.php";  
				  mysql_select_db($database, $con); 
				  $tipocaso = $_POST['tipocaso'];
				  if(isset($tipocaso))
				  {
				  $sql ="SELECT * FROM `caso` WHERE `tipo de caso`='$tipocaso'";
				  $result= mysql_query($sql, $con);
 while ($row = mysql_fetch_array ($result))  
{ 
echo '<fieldset>';
echo '<label>cedula del usuario:</label>';
echo '<input type="text" value="'.$row[1].'" readonly disabled>';
echo '<br>';

echo '<label>descripcion:</label>';
echo '<input type="text" value="'.$row[2].'" readonly disabled>';
echo '<br>';

echo '<label>tipo de caso:</label>';
echo '<input type="text" value="'.$row[3].'" readonly disabled>';
echo '<br>';

echo '<label>estado del caso:</label>';
echo '<input type="text" value="'.$row[4].'" readonly disabled>';
echo '<br>';

echo '<label>fecha de ingreso:</label>';
echo '<input type="text" value="'.$row[5].'" readonly disabled>';
echo '<br>';

echo '<label>fecha de vencimiento:</label>';
echo '<input type="text" value="'.$row[6].'" readonly disabled>';
echo '<br>';

echo '<label>que recibio el usuario:</label>';
echo '<input type="text" value="'.$row[7].'" readonly disabled>';
echo '<br>';
echo '</fieldset>';


}  
mysql_free_result ($result);
				  }
			   ?> 
               <center> 
               <a href="buscar.php" class="button "  >Buscar otro Caso</a><br />
               </center>
				</fieldset>
              
                 
               				
			</section>           

   </div>


        <div id="pie">
             <center>
            <h1>WWW.ASLEG.COM</h1>
            </center>
        </div>
 

</body>
</html>