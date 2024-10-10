<?php include("config.php"); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Information - Bank Management System</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
    <header>
        <h2>Welcome to Your Account, </h2>
        <h1><?php echo $_SESSION['Acc_Name']; ?>!</h1>
        <nav>
            <button><a href="index.html">Home</a></button>
            <!-- <a href="money_transfer.php">Transfer Money</a> -->
            <button><a href="transfer.php">Transfer Money</a></button>
            <button><a href="logout.php">Logout</a></button>
        </nav>
    </header>
    <section>
        <h2>Your Account Details:</h2>
        <p><strong>Account Number:</strong></p>
        <h2> <?php echo $_SESSION['Acc_No']; ?></h2>
        <p><strong>Account Name:</strong></p>
        <h2><?php echo $_SESSION['Acc_Name']; ?></h2>
        <p><strong>Current Balance:</strong></p>
        <h2>$<?php echo $_SESSION['Balance']; ?></h2>
    </section>
</body>
</html>
