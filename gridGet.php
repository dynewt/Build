<?php
$grid = $_GET['grid'];
$archer = new mysqli("archer", "buildrack", "barngrill", "build_rack");
if (mysqli_connect_errno()) {
	die("Failed to connect :: " . mysqli_connect_error());

}
	$select = $archer->prepare("select size from grids where grid = ?");
	$select->bind_param("s", $grid);
	$select->execute();
	$result = $select->get_result();
	$select->close();
	$row = $result->fetch_assoc();
	$size = $row['size'];
	if($row) {
		echo $row['size'];
	}
	else{
		echo -1;
	}