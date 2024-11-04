<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Bank Management System</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <header>
        <nav>
        <h2>Create</h2>
        <h1>New Account</h1>
        <div id="des">
            <p>Zeta Bank is a modern financial institution focused on providing innovative banking solutions, excellent customer service, and a secure digital experience. It offers a range of personal and business banking services tailored to meet the needs of its clients.</p>
            <button id="hb"><a href="index.html">Home</a></button>
        </div>
        
        </nav>
    </header>
    <section>
        <div id="log">
        <form method="POST" action="">
            <label for="acc_name">Account Name:</label><br>
            <input type="text" name="acc_name" id="acc_name" required><br>

            <label for="userid">User ID:</label><br>
            <input type="text" name="userid" id="userid" required><br>

            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required><br>

            <label for="balance">Initial Balance:</label><br>
            <input type="number" step="0.01" name="balance" id="balance" required><br>

            <button type="submit" name="signup">Submit</button>
            </div>
        </form>
    </section><br>
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
        echo "<p>Account created successfully!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}
?>
