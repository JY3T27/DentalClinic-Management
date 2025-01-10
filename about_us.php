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
<?php 
    if(!isset($_SESSION["UID"])){
        include 'header_public.php';
    } else{
        include 'header.php';
    }
    ?>

    <div class="section-header">
        <h2>About Us</h2>
        <p>We are <b>Dental Clinic</b><br>
            Experience Exceptional Dental Care</p>
    </div>
    <div class="about">
        <section id="dental" style="padding-top:0px">
            <h3>Our dental clinic in Sabah</h3>
            <img class="image" src="images/dental_clinic.jpg">
            <p>Jalan UMS, 88400 Kota Kinabalu, Sabah, Malaysia</p>
        </section>
        <div class="row"> 
        <?php
            $sql = "SELECT * FROM dentistprofile
                    INNER JOIN user ON dentistprofile.userID = user.userID";
            $result = mysqli_query($conn, $sql);
            
		    if ($result && mysqli_num_rows($result) > 0) {
                 while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-placeholder">';
                    echo '<div class="placeholder-container">';
            
                    // Display dentist picture or a default placeholder
                    $picture = $row["dentist_picture"];
                    if ($picture != "") {
                        echo '<img src="uploads/' . $picture . '" alt="Avatar" class="avatar">';
                    } else {
                        echo '<img src="images/doc-placeholder.jpg" alt="Avatar" class="avatar">';
                    }

                    echo '</div>'; 
                    echo '<br><br>';
                    echo '</div>';

                    echo '<div class="col-details">';
                    echo '<br>';
                    echo '<h2><strong> DR. ' . strtoupper($row['dentist_firstname']) . ' ' . strtoupper($row['dentist_lastname']) . '<br></h2>';
                    echo '<p style="text-align:left">' . $row['userEmail'] . '</p>';
                    echo '<p style="text-align:left">Experienced Dentist</p>';
                    echo '</div>';
                 }
            }
        ?>
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