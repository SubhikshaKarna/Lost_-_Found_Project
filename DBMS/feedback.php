<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $feedback = $_POST["feedback"];

    // Create a database connection (replace with your database credentials)
    $conn = new mysqli("localhost", "root", "", "regs"); 
    if ($conn->connect_error) {
        die("Failed to connect : " . $conn->connect_error);
    }

    // Prepare and execute SQL statement to insert feedback into the database
    $stmt = $conn->prepare("INSERT INTO feedback (name, email, feedback) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $feedback);

    if ($stmt->execute()) {
        echo '<div style="text-align: center; margin-top: 20px;">';
        echo '<p style="font-weight: bold; font-size: 18px;">Feedback submitted successfully!</p>';
        // Include a button that leads to started.html with CSS
        echo '<br><a href="started.html"><button style="padding: 10px; background-color: deepskyblue; color: white; border: none; border-radius: 25px; cursor: pointer;">Go to Dashboard</button></a>';
        echo '</div>';
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>

