<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost Items</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .item-card {
            border-radius: 10px;
            padding: 20px;
            background-color: #e1e1e1;
            background-image: url('bg14.jpg');
            background-size: cover;
            text-align: left;
            margin-bottom: 20px;
            font-size: 20px;
            color: black;
            font-family: Arial, sans-serif;
        }

        

        .claim-button {
            cursor: pointer;
            padding: 10px 20px;
            background: black;
            color: white;
            border-radius: 70px;
            width: 140px;
            border: none;
            margin: 20px auto 0;
            display: block;
            font-size: 18px;
        }

        .claim-button:hover {
            background: radial-gradient(rgb(43, 29, 4), white);
            width: 120px;
            transition: 0.5s;
            color: white;
        }

        .code-input {
            width: 30%;
            margin: 0 auto;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 80px;
            box-sizing: border-box;
            margin-top: 5px;
            text-align: center;
        }

        hr {
            margin-top: 20px;
            border: 0.5px solid #ddd;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        // Create connection
        $con = new mysqli('localhost', 'root', '', 'regs');

        // Check connection
        if ($con->connect_error) {
            echo "$con->connect_error";
            die("Connection Failed : " . $con->connect_error);
        } else {
            // Prepare and execute SQL statement to select all lost items
            $stmt = $con->prepare("SELECT * FROM lostitem");
            $stmt->execute();

            // Get result set
            $result = $stmt->get_result();

            // Check if there are any lost items
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Display each lost item with the provided CSS
                    echo "<div class='item-card'>";
                    echo "<p><strong>Name:</strong> " . $row['Name'] . "</p>";
                    echo "<p><strong>Item Name:</strong> " . $row['itemName'] . "</p>";
                    echo "<p><strong>Description:</strong> " . $row['description'] . "</p>";
                    echo "<p><strong>Date Lost:</strong> " . $row['dataLost'] . "</p>";
                    echo "<p><strong>Contact Info:</strong> " . $row['contactinfo'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No lost items found.</p>";
            }

            // Close the database connection
            $stmt->close();
            $con->close();
        }
        ?>
    </div>
</body>

</html>
