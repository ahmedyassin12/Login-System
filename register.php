<?php
// connect to the database
$conn = mysqli_connect("localhost", "trao", "trao", "trao");

// check connection
if (!$conn) {
    echo "ezbyy " ; 
    die("Connection failed: " . mysqli_connect_error());
}



// process the form when it is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get the form data
    $username = mysqli_real_escape_string($conn, $_POST["username"]);

    error_reporting(E_ALL);
ini_set('display_errors', '1');
    // check if the username already exists
    $c = "SELECT username FROM accounts WHERE username = ?";
    $stmt = mysqli_prepare($conn, $c);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $username_found = mysqli_stmt_num_rows($stmt) > 0;

    // if the username was not found, insert the user's data into the accounts table
    if (!$username_found) {
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);

        $sql = "INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $username, $password, $email);

   
        if (mysqli_stmt_execute($stmt)) {
            // Close the statement before sending headers
            mysqli_stmt_close($stmt);

            // Redirect to the specified URL
            header("Location: https://film67.godaddysites.com");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Username already exists!";
    }

    // close the database connection
    mysqli_close($conn);
}
?>
