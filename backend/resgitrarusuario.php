<?php
 	header('Access-Control-Allow-Origin: *');
	$server='localhost:3307';
	$user='root';
	$pass='';
	$db='pegasusdb';

	$conection=new mysqli($server, $user, $pass, $db);
	
	$nombre = $_POST["nombre"];
	$correo = $_POST["correo"];
	$contrasena = $_POST["contrasena"];

	$consulta = "INSERT INTO clientesregistrados (Nombre, Correo, Contrasena) VALUES ('$nombre', '$correo', '$contrasena')";
	if($conection->query($consulta) === TRUE){
	header('Location:http://localhost/PegasusComputers/Pagina.html#login');
	}
?>