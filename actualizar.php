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
			    if(isset($_GET['mensaje'])){
			 if($_GET['mensaje']==2)
			 {
				 echo "<h4> datos actualizados corectamente </h4>"; 
			 }
			 if($_GET['mensaje']==1)
			 {
				 echo "datos no actuaizados corectamente"; 
			 }
			
			}
			   ?>
				<article>
					<fieldset>
					<legend>buscar por cedula de usuario del caso que va actualizar</legend>
                       <form id="f-preingreso" method="post" action="actuace.php" >
                        <label>Introdusca numero cedula a buscar:</label>
                        <input type="text" name="cedula" size="15"  value=""required />
                        <label>introdusca codigo del caso:</label>
                        <input type="text" name="codigo" size="10" value="" required />
						<center><input type="submit" class="button"  value="buscar"></center>
                        </form>
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
