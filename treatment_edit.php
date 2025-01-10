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
        <h2>Treatment</h2>
        <p>In treatment, users able to view the services we provided. </p>
    </div>

    <?php
    $id = "";
    $name = "";
    $detail = "";
    $img = "";
    $cost = "";
    if (isset($_GET["id"]) && $_GET["id"] != "") {
        $sql = "SELECT * FROM treatment WHERE treatment_id= '" . $_GET["id"] . "'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row["treatment_name"];
        $detail = $row["treatment_details"];
        $img = $row["treatment_imgpath"];
        $cost = $row["treatment_cost"];
    }
    mysqli_close($conn);
    ?>
    <div class="treatmentEdit">
        <form method="POST" action="treatment_edit_action.php" id="myForm" enctype="multipart/form-data">
            <input type="text" id="tid" name="tid" value="<?= $_GET['id'] ?>" hidden>
            <table>
                <h3>Edit treatment: <?php echo $name ?></h3>
                <tr>
                    <td style="text-align:right">Name:</td>
                    <td>
                        <?php
                        if ($name != "") {
                            echo '<input type="text" name="name" value="' .
                                $name . '" required>';
                        } else {
                        ?>
                            <input type="text" name="name" required>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right">Detail:</td>
                    <td>
                        <textarea rows="8" name="detail" cols="35" required>
                        <?php echo $detail; ?>
                    </textarea>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right">Cost:</td>
                    <td>
                        <?php
                        if ($cost != "") {
                            echo '<input type="text" name="cost" value="' .
                                $cost . '" required>';
                        } else {
                        ?>
                            <input type="text" name="cost" required>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right">Photo:</td>
                    <td>
                        <?php
                        if ($img != "") {
                            echo '<input type="text" name="imgpath" value="' .
                                $img . '" disabled>';
                        } else {
                        ?>
                            <input type="text" name="imgpath" disabled>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right">Upload photo:</td>
                    <td>
                        Max size: 488.28KB<br>
                        <input type="file" name="fileToUpload" id="fileToUpload" accept=".jpg, .jpeg, .png">
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" value="Submit" name="B1">
                        <input type="reset" value="Reset" name="B2" onclick="resetForm()">
                        <input type="button" value="Clear" name="B3" onclick="clearForm()">
                    </td>
                </tr>
            </table>
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