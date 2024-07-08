<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$age = (int)$_POST['age']; 

// SQL query to update the user data
$sql = "UPDATE user SET firstname='$firstname', lastname='$lastname', email='$email', age=$age WHERE id=$id";

// Execute the query
if (mysqli_query($conn, $sql)) {
echo "Record updated successfully";
} else {
echo "Error: " . mysqli_error($conn);
}
}

// Close the connection
mysqli_close($conn);

header("Location: table.php");
exit;