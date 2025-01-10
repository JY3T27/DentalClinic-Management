<?php
session_start();
    if(isset($_SESSION["UID"])){
        unset($_SESSION["UID"]);
        unset($_SESSION["patientIc"]);
        header("location:patient_login.php");
    }

    if(isset($_SESSION["UID"])){
        unset($_SESSION["UID"]);
        unset($_SESSION["nurseIc"]);
        header("location:patient_login.php");
    }

    if(isset($_SESSION["UID"])){
        unset($_SESSION["UID"]);
        unset($_SESSION["dentistIc"]);
        header("location:patient_login.php");
    }

?>