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
        <h2>Schedule</h2>
        <p>In schedule, users can conveniently view schedules<br> for managing and organizing their appointments.</p>
    </div>

    <div class="schedule">
        <?php
        if (isset($_SESSION["UID"]) && $_SESSION["userRoles"] == 1){
            echo '<div class="searchBar">
                    <form method="POST" action="schedule_search1.php">
                        <label for="dateSearch">Choose a date to view schedule:&nbsp;</label>
                        <input type="date" id="dateSearch" name="date" required>&nbsp;&nbsp;
                        <button type="submit" value="Search"><i class="bi bi-search"></i></button>
                    </form>
                </div>';
        } 
        else {
            echo '<div class="searchBar">
                    <form method="POST" action="schedule_search2.php">
                        <label for="dateSearch">Choose a date to view schedule:&nbsp;</label>
                        <input type="date" id="dateSearch" name="date" required>&nbsp;&nbsp;
                        <button type="submit" value="Search"><i class="bi bi-search"></i></button>
                    </form>
                </div>';
        }
        
        $date = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $date = $_POST["date"];
        }
        echo "<h3>Search date: " . $date . "</h3>";
        ?>

        <table id="tabler">
            <tr>
                <th width="30%">Session</th>
                <th width="25%">Dentist</th>
                <th width="25%">Appointment</th>
                <th width="20%">Action</th>
            </tr>
            <tr>
                <?php
                $dentist = "";
                $user = "";

                echo '</td><td>1 (From 8:00am to 11:30am)</td>';
                if (isset($date)) {
                    $sql = "SELECT appointment.ap_id, dentistprofile.dentist_lastname, patientprofile.patient_lastname 
                    FROM appointment INNER JOIN dentistprofile 
                    ON appointment.dentist_id = dentistprofile.dentist_ID
                    INNER JOIN patientprofile ON appointment.patient_id = patientprofile.patient_id
                    WHERE appointment.date = \"$date\"  AND appointment.session = 1;";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $dentist = $row["dentist_lastname"];
                        $patient = $row["patient_lastname"];

                        echo "<td>Dentist: Dr." . $dentist . "</td><td>Patient: " . $patient . "</td>";
                        echo '<td> <a href="schedule_edit.php?id=' . $row["ap_id"] . '">Edit</a>&nbsp;|&nbsp;';
                        echo '<a href="schedule_delete.php?id=' . $row["ap_id"] . '" onClick="return confirm(\'Delete?\');">Delete</a> </td>';
                    } else {
                        echo '<td></td><td>Available</td><td></td>';
                    }
                }
                ?>
            </tr>
            <tr>
                <?php
                $date = "";
                $dentist = "";
                $user = "";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $date = $_POST["date"];
                }
                echo '<td>2 (From 1pm to 2:30pm)</td>';
                if (isset($date)) {
                    $sql = "SELECT appointment.ap_id, dentistprofile.dentist_lastname, patientprofile.patient_lastname 
                    FROM appointment INNER JOIN dentistprofile 
                    ON appointment.dentist_id = dentistprofile.dentist_ID
                    INNER JOIN patientprofile ON appointment.patient_id = patientprofile.patient_id
                    WHERE appointment.date = \"$date\"  AND appointment.session = 2;";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $dentist = $row["dentist_lastname"];
                        $patient = $row["patient_lastname"];

                        echo "<td>Dentist: Dr." . $dentist . "</td><td>Patient: " . $patient . "</td>";
                        echo '<td> <a href="schedule_edit.php?id=' . $row["ap_id"] . '">Edit</a>&nbsp;|&nbsp;';
                        echo '<a href="schedule_delete.php?id=' . $row["ap_id"] . '" onClick="return confirm(\'Delete?\');">Delete</a> </td>';
                    } else {
                        echo '<td></td><td>Available</td><td></td>';
                    }
                }
                ?>
            </tr>
            <tr>
                <?php
                $date = "";
                $dentist = "";
                $user = "";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $date = $_POST["date"];
                }
                echo '<td>3 (From 2:30pm to 5pm)</td>';
                if (isset($date)) {
                    $sql = "SELECT appointment.ap_id, dentistprofile.dentist_lastname, patientprofile.patient_lastname 
                    FROM appointment INNER JOIN dentistprofile 
                    ON appointment.dentist_id = dentistprofile.dentist_ID
                    INNER JOIN patientprofile ON appointment.patient_id = patientprofile.patient_id
                    WHERE appointment.date = \"$date\"  AND appointment.session = 3;";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $dentist = $row["dentist_lastname"];
                        $patient = $row["patient_lastname"];

                        echo "<td>Dentist: Dr." . $dentist . "</td><td>Patient: " . $patient . "</td>";
                        echo '<td> <a href="schedule_edit.php?id=' . $row["ap_id"] . '">Edit</a>&nbsp;|&nbsp;';
                        echo '<a href="schedule_delete.php?id=' . $row["ap_id"] . '" onClick="return confirm(\'Delete?\');">Delete</a> </td>';
                    } else {
                        echo '<td></td><td>Available</td><td></td>';
                    }
                }
                ?>
            </tr>
        </table>
        <?php
        echo '<div id="scheduleBtn">
                <div class="buton">
                    <input type="button" value="Add New" onclick="show_AddEntry()">
                </div>
            </div>'
        ?>
        <?php
        mysqli_close($conn);
        ?>
        <div style="padding:0 10px;" id="scheduleAdd">
            <div class="section-header">
                <h2>Make Appointment</h2>
            </div>

            <form method="POST" action="schedule_action.php" enctype="multipart/form-data" id="myForm">
                <table>
                    <tr>
                        <th>Date:</th>
                        <td>
                            <input type="date" id="date" name="date" required>&nbsp;&nbsp;
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <th>Session:</th>
                        <td>
                            <select size="1" name="session" required>
                                <option value="">&nbsp;</option>
                                <option value="1">1</option>;
                                <option value="2">2</option>;
                                <option value="3">3</option>;
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Dentist:</th>
                        <td>
                            <select size="1" name="dentist" required>
                                <option value="">&nbsp;</option>
                                <option value="1">Dr. Lee</option>;
                                <option value="2">Dr. Lim</option>;
                                <option value="3">Dr. Yee</option>;
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Action:</th>
                        <td colspan="2" align="left">
                            <input type="submit" value="Submit" name="B1">
                            <input type="reset" value="Reset" name="B2">
                        </td>
                    </tr>
                </table>
                <input type="hidden" name="__ncforminfo" />
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

    <!-- function for btn show for specific user only -->
    <script type="text/javascript">
        // JavaScript code to show the button only if the user is logged in
        <?php if (isset($_SESSION["UID"]) && $_SESSION["userRoles"] == 1) : ?>
            document.getElementById('scheduleBtn').style.display = 'block';
        <?php else : ?>
            document.getElementById('scheduleBtn').style.display = 'none';
        <?php endif; ?>
    </script>
</body>

</html>