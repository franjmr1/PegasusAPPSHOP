<?php
	$server='localhost:3307';
	$user='root';
	$pass='';
	$db='pegasusdb';
	$conection=new mysqli($server, $user, $pass, $db);
	//guardar imagen en carpta del servidor
	$nombre_imagen=$_FILES['imagen']['name'];
	$tipo_imagen=$_FILES['imagen']['type'];
	$tamano_imagen=$_FILES['imagen']['size'];
	$carpeta_imagen=$_SERVER['DOCUMENT_ROOT']. '/PegasusComputers/Images/ImgProductos/';


		if($tipo_imagen=='image/png'||$tipo_imagen=='image/jpg'||$tipo_imagen=='image/jpeg'||$tipo_imagen=='image/gif'){
	        move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_imagen.$nombre_imagen);
		}
	 $nombre = $_POST["nombre"];
	 $descripcion = $_POST["descripcion"];
	 $precio = $_POST["precio"];
	 $cantidad = $_POST["cantidad"];

	$consulta = "INSERT INTO productos (nombre, imagen, descripcion, precio,cantidad) VALUES ('$nombre','$nombre_imagen', '$descripcion', '$precio', '$cantidad')";

	if($conection->query($consulta) === TRUE){
		header('Location: http://localhost/PegasusComputers/Pagina.html');
	}
?>