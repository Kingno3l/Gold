<?php

// Check if the id is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL query to select the user data
    $sql = "SELECT firstname, lastname, email, age FROM users WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No user found with the specified ID.";
        exit;
    }
} else {
    echo "No user ID specified.";
    exit;
}

?>
// Close the connection
mysqli_close($conn);

<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>" required><br>


</form>