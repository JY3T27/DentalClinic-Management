<?php
include("config.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        <?php include "css/style.css" ?>
    </style>
    <!--<link rel="stylesheet" type="text/css" href="mystyle.css">-->
</head>

<body>
<?php
//STEP 1: Form data handling using mysqli_real_escape_string function 
//to escape special characters for use in an SQL query,
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $IcNo = mysqli_real_escape_string($conn, $_POST['IcNo']);
    $userEmail = mysqli_real_escape_string($conn, $_POST['userEmail']);
    $newPwd = mysqli_real_escape_string($conn, $_POST['newPwd']);
    $confirmPwd = mysqli_real_escape_string($conn, $_POST['confirmPwd']);
    //Validate pwd and confrimPwd
    if ($newPwd !== $confirmPwd) {
    die("Password and confirm password do not match.");
    }

    //STEP 2: Check if userEmail already exist and match
    $sql = "SELECT * FROM user WHERE userEmail='$userEmail' or IcNo='$IcNo' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        // hash the password
        $pwdHash = trim(password_hash($_POST['newPwd'], PASSWORD_DEFAULT));
        //echo $pwdHash;
        $sql = "UPDATE user SET userPwd= '$pwdHash' WHERE userEmail='$userEmail' or IcNo='$IcNo'";
        //$insertOK=0;

        if (mysqli_query($conn, $sql)) {
            echo "<p>New password set <b>Successfully</b>.</p>";
            $insertOK=1;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>
<p><a href="patient_login.php"> | Login |</a></p>
</body>
</html>