<?php
    header('Access-Control-Allow-Origin: *');
	$servername = "localhost:3307";
	$username = "root";
	$password = "";
	$db = "pegasusdb";

	$conn = new mysqli($servername, $username, $password, $db);

	$sql = "SELECT * FROM direcciones";
	$result = $conn->query($sql);

	$datos = array();
	$datos["error"] = "0";

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$datos["direcciones"][] = array("id"=>$row["id"], "numerodecasa"=>$row["numerodecasa"], "colonia"=>$row["colonia"], "estado"=>$row["estado"], "ciudad"=>$row["ciudad"], "codigopostal"=>$row["codigopostal"], "numerocel"=>$row["numerocel"]);
		}
	} else {
		$datos["error"] = "1";
	}
	
	$conn->close();
	echo json_encode($datos);
?>