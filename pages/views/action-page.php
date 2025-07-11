<?php

$servername = "ls-b53c0ae7c63e08f5187c48ef3a20b2501a6b6efb.c1aso2icslus.eu-west-2.rds.amazonaws.com";
$username = "dbmasteruser";
$password = ";#w34Ek89U!>Wc9IJ8:O`EUmuL&DqY8e";
$database = "csx2";





if(!isset($_COOKIE['not_unique12'])) {
    setcookie('not_unique12', '1', time() + (86400 * 30)); //30 days

    // Establish database connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // SQL query to increment the like count
    $sql = "UPDATE likes2 SET count = count + 1 WHERE ID = 1";

    // Execute the query and check for errors
    if ($conn->query($sql) === TRUE) {
        echo "Like count updated successfully.";
    } else {
        echo "Error updating like count: " . $conn->error;
    }
}



// Redirect the user (use absolute URLs)
// header("Location: https://computersciencex.com/pages/free-content.php", true, 301);

// Close the database connection
$conn->close();

?>