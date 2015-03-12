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
				
				 
				 echo "<h4> datos guardados corectamente </h4>"; 
			 }
			 if($_GET['mensaje']==1)
			 {
				 echo "datos no gurdados corectamente"; 
			 }
			
			}
			   ?>
				<article>
                <?php
				if ($_SESSION['user']=='admin'){
                
               echo' <form id="f-preingreso" method="post" action="enviar.php">';
				echo '		<fieldset> ';
				echo '			<legend>Datos del nuevo usuario de asleg</legend> ';
                 echo          ' <label>user:</label> ' ;
                echo '            <input type="text" name="user" value="" size="20" required /><br /> ';
               echo '             <label>contraseña:</label> ';
				echo '			<input type="text" name="contrasena"  value="" size="20"  required/><br />';
               echo         '   <label>rool del usuario</label>';
				echo		'	<select name="rool">';
				echo		'		<option value ="admin">administrador</option>';
				echo	'			<option value ="comun">usuario comun</option>';
                echo     '       </select><br />';
                            
                echo    '         <label>Nombre:</label>';
                echo      '      <input type="text" name="nombre" value="" size="20" required /><br />';
              echo      '        <label>Apellidos:</label>';
		echo			'		<input type="text" name="apellido"  value="" size="20"  required/><br />';
             echo             '  <label>Numero de Cedula:</label>';
							
              echo             ' <input type="text" name="cedula" size="15"  value=""required /><br />';
            echo '               </fieldset>';
           echo '             <center><input type="submit" class="button"  value="Registrar"></center>';
           echo '             </form>';
				}
				?>	
                    
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
