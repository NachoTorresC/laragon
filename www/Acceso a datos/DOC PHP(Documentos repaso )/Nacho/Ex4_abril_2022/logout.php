<?php
echo '<link rel="stylesheet" type="text/css" href="estilo.css" />';
session_start ();
if (isset($_SESSION["email"]))
{
    echo "<p>Conexión finalizada del usuario:".$_SESSION['nombre']."</p>";
	$horaconexion=$_SESSION['horaConexion'];
	$horafinal=date("H:i:s");
	echo "<p>Hora de conexion:".$horaconexion."</p>";
	echo "<p>Hora actual:".$horafinal."</p>";
	$tiempo_transcurrido=strtotime($horafinal)-strtotime($horaconexion);
	echo "<P>Tiempo de conexión:".conversor($tiempo_transcurrido)."</P>";
	session_destroy ();
	echo "<P>[ <A HREF='menu.php'>Volver a inicio</A> ]</P>";
}
else
{
    echo "<BR><BR>";
    echo "<P ALIGN='CENTER'>No existe una conexión activa</P>";
    echo "<P ALIGN='CENTER'>[ <A HREF='menu.php'>Volver a menu</A> ]</P>"; // enlace que me permite volver al menu.php
    echo "<P ALIGN='CENTER'>[ <A HREF='login.php'>Inicia sesión</A> ]</P>";
}

function conversor($tiempo_en_segundos) {
	$horas = floor($tiempo_en_segundos / 3600);
	$minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);
	$segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);
 
	return $horas . 'h:' . $minutos . "m:" . $segundos."s";
}
  
?>
</body>
</html>
