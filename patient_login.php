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
    <style>
        <?php include "css/style.css" ?>
    </style>
</head>

<body>
    <?php 
    if(!isset($_SESSION["UID"])){
        include 'header_public.php';
    } else{
        include 'header.php';
    }
    ?>
   
    <div class="row">
        <div class="col-login">
        <?php
        if(isset($_SESSION["UID"])){
            ?>
            <div class="imgcontainer">
                <img src="images/profile_icon.jpg" alt="userPic" class="avatar">
            </div>
        <?php
            echo '<p align="center">Welcome: <mark><i>' . $_SESSION["patientIc"] . '</i></mark><p>';
        ?>
        <?php
        } else {
        ?>
            <form action="patient_login_action.php" method="post" id="login">
                <div class="imgcontainer">
                    <img src="images/profile_icon.jpg" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label for="pIc"><b>Patient Ic</b></label>
                    <input type="text" placeholder="Ic No." name="patientIc" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="userPwd" required>

                    <button type="submit">Login</button>
                    <br>
                    <label>
                    <input type="checkbox" checked="checked" name="remember">Remember me
                    </label>
                </div>

                <div class="container" style="background-color:lightblue">
                    <span class="psw">
                        <a onClick="showRegister()" style="cursor: pointer;">Register</a> |
                        <a onClick="showForget()" style="cursor: pointer;">Forgot password?</a>
                    </span>
                </div>
            </form>
        
        </div>
        
        <div class="col-news">
            <div id="newsDiv"> 
                <table border="2" width = "100%" border-collapse="collapse">
				<tr>
                    <td><b>Login, Click</b></br></br>
                    <a onClick a href = "patient_login.php">Patient Login</a> |
                    <a onClick a href = "dentist_login.php">Dentist Login</a> | 
				    <a onClick a href = "nurse_login.php">Nurse Login</a></td>
                </tr>
                </table>
			</div> 
            <div id="registerDiv">
                <h2>| Patient's Registration </h2>
                <form action="patient_register_action.php" method="post">
                    <label for="IcNo">IC No</label>
                    <input type="text" name="IcNo" id="IcNo" required>

                    <label for="userEmail">User Email:</label>
                    <input type="email" id="userEmail" name="userEmail" required><br><br>

                    <label for="userPwd">Password:</label>
                    <input type="password" id="userPwd" name="userPwd" required maxlength="8"><br><br>

                    <label for="userPwd">Confirm Password:</label>
                    <input type="password" id="confirmPwd" name="confirmPwd" required><br><br>

                    <input type="submit" value="Register" style="cursor: pointer;">
                    <input type="reset" value="Reset">
                    <input type="reset" value="Cancel" onClick="cancelRegister()">
                </form>
            </div>
            <div id="forgetDiv">
                <h2>| Password Reset </h2>
                <form action="forgetPasswordnReset_action.php" method="post">
                    <br><br>
                    <h4><mark>*You must use your previous IC and email to <b>SET</b> new password !*</mark></h4><br>

                    <label for="IcNo">IC No: </label><br>
                    <input type="text" name="IcNo" id="IcNo" required><br><br>
                    
                    <label for="userEmail">Your Email:</label>
                    <input type="email" id="userEmail" name="userEmail" required><br><br>

                    <label for="newPwd">New Password:</label>
                    <input type="password" id="newPwd" name="newPwd" required maxlength="8"><br><br>

                    <label for="userPwd">Confirm Password:</label>
                    <input type="password" id="confirmPwd" name="confirmPwd" required><br><br>

                    <input type="submit" value="Confirm" style="cursor: pointer;">
                    <input type="reset" value="Reset">
                    <input type="reset" value="Cancel" onClick="cancelRegister()">
                </form>
            </div>
        </div>
         <?php
        }
        ?>
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



 <!-- ======= Body ======= -->

<script type="text/javascript">
function myFunction(){
    var x = document.getElementById("myTopnav");
    if(x.className === "topnav"){
        x.className += " responsive";
    }else{
        x.className = "topnav";
    }
}

//JS to show div Registration id=registerDiv
function showRegister(){
    var x = document.getElementById("registerDiv");
    x.style.display = 'block';

    var x = document.getElementById("login");
    x.style.display = 'none';

    var x = document.getElementById("forgetDiv");
    x.style.display = 'none';

    var x = document.getElementById("newsDiv");
    x.style.display = 'none';

    var firstField = document.getElementById('IcNo');
    firstField.focus();
}

//JS to show div Registration id=forgetDiv
function showForget(){
    var x = document.getElementById("forgetDiv");
    x.style.display = 'block';

    var x = document.getElementById("login");
    x.style.display = 'none';

    var x = document.getElementById("registerDiv");
    x.style.display = 'none';

    var x = document.getElementById("newsDiv");
    x.style.display = 'none';

    var firstField = document.getElementById('IcNo');
    firstField.focus();
}

//JS to cancel registration & resetPassword by hiding div (display=none)
function cancelRegister(){
    var x = document.getElementById("login");
    x.style.display = 'block';

    var x = document.getElementById("registerDiv");
    x.style.display = 'none';

    var x = document.getElementById("forgetDiv");
    x.style.display = 'none';

    var x = document.getElementById("newsDiv");
    x.style.display = 'block';
}
</script>
</html>