<?php 
/*******************************************************************
**************     Medical Center Version 1.0.1    *****************
********************************************************************
***************  @Author ISC.Ulises Rodriguez T.   *****************
********************************************************************
***************   @Author Ing.Jorge Hernández.     *****************
********************************************************************
***************          @copyright 2010           ***************** 
********************************************************************
***************           @No modificar            *****************
********************************************************************/
?>
<?php
require("configuracion.php");
require("funciones.php");
session_start();
$_SESSION=array();

if ($_POST["usuario"]){
	$conn_bd = mysql_connect($bd_host,$bd_usuario,$bd_pass) or die("Error en la conexión a la base de datos");
	mysql_select_db($bd_base, $conn_bd);
	$pass = md5($_POST["password"]);
	$sql="SELECT * FROM usuarios WHERE login='".htmlentities($_POST["usuario"])."' and password='".$pass."'";
	$result = mysql_query($sql,$conn_bd);
	if (mysql_num_rows($result)==1){
		$_SESSION["login"]=mysql_result($result,0,"login");
		$_SESSION["password"]=mysql_result($result,0,"password");
		$_SESSION["nombre"]=mysql_result($result,0,"nombre");
		header("Location: ../mod_inicio/index.php");
	}else
	{
		?>
        <script type="text/javascript">
		alert("\tUsuario o Password incorrecto \n \t Favor de verificar los datos");
		window.location = "../index.php";
		</script>
		<?php 
    }
}
?>		
		<script type="text/javascript">
		window.location = "../index.php";
		</script>