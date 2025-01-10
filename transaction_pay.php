<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Making Payment</title>
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

    <div class="section-header" style="padding-bottom: 30px;">
        <h2>Transaction</h2>
    </div>

    <div class="receipt" style="margin-top: 0; margin-bottom: 50px;">

        <?php
        $id = "";
        $name = "";
        $ic = "";
        $treatment = "";
        $treatment_cost = "";

        if (isset($_GET["id"]) && $_GET["id"] != "") {
            $sql = "SELECT * FROM payment 
                    INNER JOIN medicalreport ON payment.mr_id = medicalreport.mr_id
                    INNER JOIN appointment ON medicalreport.ap_id = appointment.ap_id
                    INNER JOIN treatment ON medicalreport.treatment_id = treatment.treatment_id
                    INNER JOIN patientprofile ON appointment.patient_ID = patientprofile.patient_ID 
                    WHERE payment.payment_ID = '" . $_GET["id"] . "'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $id = $row["payment_ID"];
                $name = $row["patient_firstname"] . " " . $row["patient_lastname"];
                $ic = $row["patient_IC"];
                $treatment = $row["treatment_name"];
                $treatment_cost = $row["treatment_cost"];
            }
        }
        mysqli_close($conn);
        ?>

        <div style="padding:0 10px;" id="transactionDiv">
            <form method="POST" action="transaction_pay_action.php" enctype="multipart/form-data">
                <input type="hidden" id="pid" name="pid" value="<?= $_GET['id'] ?>">
                <input type="hidden" id="amount" name="amount" value="<?= $treatment_cost ?>">
                <div style="text-align: center; background-color: #e8e81c;">
                    <h3>Payment Details</h3>
                </div>
                <div class="item">
                    <span>Patient's name:</span>
                    <span><?php echo $name ?></span>
                </div>
                <div class="item">
                    <span>Patient IC:</span>
                    <span><?php echo $ic ?></span>
                </div>
                <div class="item">
                    <span>Type of Treatment:</span>
                    <span><?php echo $treatment ?></span>
                </div>
                <div class="item">
                    <span>Date of payment:</span>
                    <span><?php echo date("Y-m-d"); ?></span>
                </div>
                <div class="item">
                    <span>Payment Method:</span>
                    <span>
                        <select size="1" name="method" id="method" required>
                            <option value="">--Select--</option>
                            <option value="Cash">Cash</option>
                            <option value="TnG">TnG</option>
                            <option value="Bank">Bank</option>
                        </select>
                    </span>
                </div>
                <div class="total">Payment Amount: <?php echo $treatment_cost ?></div>

                <div class="pay-now">
                    <input type="submit" value="Pay Now" name="B1">
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