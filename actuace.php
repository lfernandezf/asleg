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
                    <form id="f-preingreso" method="post" action="actu.php">
					<fieldset>
					<legend>Datos personales</legend>
                      
                       <?php
			      include "conexcion.php";  
				  mysql_select_db($database, $con); 
				  $cedula = $_POST['cedula'];
				  if (isset($cedula)) {
				  $sql ="SELECT * FROM `persona` WHERE cedula='$cedula'";
				  $result= mysql_query($sql, $con);
 while ($row = mysql_fetch_array ($result))  
{  
echo '<label>numero de cedula:</label>';
echo '<input type="text" name="cedula" value="'.$row[1].'" readonly >';
echo '<br>';

echo '<label>sus nombres:</label>';
echo '<input type="text" name="nombres" value="'.$row[2].'">';
echo '<br>';

echo '<label>sus apellidos:</label>';
echo '<input type="text" name="apellidos" value="'.$row[3].'" >';
echo '<br>';

echo '<label>su dirrecion:</label>';
echo '<input type="text" name="dirreccion" value="'.$row[4].'" >';
echo '<br>';

echo '<label> barrio donde vive:</label>';
echo '<input type="text" name="barrio" value="'.$row[5].'" >';
echo '<br>';

echo '<label>su numero de telefono:</label>';
echo '<input type="text" name="telefono" value="'.$row[6].'" >';
echo '<br>';

}  
mysql_free_result ($result);
				  }
			   ?>  
				</fieldset>
                
                 <fieldset>
					<legend>Datos del  casos asociado con el numero de cedula y codigo de caso</legend>
                      
                       <?php
			      include "conexcion.php";  
				  mysql_select_db($database, $con);
				  $cedula = $_POST['cedula']; 
				  $codigo = $_POST['codigo'];
				    if ((isset($cedula)) && (isset($codigo))) {
				  $sql ="SELECT * FROM `caso` WHERE `id caso`='$codigo' and cedula='$cedula'";
				  $result= mysql_query($sql, $con);
 while ($row = mysql_fetch_array ($result))  
{ 
echo '<fieldset>'; 
echo '<label>el cogigo del caso</label>';
echo '<input type="text" name="id" value="'.$row[0].'" readonly >';
echo '<br>';

echo '<label>estado del caso:</label>';
echo '<input type="text" name="estado" value="'.$row[4].'" >';
echo '<br>';

echo '<label>fecha de ingreso:</label>';
echo '<input type="text" name="ingreso" value="'.$row[5].'" >';
echo '<br>';

echo '<label>fecha de vencimiento:</label>';
echo '<input type="text" name="vencimiento" value="'.$row[6].'" >';
echo '<br>';

echo '<label>que recibio el usuario:</label>';
echo '<input type="text" name="recibe" value="'.$row[7].'" >';
echo '<br>';

echo '</fieldset>';



}  
mysql_free_result ($result);
					}

			   ?> 
               
				</fieldset>
                    <center><input type="submit" class="button"  value="actualizar"></center>
                    </form>
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
