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
    <?php
    if (!isset($_SESSION["UID"])) {
        include 'header_public.php';
    } else {
        include 'header.php';
    }
    ?>

    <div class="section-header">
        <h2>Treatment</h2>
        <p>In treatment, users able to view the services we provided. </p>
    </div>

    <?php
    echo '<div id="treatmentBtn">
            <div class="editTreatmentBtn">
                <a href="treatment_details.php">Edit treatment details</a>
            </div>
        </div>'
    ?>

    <table id="treatment">
        <?php
        $sql = "SELECT treatment_name, treatment_details, treatment_imgpath FROM treatment";
        $result = mysqli_query($conn, $sql);
        $img = "";
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $numrow = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $img = "uploads/Treatment/" . $row["treatment_imgpath"];
                echo "<tr><td style=\"width:20%\"><img class=\"image\" src=" . $img . "></td>";
                echo "<td><a>" . $row["treatment_name"] . "</a><br> " . $row["treatment_details"] . "</td>";
                echo "</tr>" . "\n\t\t";
                $numrow++;
            }
        } else {
            echo '<tr><td colspan="2">0 results</td></tr>';
        }
        mysqli_close($conn);
        ?>
    </table>

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
        <?php if (isset($_SESSION["UID"]) && $_SESSION["userRoles"] != 1) : ?>
            document.getElementById('treatmentBtn').style.display = 'block';
        <?php else : ?>
            document.getElementById('treatmentBtn').style.display = 'none';
        <?php endif; ?>
    </script>
</body>

</html>