<?php
    header('Access-Control-Allow-Origin: *');
	$servername = "localhost:3307";
	$username = "root";
	$password = "";
	$db = "pegasusdb";

	$conn = new mysqli($servername, $username, $password, $db);

	$sql = "SELECT * FROM productos";
	$result = $conn->query($sql);

	$datos = array();
	$datos["error"] = "0";

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$datos["productos"][] = array("id"=>$row["id"], "nombre"=>$row["nombre"], "descripcion"=>$row["descripcion"], "precio"=>$row["precio"], "resenas"=>$row["resenas"], "cantidad"=>$row["cantidad"], "imagen"=>$row["imagen"]);
		}
	} else {
		$datos["error"] = "1";
	}
	
	$conn->close();
	echo json_encode($datos);
?>