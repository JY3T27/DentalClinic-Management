<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dental Management</title>

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
        <h2>Transaction</h2>
    </div>

    <div class="transaction">
        <h3> Payment Pending</h3>

        <table id="tabler">
            <tr>
                <th width="10%">No.</th>
                <th width="30%">Date & Session</th>
                <th width="35%">Treatment</th>
                <th width="25%">Action</th>
            </tr>
            <?php
            $sql = "SELECT * FROM payment 
                    INNER JOIN medicalreport ON payment.mr_id = medicalreport.mr_id
                    INNER JOIN appointment ON medicalreport.ap_id = appointment.ap_id
                    INNER JOIN treatment ON medicalreport.treatment_id = treatment.treatment_id
                    WHERE patient_ID = " . $_SESSION["id"];
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $numrow = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row["payment_status"] == 0) {
                        echo "<tr>";
                        echo "<td>" . $numrow . "</td><td>" . $row["date"] . " Session: " . $row["session"] . "</td><td>"
                            . $row["treatment_name"] . "</td>";
                        echo '<td> <a href="transaction_pay.php?id=' . $row["payment_ID"] . '">Make Payment</a>';
                        echo "</tr>" . "\n\t\t";
                        $numrow++;
                    } else {
                        continue;
                    }
                }
            } else {
                echo '<tr><td colspan="4">0 results</td></tr>';
            }
            ?>
        </table>
    </div>

    <div class="transaction">
        <h3> Transaction Record </h3>

        <div class="searchBar">
            <form method="POST" action="transaction_search.php">
                <label for="dateSearch">Choose a date to view transaction record:&nbsp;</label>
                <input type="date" id="dateSearch" name="date" required>&nbsp;&nbsp;
                <button type="submit" value="Search"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <table id="tabler">
            <tr>
                <th width="10%">No.</th>
                <th width="20%">Date & Session</th>
                <th width="25%">Treatment</th>
                <th width="25%">Amount paid</th>
                <th width="20%">Payment date</th>
            </tr>
            <?php
            $sql = "SELECT * FROM payment 
                    INNER JOIN medicalreport ON payment.mr_id = medicalreport.mr_id
                    INNER JOIN appointment ON medicalreport.ap_id = appointment.ap_id
                    INNER JOIN treatment ON medicalreport.treatment_id = treatment.treatment_id
                    WHERE patient_ID = " . $_SESSION["id"];
            $result = mysqli_query($conn, $sql);
            // Flag to check if any completed payments are found
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                $numrow = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row["payment_status"] == 1) {
                        echo "<tr>";
                        echo "<td>" . $numrow . "</td><td>" . $row["date"] . " Session: " . $row["session"] . "</td><td>"
                            . $row["treatment_name"] . "</td><td>" . $row["payment_amount"] . "</td><td>" . $row["payment_date"] . "</td>";
                        echo "</tr>" . "\n\t\t";
                        $numrow++;
                    } else {
                        continue;
                    }
                }
            } else {
                echo '<tr><td colspan="5">0 results for completed payments</td></tr>';
            }

            mysqli_close($conn);
            ?>
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