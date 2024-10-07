<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Bank Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Create a New Account</h1>
        <a href="index.php">Home</a>
    </header>
    <section>
        <form method="POST" action="">
            <label for="acc_name">Account Name:</label>
            <input type="text" name="acc_name" id="acc_name" required><br>

            <label for="userid">User ID:</label>
            <input type="text" name="userid" id="userid" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>

            <label for="balance">Initial Balance:</label>
            <input type="number" step="0.01" name="balance" id="balance" required><br>

            <input type="submit" name="signup" value="Create Account">
        </form>
    </section>
</body>
</html>

<?php
if (isset($_POST['signup'])) {
    $acc_name = $_POST['acc_name'];
    $userid = $_POST['userid'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $balance = $_POST['balance'];

    // Insert into database
    $sql = "INSERT INTO accounts (Acc_Name, Balance, UserId, Password) VALUES ('$acc_name', $balance, '$userid', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Account created successfully! <a href='login.php'>Login here</a>.</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}
?>
