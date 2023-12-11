<?php
// Create connection
$conn = new mysqli("localhost", "root", "", "regs");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to count rows in your table (replace 'claimeditem' with your actual table name)
$sql = "SELECT COUNT(*) AS total_rows FROM Founditem";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalRows = $row["total_rows"];
} else {
    $totalRows = 0;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Found Items Count</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>

    <h1>Total number of found items: <?php echo $totalRows; ?></h1>

    <!-- Button to link to started.html -->
    <a href="started.html">
        <button style="padding: 10px; background-color: skyblue; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Go to Dashboard
        </button>
    </a>

</body>
</html>