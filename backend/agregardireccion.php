<?php
 	header('Access-Control-Allow-Origin: *');
	$server='localhost:3307';
	$user='root';
	$pass='';
	$db='pegasusdb';

	$conection=new mysqli($server, $user, $pass, $db);
	
	$street = $_POST["street"];
	$streetnumber = $_POST["streetnumber"];
	$colonia = $_POST["colonia"];
	$estado = $_POST["estado"];
	$ciudad = $_POST["ciudad"];
	$cp = $_POST["cp"];
	$telefono = $_POST["telefono"];


		$consulta = "INSERT INTO direcciones (numerodecasa, colonia, estado,ciudad,codigopostal,numerocel) VALUES ('$streetnumber', '$colonia', '$estado','$ciudad','$cp','$telefono')";
	if($conection->query($consulta) === TRUE){
	header('Location: http://localhost/PegasusComputers/Pagina.html#direccionesagr');
}
	
?>