<?php
session_start();
include('config.php');

//this action called when Delete link is clicked
if (isset($_GET["id"]) && $_GET["id"] != "") {
	$id = $_GET["id"];

	$sql = "DELETE FROM medicalreport WHERE mr_id = '$id';";
	echo $sql . "<br>";

	if (mysqli_query($conn, $sql)) {
		echo "Record deleted successfully<br>";
		echo '<a href="report_all.php">Back</a>';
	} else {
		echo "Error deleting record: " . mysqli_error($conn) . "<br>";
		echo '<a href="report_all.php">Back</a>';
	}
}
mysqli_close($conn);
