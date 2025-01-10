<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>DentalClinic</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

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

	<div class="section-header">
		<h2>Medical Report</h2>
	</div>

	<div style="padding:0 10px;" id="report">
		<?php
		$name = "";
		$ic = "";
		$gender = "";
		$address = "";
		$date = "";
		$session = "";
		$dentist_name = "";
		$treatment = "";
		$remark = "";

		if (isset($_GET["id"]) && $_GET["id"] != "") {
			$sql = "SELECT * FROM medicalreport 
					INNER JOIN appointment ON medicalreport.ap_id = appointment.ap_id
					INNER JOIN treatment ON medicalreport.treatment_id = treatment.treatment_id
					INNER JOIN dentistprofile ON appointment.dentist_id = dentistprofile.dentist_ID
					INNER JOIN patientprofile ON appointment.patient_id = patientprofile.patient_ID
					WHERE medicalreport.mr_id = '" . $_GET["id"] . "'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			$name = $row["patient_firstname"] . " " . $row["patient_lastname"];
			$ic = $row["patient_IC"];
			$gender = $row["patient_gender"];
			$address = $row["patient_address"];
			$date = $row["date"];
			$session = $row["session"];
			$dentist_name = $row["dentist_lastname"];
			$treatment = $row["treatment_name"];
			$remark = $row["remark"];
		}
		?>

		<div>
			<h3>Patient Information</h3>
			<table>
				<tr>
					<th width="20%">Name</th>
					<td colspan="3" width="80%"><?php echo $name ?></td>
				</tr>
				<tr>
					<th width="20%">IC</th>
					<td width="30%"><?php echo $ic ?></td>
					<th width="20%">Gender</th>
					<td width="30%"><?php echo $gender ?></td>
				</tr>
				<tr>
					<th width="20%">Address</th>
					<td colspan="3" width="80%"><?php echo $address ?></td>
				</tr>
			</table>
		</div>
		<p></p>
		<div>
			<h3>Medical Record</h3>
			<table>
				<tr>
					<th width="20%">Date</th>
					<td width="30%"><?php echo $date ?></td>
					<th width="20%">Session</th>
					<td width="30%">
						<?php
						if ($session == 1)
							echo $session . ' (From 8:00am to 11:30am)';
						elseif ($session == 2)
							echo $session . ' (From 1pm to 2:30pm)';
						elseif ($session == 3)
							echo $session . ' (From 2:30pm to 5pm)';
						else
						echo 'Error session';
						?>
					</td>
				</tr>
				<tr>
					<th width="20%">Dentist's Name</th>
					<td colspan="3" width="80%"><?php echo 'Dr. ' . $dentist_name ?></td>
				</tr>
				<tr>
					<th width="20%">Treatment</th>
					<td colspan="3" width="80%"><?php echo $treatment ?></td>
				</tr>
				<tr>
					<th colspan="4" style="text-align: center;">Remark</th>
				</tr>
				<tr>
					<td rowspan="3" colspan="4"><?php echo $remark ?></td>
				</tr>
			</table>
		</div>
		<p></p>
	</div>

	<section></section>
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