<?php
    header('Access-Control-Allow-Origin: *');
	$servername = "localhost:3307";
	$username = "root";
	$password = "";
	$db = "pegasusdb";

	$conn = new mysqli($servername, $username, $password, $db);

	$sql = "SELECT * FROM tarjetas";
	$result = $conn->query($sql);

	$datos = array();
	$datos["error"] = "0";

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$datos["tarjetas"][] = array("id"=>$row["id"], "nombre"=>$row["nombre"], "numero"=>$row["numero"], "cvv"=>$row["cvv"], "fecha"=>$row["fecha"]);
		}
	} else {
		$datos["error"] = "1";
	}
	
	$conn->close();
	echo json_encode($datos);
?>