<?php
 	header('Access-Control-Allow-Origin: *');
	$server='localhost:3307';
	$user='root';
	$pass='';
	$db='pegasusdb';

	$conection=new mysqli($server, $user, $pass, $db);
	
	$nombre = $_POST["nombreT"];
	$numero = $_POST["numeroT"];
	$cvv = $_POST["cvv"];
	$fecha = $_POST["fecha"];
	

		$consulta = "INSERT INTO tarjetas (nombre, numero, cvv,fecha) VALUES ('$nombre', '$numero', '$cvv','$fecha')";
	if($conection->query($consulta) === TRUE){
	header('Location: http://localhost/PegasusComputers/Pagina.html#metodopago');
}
	
?>