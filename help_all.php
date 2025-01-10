<?php
session_start();
include('config.php');
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
        <h2>Help Center</h2>
    </div>

    <div id="helptable">
        <table>
            <h3>All question asked</h3>
            <tr>
                <th width="10%">No</th>
                <th width="15%">Subject</th>
                <th width="40%">Message</th>
                <th width="10%">Patient's name</th>
                <th width="10%">Patient's email</th>
                <th width="10%">Status</th>
                <th width="5%">Done?</th>
            </tr>
            <?php
            $sql = "SELECT * FROM helpcenter
                    INNER JOIN patientprofile ON patientprofile.patient_ID = helpcenter.patient_ID
                    INNER JOIN user ON user.userID = patientprofile.userID";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                $numrow = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" .  $numrow . "</td><td>" . $row["subject"] . "</td><td style=\"text-align:left\">"
                        . $row["message"] . "</td><td>" . $row["patient_lastname"] . "</td><td>"
                        . $row["userEmail"] . "</td><td>" . $row["status"] . "</td>";
                    echo '<td> <a href="help_all_action.php?id=' . $row["hc_id"] . '" onClick="return confirm(\'Done?\');"><span>&#10003;</span></a>';
                    echo "</tr>" . "\n\t\t";
                    $numrow++;
                }
            } else {
                echo '<tr><td colspan="6">0 results</td></tr>';
            }
            mysqli_close($conn);
            ?>
        </table>
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