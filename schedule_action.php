<?PHP
session_start();
include('config.php');
//variables
$action = "";
$id = $_SESSION["id"];
$date = "";
$session = "";
$dentist = " ";
$patient = "";
$userID = $_SESSION["UID"];

//this block is called when button Submit is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //values for add or edit
    $date = $_POST["date"];
    $session = $_POST["session"];
    $dentist = $_POST["dentist"];

    $sql1 = "SELECT date, session FROM appointment WHERE date = '$date' AND session = $session";
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO appointment (date, session, dentist_id, patient_id, userID) 
        VALUES ('$date', $session, $dentist, $id, $userID)";
        $status = insertTo_DBTable($conn, $sql);
        if ($status) {
            echo "Appointment booked successfully!<br>";
            echo '<a href="schedule.php">Back</a>';
        } else {
            echo '<a href="schedule.php">Back</a>';
        }
    }
    else {
        echo "ERROR: Sorry, the slot is not unavailable. <br>Kindly choose another slot please. Thank you<br>";
        echo '<a href="schedule.php">Back</a>';
    }
}
//close db connection
mysqli_close($conn);

//Function to insert data to database table
function insertTo_DBTable($conn, $sql) {
    if (mysqli_query($conn, $sql)) {
        return true;
    }
    else {
        echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>";
        return false;
    }
}
