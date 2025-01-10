<?PHP
session_start();
include('config.php');

//variables
$action = "";
$id = "";
$subject = " ";
$message = "";

//this block is called when button Submit is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //values for add or edit
    $id = $_SESSION["id"];
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    //Upload
    $sql =  "INSERT INTO helpcenter (subject, message, patient_ID)
					VALUES ('$subject', '$message', '$id')";
    $status = insertTo_DBTable($conn, $sql);
    if ($status) {
        echo "Your question have been sent to admin successfully!<br>The admin will reply you by email asap.<br>";
        echo '<a href="help.php">Back</a>';
    } else {
        echo 'Error submiting your question. Try again later.<br>';
        echo '<a href="help.php">Back</a>';
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
