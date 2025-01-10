<?php
include('config.php');
//this action is called when the Delete link is clicked
if (isset($_GET["id"]) && $_GET["id"] != "") {
    $id = $_GET["id"];

    $sql = "SELECT treatment_imgpath FROM treatment WHERE treatment_ID =" . $id . ";";
    $sql .= "DELETE FROM treatment WHERE treatment_ID =" . $id . ";";

    try {
        if (mysqli_multi_query($conn, $sql)) {
            if ($result = mysqli_store_result($conn)) {
                $row = mysqli_fetch_row($result);
                if ($row[0] != "") {
                    $filename = "uploads/Treatment/" . $row[0];
                    unlink($filename);
                }
            }
            echo "Record deleted successfully<br>";
            echo '<a href="treatment_detail.php">Back</a>';
        }
    } catch (Exception $e) {
        echo "Error deleting record: " . mysqli_error($conn) . "<br>";
        echo '<a href="treatment_detail.php">Back</a>';
        echo 'Message: ' . $e->getMessage();
    }
}
mysqli_close($conn);
