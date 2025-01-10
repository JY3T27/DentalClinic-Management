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

    <div class="reportdetail" id="detailreport">
        <table>
            <h3>All medical report of patients</h3>
            <tr>
                <th width="10%">No</th>
                <th width="15%">Date</th>
                <th width="15%">Session</th>
                <th width="10%">Patient ID</th>
                <th width="20%">Patient's Name</th>
                <th width="20%">Dentist's Name</th>
                <th width="10%">Details</th>
            </tr>
            <?php
            $id = $_SESSION["id"];
            $sql = "SELECT * FROM medicalreport 
					INNER JOIN appointment ON medicalreport.ap_id = appointment.ap_id
					INNER JOIN treatment ON medicalreport.treatment_id = treatment.treatment_id
					INNER JOIN dentistprofile ON appointment.dentist_id = dentistprofile.dentist_ID
					INNER JOIN patientprofile ON appointment.patient_id = patientprofile.patient_ID";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                $numrow = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" .  $numrow . "</td><td>" . $row["date"] . "</td><td>" . $row["session"] . "</td><td>" .
                        $row["patient_ID"] . "</td><td>" . $row["patient_firstname"] . " " . $row["patient_lastname"] . "</td><td>" .
                        "Dr. " . $row["dentist_lastname"] . "</td>";
                    echo '<td> <a href="report_all_details.php?id=' . $row["mr_id"] . '">More</a></td>';
                    echo "</tr>" . "\n\t\t";
                    $numrow++;
                }
            } else {
                echo '<tr><td colspan="7">0 results</td></tr>';
            }
            mysqli_close($conn);
            ?>

            <tr>
                <td colspan="4" style="border: 0px;">
                    <p>Session:<br>
                        1 (From 8:00am to 11:30am)<br>
                        2 (From 1pm to 2:30pm)<br>
                        3 (From 2:30pm to 5pm)</p>
                </td>
                <td colspan="3" style="border: 0px; text-align:right">
                    <input type="button" value="Add New" onclick="show_AddEntry()">
                </td>
            </tr>
        </table>
    </div>
    <div style="padding:0 10px;" id="scheduleAdd">
        <div class="section-header">
            <h2>Make Appointment</h2>
        </div>

        <form method="POST" action="report_all_action.php" enctype="multipart/form-data" id="myForm">
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
                    <th>Treatment:</th>
                    <td>
                        <select size="1" name="treatment" required>
                            <option value="">&nbsp;</option>
                            <option value="1">Consultation</option>;
                            <option value="2">Whitening</option>;
                            <option value="3">Extraction</option>;
                            <option value="4">Braces</option>;
                            <option value="5">Root Canal Treatment</option>;
                            <option value="6">Crown and Bridge</option>;
                            <option value="7">Denture</option>;
                            <option value="8">Periodontics</option>;
                            <option value="9">Preventive</option>;
                            <option value="10">Filling</option>;
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Remark:</th>
                    <td>
                        <textarea name="remark" id="remark" rows="5" style="width: 100%;">
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <th>Action:</th>
                    <td colspan="2" align="left">
                        <input type="submit" value="Submit" name="B1">
                    </td>
                </tr>
            </table>
            <input type="hidden" name="__ncforminfo" />
        </form>
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