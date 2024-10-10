<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bank Management System</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <header>
        <nav>
        <h2>Login to</h2>
        <h1>Your Account</h1>
        <div id="des">
            <p>Zeta Bank's system is a secure, efficient platform designed to manage all banking operations seamlessly. It supports a wide range of services, including account management, transactions, loans, and digital banking. The system integrates cutting-edge technology to ensure fast processing, user-friendly interfaces, and robust security for customer data.</p>
            <button id="hb"><a href="index.html">Home</a></button>
        </div>
        
        </nav>
    </header>
    <section>
        <form method="POST" action="">
            <label for="userid">User ID:</label>
            <input type="text" name="userid" id="userid" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>

            <button type="submit">Login</button>
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
