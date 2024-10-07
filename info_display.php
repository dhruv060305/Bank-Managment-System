<?php include("config.php"); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Information - Bank Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Welcome to Your Account, <?php echo $_SESSION['Acc_Name']; ?>!</h1>
        <nav>
            <a href="index.php">Home</a>
            <!-- <a href="money_transfer.php">Transfer Money</a> -->
            <a href="transfer.php">Transfer Money</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    <section>
        <h2>Your Account Details:</h2>
        <p><strong>Account Number:</strong> <?php echo $_SESSION['Acc_No']; ?></p>
        <p><strong>Account Name:</strong> <?php echo $_SESSION['Acc_Name']; ?></p>
        <p><strong>Current Balance:</strong> <?php echo $_SESSION['Balance']; ?></p>
    </section>
</body>
</html>
