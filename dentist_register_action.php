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
    $dentistIc = mysqli_real_escape_string($conn, $_POST['IcNo']);
    $userEmail = mysqli_real_escape_string($conn, $_POST['userEmail']);
    $userPwd = mysqli_real_escape_string($conn, $_POST['userPwd']);
    $confirmPwd = mysqli_real_escape_string($conn, $_POST['confirmPwd']);
    //Validate pwd and confrimPwd
    if ($userPwd !== $confirmPwd) {
    die("Password and confirm password do not match.");
    }

    //STEP 2: Check if userEmail already exist
    $sql = "SELECT * FROM user WHERE userEmail='$userEmail' or IcNo='$dentistIc' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        echo "<p ><b>Error: </b> User exist, please register a new user</p>";
    } else {
        // User does not exist, insert new user record, hash the password
        $pwdHash = trim(password_hash($_POST['userPwd'], PASSWORD_DEFAULT));
        //echo $pwdHash;
        $sql = "INSERT INTO user (IcNo, userEmail, userPwd, userRoles, registrationDate ) 
        VALUES ('$dentistIc', '$userEmail', '$pwdHash', '3' ,CURRENT_TIMESTAMP)";
        $insertOK=0;

        if (mysqli_query($conn, $sql)) {
            echo "<p>New user record created <b>Successfully</b>.</p>";
            $insertOK=1;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        if($insertOK==1){
            $lastInsertedId = mysqli_insert_id($conn);
            $sql = "INSERT INTO dentistprofile (userID, dentist_ID, dentist_IC, dentist_firstname, dentist_lastname, dentist_mobile, dentist_gender, dentist_address) 
            VALUES ('$lastInsertedId', '','$dentistIc', '','', '','', '')";
            if (mysqli_query($conn, $sql)) {
                echo "<p>Your new profile created successfully. Welcome <b>".$dentistIc."</b> !!</p>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
}
mysqli_close($conn);
?>
<p><a href="dentist_login.php"> | Login |</a></p>
</body>
</html>