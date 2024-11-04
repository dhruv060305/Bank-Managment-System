<?php 
include("config.php"); 
session_start();

// Check if the user is logged in
if (!isset($_SESSION['Acc_No'])) {
    echo "<p>Please log in first to access this page.</p>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Transfer - Bank Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Transfer Money</h1>
    </header>
    <section>
        <form method="POST" action="">
            <label for="sender">Sender Account No:</label>
            <input type="text" name="sender" id="sender" value="<?php echo htmlspecialchars($_SESSION['Acc_No']); ?>" readonly><br>

            <label for="receiver">Receiver Account No:</label>
            <input type="text" name="receiver" id="receiver" required><br>

            <label for="amount">Amount to Transfer:</label>
            <input type="number" step="0.01" name="amount" id="amount" required><br>

            <input type="submit" name="transfer" value="Transfer">
        </form>
    </section>
</body>
</html>

<?php
if (isset($_POST['transfer'])) {
    $sender = $_SESSION['Acc_No'];
    $receiver = $_POST['receiver'];
    $amount = $_POST['amount'];

    // Check if amount is valid
    if ($amount <= 0) {
        echo "<p>Invalid transfer amount.</p>";
        exit;
    }

    // Prepare and execute SQL queries securely using prepared statements
    $sender_check = $conn->prepare("SELECT Balance FROM accounts WHERE Acc_No = ?");
    $sender_check->bind_param("s", $sender);
    $sender_check->execute();
    $result_sender = $sender_check->get_result();

    if ($result_sender->num_rows == 0) {
        echo "<p>Sender account not found.</p>";
        exit;
    }

    $sender_data = $result_sender->fetch_assoc();

    // Check if the sender has sufficient balance
    if ($sender_data['Balance'] >= $amount) {
        // Check if receiver account exists
        $receiver_check = $conn->prepare("SELECT * FROM accounts WHERE Acc_No = ?");
        $receiver_check->bind_param("s", $receiver);
        $receiver_check->execute();
        $result_receiver = $receiver_check->get_result();

        if ($result_receiver->num_rows == 0) {
            echo "<p>Receiver account not found.</p>";
            exit;
        }

        // Begin transaction
        $conn->begin_transaction();

        try {
            // Deduct amount from sender
            $update_sender = $conn->prepare("UPDATE accounts SET Balance = Balance - ? WHERE Acc_No = ?");
            $update_sender->bind_param("ds", $amount, $sender);
            $update_sender->execute();

            // Add amount to receiver
            $update_receiver = $conn->prepare("UPDATE accounts SET Balance = Balance + ? WHERE Acc_No = ?");
            $update_receiver->bind_param("ds", $amount, $receiver);
            $update_receiver->execute();

            // Commit transaction
            $conn->commit();

            echo "<p>Transfer successful!</p>";
        } catch (Exception $e) {
            // Rollback transaction in case of an error
            $conn->rollback();
            echo "<p>Transfer failed. Please try again later.</p>";
        }
    } else {
        echo "<p>Insufficient balance.</p>";
    }
}
?>
