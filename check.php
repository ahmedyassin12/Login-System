<?php
// connect to the database
$conn = mysqli_connect("SPIDER12", "trao", "trao", "trao");

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// process the form when it is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get the form data
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // check if the username and password are correct
    $c = "SELECT username FROM accounts WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $c);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    // if the username and password are correct, redirect to the mainsite page
    if (mysqli_stmt_num_rows($stmt) > 0) {
        header("Location: mainsite.php");
        exit();

    } else {
        // if the username and password are incorrect, redirect back to the login page and display an error message
        header("Location: index.php");
        exit();
    }

    // close the database connection
    mysqli_close($conn);
}
?>
