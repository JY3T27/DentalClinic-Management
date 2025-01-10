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

    <!--Icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .input-icons i {
            position: absolute;
        }
        .input-icons {
            width: 100%;
            margin-bottom: 10px;
        }
        .icon {
            padding: 10px;
            color: #50A08C;
            min-width: 50px;
            text-align: center;
        }
        .input-field {
            width: 100%;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="section-header">
        <h2>Help Center</h2>
        <p>If there are any questions, please provide your information below.<br> 
        We will get back to you as soon as possible.</p>
    </div>
    <div style="padding:0 10px;" id="help">
        <form method="POST" action="help_action.php" enctype="multipart/form-data" id="myForm" style="max-width:450px;margin:auto">
            <table id="myTable">
                <tr>
                    <td>
                        <a>Subject</a><br>
                        <div class="input-icons">
                            <i class="fa fa-paper-plane icon"></i>
                            <input style="background-color: #CBDBD3" class="form-control" type="text" name="subject" placeholder="Subject" size="100" required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a>Message</a><br>
                        <div class="input-icons">
                            <i class="fa fa-comments-o icon"></i>
                            <input style="background-color: #CBDBD3" class="form-control" type="text" name="message" placeholder="Enter your message here..." size="100" required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <input type="submit" class="form-control" value="Submit" name="B1">
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