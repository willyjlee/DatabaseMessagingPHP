<?php
//insertnew.php

 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['message_content']) && isset($_POST['message_time'])) {
 
    $content = $_POST['message_content'];
    $time = $_POST['message_time'];
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row (idioms)
    $result = mysql_query("INSERT INTO message_table(message_content, message_time) VALUES('$content', '$time')");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "new message saved....";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>