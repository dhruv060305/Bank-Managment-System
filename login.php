<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bank Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Login to Your Account</h1>
        <a href="index.php">Home</a>
    </header>
    <section>
        <form method="POST" action="">
            <label for="userid">User ID:</label>
            <input type="text" name="userid" id="userid" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>

            <input type="submit" name="login" value="Login">
        </form>
    </section>
</body>
</html>

<?php
session_start();
if (isset($_POST['login'])) {
    $userid = $_POST['userid'];
    $password = $_POST['password'];

    // Validate login
    $sql = "SELECT * FROM accounts WHERE UserId = '$userid'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['Password'])) {
            // Store account information in session variables
            $_SESSION['Acc_No'] = $row['Acc_No'];
            $_SESSION['Acc_Name'] = $row['Acc_Name'];
            $_SESSION['Balance'] = $row['Balance'];
            header("Location: info_display.php");
        } else {
            echo "<p>Invalid password. Try again.</p>";
        }
    } else {
        echo "<p>User ID not found.</p>";
    }
}
?>
