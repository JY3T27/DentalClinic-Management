<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>DentalClinic</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="vendor/aos/aos.css" rel="stylesheet">
	<link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="css/style.css" rel="stylesheet">
</head>

<body>
	<?php include 'header.php'; ?>

	<div class="index-header">
		<h2>Profile Edit</h2>
	</div>

	<?php
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
	?>

	<?php

	if ($userRole == '1') {
		$user_role = "patient";
	} else if ($userRole == '2') {
		$user_role = "nurse";
	} else if ($userRole == '3') {
		$user_role = "dentist";
	} else {
		echo "User Not Found";
	}

	//query the table user and profile
	$sql = "SELECT * FROM user AS u JOIN " . $user_role . "profile AS n ON u.userID = n.userID WHERE u.userID=" . $_SESSION["UID"];
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);

		$profile_id = $row[$user_role . "_ID"];
		$profile_IC = $row[$user_role . "_IC"];
		$profile_firstname = $row[$user_role . "_firstname"];
		$profile_lastname = $row[$user_role . "_lastname"];
		$profile_mobile = $row[$user_role . "_mobile"];
		$profile_gender = $row[$user_role . "_gender"];
		$profile_address = $row[$user_role . "_address"];
		$profile_picture = $row[$user_role . "_picture"];
	}
	?>

	<div class="row">

		<div class="col-left">
			<div class="profile">
				<?php
				//Check if the user has a profile picture
				if (isset($profile_picture) && !empty($profile_picture)) {
					echo '<img class = "image" src="' . $profile_picture . '" alt="Avatar" class="avatar">';
				} else {
					//Display a default image if no profile picture
					echo '<img class = "image" src="images/profile_icon.jpg" alt="Default Avatar" class="avatar">';
				}
				?>

			</div>
		</div>
		<div class="col-right">
			<form id="profile" action="profile_edit_action.php" method="post" enctype="multipart/form-data">
				<table id="profile_table" width="100%">
					<tr>
						<td width="164">First Name :</td>
						<td><input type="text" name="profile_firstname" size="20" value="<?= $profile_firstname ?>"></td>
					</tr>
					<tr>
						<td width="164">Last Name :</td>
						<td><input type="text" name="profile_lastname" size="20" value="<?= $profile_lastname ?>"></td>
					</tr>
					<tr>
						<td width="164">IC No :</td>
						<td><?= $profile_IC ?></td>
					</tr>
					<tr>
						<td width="164">Mobile Number :</td>
						<td><input type="text" name="profile_mobile" id="mobile_number" pattern="\d{3}-\d{7}" title="Please enter a valid Malaysian phone number format (e.g., 012-3456789)" required value="<?= $profile_mobile ?>"></td>
					</tr>
					<tr>
						<td width="164">Gender :</td>
						<td>
							<select size="1" name="profile_gender">
								<option value="" <?php echo ($profile_gender == '') ? 'selected' : ''; ?> disabled>Select Gender</option>
								<option <?php echo ($profile_gender == 'Male') ? 'selected' : ''; ?>>Male</option>
								<option <?php echo ($profile_gender == 'Female') ? 'selected' : ''; ?>>Female</option>
								<option <?php echo ($profile_gender == 'Other') ? 'selected' : ''; ?>>Other</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="164">Address :</td>
						<td><input type="text" name="profile_address" size="50" value="<?= $profile_address ?>"></td>
					</tr>
					<!--Profile Picture Update-->
					<tr>
						<td width="164">Profile Picture :</td>
						<td><input type="file" name="profile_picture"></td>
					</tr>
				</table>
				<div style="text-align: right; padding-bottom:5px;">
					<input type="submit" value="Update"> <input type="reset" value="Reset">
				</div>
			</form>
		</div>
	</div>

	<!-- ======= Footer ======= -->
	<?php include 'footer.php'; ?>

	<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<div id="preloader"></div>

	<!-- Vendor JS Files -->
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/aos/aos.js"></script>
	<script src="vendor/glightbox/js/glightbox.min.js"></script>
	<script src="vendor/purecounter/purecounter_vanilla.js"></script>
	<script src="vendor/swiper/swiper-bundle.min.js"></script>
	<script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="vendor/php-email-form/validate.js"></script>

	<!-- Template Main JS File -->
	<script src="js/main.js"></script>

</body>

</html>