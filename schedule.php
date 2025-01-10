<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dentalclinic</title>
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
        <h2>Schedule</h2>
        <p>In schedule, users can conveniently view schedules<br> for managing and organizing their appointments.</p>
    </div>
    <div class="schedule">
        <?php
        if (isset($_SESSION["UID"]) && $_SESSION["userRoles"] == 1) {
            echo '<div class="searchBar">
                    <form method="POST" action="schedule_search1.php">
                        <label for="dateSearch">Choose a date to view schedule:&nbsp;</label>
                        <input type="date" id="dateSearch" name="date" required>&nbsp;&nbsp;
                        <button type="submit" value="Search"><i class="bi bi-search"></i></button>
                    </form>
                </div>';
        } else {
            echo '<div class="searchBar">
                    <form method="POST" action="schedule_search2.php">
                        <label for="dateSearch">Choose a date to view schedule:&nbsp;</label>
                        <input type="date" id="dateSearch" name="date" required>&nbsp;&nbsp;
                        <button type="submit" value="Search"><i class="bi bi-search"></i></button>
                    </form>
                </div>';
        }
        ?>
        <table id="tabler">
            <tr>
                <th width="40%">Session</th>
                <th width="30%">Dentist</th>
                <th width="30%">Appointment</th>
            </tr>
            <tr>
                <td>1 (From 8:00am to 11:30am)</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2 (From 1pm to 2:30pm)</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3 (From 2:30pm to 5pm)</td>
                <td></td>
                <td></td>
            </tr>
        </table>
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