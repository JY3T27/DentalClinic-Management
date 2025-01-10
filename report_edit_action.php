
<?PHP
session_start();
include('config.php');

// Variables
$action = "";
$id = "";
$remark = "";

//this block is called when button Submit is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = $_POST["mrid"];
	$remark = $_POST["remark"];

	$sql = "UPDATE medicalreport SET remark = '$remark' WHERE mr_id ='$id'";

	echo $sql . "<br>";

	if (mysqli_query($conn, $sql)) {
		echo "Medical report updated successfully!<br>";
		echo '<a href="report_all_details.php?id=' . $id . ' ">Back</a>';
	} else {
		echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>";
		echo '<a href="javascript:history.back()">Back</a>';
	}
}
//close db connection
mysqli_close($conn);
?>

