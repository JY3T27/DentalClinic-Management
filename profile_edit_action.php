<?PHP
session_start();
include('config.php');

//check if logged-in
if (!isset($_SESSION["UID"])) {
	header("location:index.php");
}
$userID = $_SESSION["UID"];

// Assuming you have the userID stored in a variable
$userID = $_SESSION["UID"];

// SQL query to retrieve user role based on userID
$sql = "SELECT userRoles FROM user WHERE userID = '$userID'";
$result = mysqli_query($conn, $sql);

if ($result) {
	// Check if any rows are returned
	if (mysqli_num_rows($result) > 0) {
		// Fetch the user role
		$row = mysqli_fetch_assoc($result);
		$userRole = $row['userRoles'];
	}
} else {
	// Error in the SQL query
	echo "Error: " . mysqli_error($conn);
}

// Close the database connection
//mysqli_close($conn);

if ($userRole == '1') {
	$user_role = "patient";
} else if ($userRole == '2') {
	$user_role = "nurse";
} else if ($userRole == '3') {
	$user_role = "dentist";
} else {
	echo "User Not Found";
}


//this block is called when button Submit is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$profile_firstname = $_POST["profile_firstname"];
	$profile_lastname = $_POST["profile_lastname"];
	$profile_mobile = $_POST["profile_mobile"];
	$profile_gender = $_POST["profile_gender"];
	$profile_address = $_POST["profile_address"];

	$sql = "UPDATE " . $user_role . "profile SET " . $user_role . "_firstname = '$profile_firstname', " . $user_role . "_lastname = '$profile_lastname', " . $user_role . "_mobile = '$profile_mobile', " . $user_role . "_gender = '$profile_gender', " . $user_role . "_address = '$profile_address' 
            WHERE userID = '$userID'";

	echo $sql . "<br>";

	//Upload profile pic
	// Check if a file is uploaded
	if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
		// Process the uploaded image
		$uploadDir = "uploads/"; // Set your desired upload directory
		$uploadFile = $uploadDir . basename($_FILES['profile_picture']['name']);

		// Move the uploaded file to the specified directory
		if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadFile)) {
			// Update the profile with the new image filename
			$sqlImage = "UPDATE " . $user_role . "profile SET " . $user_role . "_picture = '$uploadFile' WHERE userID = '$userID'";
			mysqli_query($conn, $sqlImage);
			echo "Profile picture updated successfully!<br>";
		} else {
			echo "Error uploading profile picture.<br>";
		}
	}

	if (mysqli_query($conn, $sql)) {
		echo "Form data updated successfully!<br>";
		echo '<a href="profile.php">Back</a>';
	} else {
		echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>";
		echo '<a href="javascript:history.back()">Back</a>';
	}
}
//close db connection
mysqli_close($conn);
