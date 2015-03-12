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
					<article>
					<form id="f-preingreso" method="post" action="enviar2.php">
						<fieldset>
							<legend>Datos Personales</legend>
                            <label>Nombres:</label>
                            <input type="text" name="nombre" value="" size="35" required /><br />
                            <label>Apellidos:</label>
							<input type="text" name="apellido"  value="" size="35"  required/><br />
                            <label>Numero de Cedula:</label>
							
                            <input type="text" name="cedula" size="15"  value=""required /><br />
                            <label>Dirrecion:</label>
                            <input type="text" name="dirreccion" size="20" value="" required /><br />
                            <label>Barrio:</label>
                             <input type="text" name="barrio" size="20" value="" required /><br />
                             <label>Telefono:</label>
                              <input type="text" name="telefono" size="20" value="" required /><br />
							
						
						
						</fieldset>
						<fieldset>
							<legend>Datos del Caso</legend>
                            
                            <label>Descripcion del Caso</label>
                            <input type="textarea"  name="des" required size="100"/>
                             <label>Tipo de Caso</label>
							<select name="tipocaso">
								<option value ="salud">salud</option>
								<option value ="libreta militar">Libreta Militar</option>
                                <option value ="spd">Servicios Publicos Domiciliarios</option>
                                <option value ="otros">Otros</option>
							</select><br />
                            <label>Estado del Caso</label>
                            <select name="estadocaso" >
								<option value ="exitoso">Exitoso</option>
								<option value ="espera">En espera</option>
                                <option value ="vencido">Vencido</option>
                            </select><br />
                           
							<label>Fecha de Ingreso</label>
							<input type="date"  name="ingreso" required/><br />
                            <label>Fecha de Vencimiento</label>
							<input type="date"  name="vencimiento" required/><br />
                            
                             <label>El Usuario Recibe</label>
                            <select name="recibe" >
                                <option value="nada" >Nada</option>
								<option value ="derecho peticion">derecho de peticion</option>
								<option value ="tutela">tutela</option>
                               
                            </select><br />

						</fieldset>
						<center><input type="submit" class="button"  value="Registrar"></center>
					</form>
				</article>
                    
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
