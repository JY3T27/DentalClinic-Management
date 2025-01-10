<?php
session_start();
include("config.php");
?>

<html>

<head>
    <title>Login Action</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>

<body>
    <h2>Login Information</h2>
    <?php
    //login values from login form
    $nurseIc = $_POST['nurseIc'];
    $userPwd = $_POST['userPwd'];

    $sql = "SELECT * FROM nurseprofile
            INNER JOIN user ON user.userID = nurseprofile.userID
            WHERE IcNo='$nurseIc' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        //check password hash
        $row = mysqli_fetch_assoc($result);
        if (password_verify($_POST['userPwd'], $row['userPwd'])) {
            $_SESSION["UID"] = $row["userID"]; //the first record set, bind to userID
            $_SESSION["nurseIc"] = $row["IcNo"];
            $_SESSION["id"] = $row["nurse_ID"];
            $_SESSION["userRoles"] = $row["userRoles"];
            //set logged in time
            $_SESSION['loggedin_time'] = time();
            header("location:nurse_login.php");
        } else {
            echo 'Login error, user ic and password is incorrect.<br>'; //user email & pwd not correct
            echo '<a href="nurse_login.php?login=1"> | Login |</a> &nbsp;&nbsp;&nbsp; <br>';
        }
    } else {
        echo "Login error, user <b>$nurseIc</b> does not exist. <br>"; //user not exist
        echo '<a href="nurse_login.php?login=1"> | Login |</a>&nbsp;&nbsp;&nbsp; <br>';
    }
    mysqli_close($conn);
    ?>
</body>

</html>