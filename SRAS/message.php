<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
// connect with database
$dbuser = "root";
$dbpass = "";
$host = "localhost";
$dbname = "hostel"; // Use the same database name as in the first code snippet

// Create a MySQLi connection
$mysqli = new mysqli($host, $dbuser, $dbpass, $dbname);

// Check for MySQLi connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
// getting user message through ajax
$getMesg = mysqli_real_escape_string($mysqli, $_POST['text']);

//checking user query to database query
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($mysqli, $check_data) or die("Error");

// if user query matched to database query we'll show the reply otherwise it go to else statement
if(mysqli_num_rows($run_query) > 0){
    //fetching replay from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $replay = $fetch_data['replies'];
    /*original code
    echo $replay;
}else{
    //echo "Sorry can't be able to understand you!";
    echo "Please retype your request/response";
}

*/
   // Replace line breaks with <br> tags
   $replay = nl2br($replay);

   // Echo the reply
   echo $replay;
} else {
   // If no match, echo a message
   echo "Please retype your request/response";
}
?>