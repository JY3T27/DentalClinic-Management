<?php
include('config.php');
//this action is called when the help's done link is clicked
if (isset($_GET["id"]) && $_GET["id"] != "") {
    $id = $_GET["id"];
    $status = "Done";

    $sql = "UPDATE helpcenter SET status = '$status' WHERE hc_id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "The question have been updated successfully!<br>";
        echo '<a href="help_all.php">Back</a>';
    } else {
        echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>";
        echo '<a href="help_all.php">Back</a>';
    }
}
mysqli_close($conn);
