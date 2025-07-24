<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Food House Reservation</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0; 
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .container {
        width: 400px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
    input, select, button {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    button {
        background-color: #28a745;
        color: white;
        border: none;
        cursor: pointer;
    }
    button:hover {
        background-color: #218838;
    }
</style>
</head>
<body>
<div class="container">
    <?php
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "food_house_db";

    // Establishing the database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieving form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $reservation_date = $_POST['date'];
        $reservation_time = $_POST['time'];
        $people = $_POST['people'];
        $food_choice = $_POST['food'];

        // SQL query to insert reservation data
        $sql = "INSERT INTO reservations (name, email, reservation_date, reservation_time, people, food_choice) 
                VALUES ('$name', '$email', '$reservation_date', '$reservation_time', '$people', '$food_choice')";

        // Executing the query
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green;'>Reservation successful!</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $conn->error . "</p>";
        }
    }

    // Closing the connection
    $conn->close();
    ?>

    <!-- HTML Form for reservation -->
    <form action="" method="POST">
        <input type="text" name="name" placeholder="NAME" required>
        <input type="email" name="email" placeholder="EMAIL" required>
        <input type="date" name="date" required>
        <input type="time" name="time" required>
        <input type="number" name="people" placeholder="NUMBER OF PEOPLE" min="1" required>
        <select name="food" required>
            <option value="">Select Food</option>
            <option value="pizza">Pizza</option>
            <option value="burger">Burger</option>
            <option value="dosa">Dosa</option>
        </select>
        <button type="submit">FIND TABLE</button>
    </form>
</div>
</body>
</html>

 