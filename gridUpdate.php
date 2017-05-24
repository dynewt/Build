<?php
$grid = $_GET['grid'];
$archer = new mysqli("archer", "buildrack", "barngrill", "build_rack");
if (mysqli_connect_errno()) {
	die("Failed to connect :: " . mysqli_connect_error());
}

$size = $_GET['size'];
$insert = $archer->prepare("insert into grids(grid, size) values (?, ?) on duplicate key update size = values(size)");
$insert->bind_param("si", $grid, $size);
$insert->execute();
$insert->close();

?>