<?php

$grid = $_GET['grid'];

$mysqli = new mysqli("rimaster", "readonly", "", "inventory");

if ($mysqli->connect_errno) {

    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;}

    //weight,
	 //num_ps,
	$stmt = $mysqli->prepare("select models_rdc.model,
	 u_size,
	 max_watts,
	 grid,
	 room,
	 physical_insinc.serial_number,
	 models_rdc.manufacturer,
	 location,
	 physical_rdc.asset_tag,
	 u_position,
	 slot_number,
	 serial_number from physical_rdc,
	 physical_insinc,
	 models_rdc where grid = ? 
	 and physical_insinc.asset_tag = physical_rdc.asset_tag
	 and physical_rdc.model = models_rdc.model;
");

	$stmt->bind_param("s", $grid);

	$stmt->execute();

	$result = $stmt->get_result();

	$info = array();
	while($row = $result->fetch_assoc()) {

		array_push($info, $row);
		settype($rowNum, "int");
	}
	echo json_encode($info);

