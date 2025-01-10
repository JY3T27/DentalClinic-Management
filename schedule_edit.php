<?php
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
        <h2>Edit Appointment</h2>
    </div>
    <?php
    $id = "";
    $date = "";
    $session = "";
    $dentist = "";
    $patient = "";
    if (isset($_GET["id"]) && $_GET["id"] != "") {
        $id = $_GET["id"];
        $sql = "SELECT * FROM appointment 
                INNER JOIN dentistprofile ON appointment.dentist_id = dentistprofile.dentist_ID
                INNER JOIN patientprofile ON appointment.patient_id = patientprofile.patient_id
                WHERE appointment.ap_id = '$id';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $date = $row["date"];
        $session = $row["session"];
        $dentist_ID = $row["dentist_ID"];
        $patient = $row["patient_lastname"];
    }
    mysqli_close($conn);
    ?>
    <div class="schedule">
        <div style="padding:0 10px;" id="scheduleEdit">
            <form method="POST" action="schedule_edit_action.php" enctype="multipart/form-data" id="myForm">
                <input type="text" id="sid" name="sid" value="<?= $_GET['id'] ?>" hidden>
                <table>
                    <tr>
                        <th>Date:</th>
                        <td>
                            <?php
                            if ($date != "") {
                                echo '<input type="date" name="date" id="dateAdd" value="' .
                                    $date . '" required>';
                            } else {
                            ?>
                                <input type="date" name="date" id="dateAdd" required>
                            <?php
                            }
                            ?>
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <th>Session:</th>
                        <td>
                            <select size="1" name="session" required>
                                <option value="">&nbsp;</option>
                                <?php
                                if ($session == "1")
                                    echo '<option value="1" selected>1</option>';
                                else
                                    echo '<option value="1">1</option>';

                                if ($session == "2")
                                    echo '<option value="2" selected>2</option>';
                                else
                                    echo '<option value="2">2</option>';

                                if ($session == "3")
                                    echo '<option value="3" selected>3</option>';
                                else
                                    echo '<option value="3">3</option>';
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Dentist:</th>
                        <td>
                            <select size="1" name="dentist" required>
                                <option value="">&nbsp;</option>
                                <?php
                                if ($dentist_ID == "1")
                                    echo '<option value="1" selected>Dr. Lee</option>';
                                else
                                    echo '<option value="1">Dr. Lee</option>';

                                if ($dentist_ID == "2")
                                    echo '<option value="2" selected>Dr. Lim</option>';
                                else
                                    echo '<option value="2">Dr. Lim</option>';

                                if ($dentist_ID == "3")
                                    echo '<option value="3" selected>Dr. Yee</option>';
                                else
                                    echo '<option value="3">Dr. Yee</option>';
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Patient:</th>
                        <td>
                            <input type="text" disabled value="<?= $patient; ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>Action:</th>
                        <td colspan="2" align="left">
                            <input type="submit" value="Submit" name="B1">
                            <input type="reset" value="Reset" name="B2" onclick="resetForm()">
                            <input type="button" value="Clear" name="B3" onclick="clearForm()">
                        </td>
                    </tr>
                </table>
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