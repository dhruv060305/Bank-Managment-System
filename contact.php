<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Bank Management System</title>
    <link rel="stylesheet" href="css/style6.css">
</head>
<body>
    <header>
        <h1>Contact Us</h1>
        <h2>We'd Love to Hear From You</h2>
        <p>Zeta Bank is a modern financial institution focused on providing innovative banking solutions, excellent customer service, and a secure digital experience. It offers a range of personal and business banking services tailored to meet the needs of its clients.</p>
        <nav>
        <button><a href="index.html">Home</a> </button>
        </nav>
    </header>
    <section>
        
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" required></textarea><br>

            <button type="submit" name="submit">Send Messages</button>
        </form>
    </section>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insert message into the database
    $sql = "INSERT INTO messages (Name, Email, Message) VALUES ('$name', '$email', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Thank you for contacting us. We will get back to you soon!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}
?>
