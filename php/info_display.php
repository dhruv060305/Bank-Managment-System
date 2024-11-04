<?php include("config.php"); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Information - Bank Management System</title>
    <link rel="stylesheet" href="css/style4.css">
</head>
<body>
    <header>
        <h2>Welcome to Your Account, </h2>
        <h1><?php echo $_SESSION['Acc_Name']; ?>!</h1>
        <nav>
            <!-- <p>Zeta Bank offers a range of advantages designed to enhance your banking experience. With cutting-edge digital services, Zeta Bank ensures fast, secure, and seamless transactions. Customers benefit from competitive interest rates, personalized financial solutions, and 24/7 online access. Additionally, Zeta Bank provides robust security measures, including advanced encryption and fraud protection, ensuring your data and assets are always safe. Flexible loan options, easy savings plans, and excellent customer service make Zeta Bank a reliable choice for both individuals and businesses.</p> -->
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
