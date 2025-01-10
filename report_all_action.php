<?PHP
session_start();
include('config.php');
//variables
$action = "";
$id = $_SESSION["id"];
$date = "";
$session = "";
$treament = "";
$remark = "";
$ap_id = "";
$mr_id = "";
$report_status = false;

//this block is called when button Submit is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //values for add or edit
    $date = $_POST["date"];
    $session = $_POST["session"];
    $treatment = $_POST["treatment"];
    $remark = $_POST["remark"];

    $sql1 = "SELECT ap_id FROM appointment WHERE date = '$date' AND session = $session";
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    $ap_id = $row["ap_id"];

    $sql = "INSERT INTO medicalreport (ap_id, treatment_id, remark) 
        VALUES ($ap_id, $treatment, '$remark')";
    $status = insertTo_DBTable($conn, $sql);
    if ($status) {
        $report_status = true;
        echo "New medical report added successfully!<br>";        
    } else {
        echo 'Error adding new medical report<br>';
        echo '<a href="report_all.php">Back</a>';
    }
}

if ($report_status) {
    //select medical report id 
    $sqlmr = "SELECT mr_id FROM medicalreport WHERE ap_id = '$ap_id'";
    $resultmr = mysqli_query($conn, $sqlmr);
    $rowmr = mysqli_fetch_assoc($resultmr);
    $mr_id = $rowmr["mr_id"];

    $sqlpay = "INSERT INTO payment (mr_id) VALUES ($mr_id)";
    $statuspay = insertTo_DBTable($conn, $sqlpay);
    if ($statuspay) {
        echo "New payment added successfully to payment table.<br>";
        echo '<a href="report_all.php">Back</a>';
    } else {
        echo "Error adding to payment table<br>";
        echo '<a href="report_all.php">Back</a>';
    }
}

//close db connection
mysqli_close($conn);

//Function to insert data to database table
function insertTo_DBTable($conn, $sql) {
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>";
        return false;
    }
}
