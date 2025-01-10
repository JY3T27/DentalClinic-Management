<?PHP
session_start();
include('config.php');
//variables
$action = "";
$id = "";
$date = "";
$session = "";
$dentist = " ";
$patient = "";
//this block is called when button Submit is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //values for add or edit
    $id = $_POST["sid"];
    $date = $_POST["date"];
    $dentist = $_POST["dentist"];
    $session = $_POST["session"];

    $sql1 = "SELECT date, session, dentist_ID FROM appointment WHERE date = '$date' AND session = $session";
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    $date1 = $row["date"];
    $session1 = $row["session"];

    if (mysqli_num_rows($result) == 0 || ($date1 == $date && $session1 == $session)) {
        $sql = "UPDATE appointment 
        SET date = '$date', session = $session, dentist_id = $dentist
        WHERE ap_id = " . $id;
        $status = update_DBTable($conn, $sql);
        if ($status) {
            echo "Form data updated successfully!<br>";
            echo '<a href="schedule.php">Back</a>';
        } else {
            echo '<a href="schedule.php">Back</a>';
        }
    }
    else {
        echo "ERROR: Sorry, the slot is not unavailable.<br>";
    }
}
//close db connection
mysqli_close($conn);

//Function to insert data to database table
function update_DBTable($conn, $sql)
{
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>";
        return false;
    }
}
