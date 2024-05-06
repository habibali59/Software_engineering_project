<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit;
}

// Include header file
include 'include/header.php';

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "quiz_system";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user-specific data based on the logged-in user's email
$user_email = $_SESSION['email'];
$sql = "SELECT * WHERE email='$user_email' FROM complete c JOIN quiz q ON c.id = q.meteral JOIN users u ON c.id = u.id JOIN meterals m ON q.meteral = m.id
WHERE  m.name = 'Introduction to Programming' LIMIT 0, 25";
$result = $conn->query($sql);

if ($result === false) {
    echo "Error retrieving records: " . $conn->error;
    exit;
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style_foo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Content</title>
   
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            width: 100%;
            height: 130vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #393e46; /* Dark grey */
            color: #eeeeee; /* Light grey */
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 2rem;
            color: #00adb5; /* Cyan */
        }
        table {
            width: 90%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #eeeeee; /* Light grey */
            color: #222831; /* Dark grey */
            border-radius: 5px;
            box-shadow: 0 0 10px 5px rgba(255, 215, 0, 0.7); /* Gold glowing shadow */
            transition: box-shadow 0.3s; /* Add transition for smoother effect */
        }
        th, td {
            border: 1px solid #dddddd; /* Lighter grey */
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #393e46; /* Dark grey */
            color: #eeeeee; /* Light grey */
            font-weight: bold;
            text-transform: uppercase;
        }
        .class-details {
            margin-bottom: 20px;
        }
        .class-details h2 {
            margin-bottom: 10px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #00adb5; /* Cyan */
            color: #eeeeee; /* Light grey */
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            margin-right: 10px;
        }
        .btn:hover {
            background-color: #393e46; /* Dark grey */
        }
        .feedback-form {
            margin-top: 20px;
            text-align: center;
        }
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #dddddd; /* Lighter grey */
            margin-bottom: 10px;
        }
        .btn-submit {
            background-color: #00adb5; /* Cyan */
            color: #eeeeee; /* Light grey */
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-submit:hover {
            background-color: #393e46; /* Dark grey */
        }
        .lms-link {
            margin-top: auto;
        }
        .lms-link a {
            color: #00adb5; /* Cyan */
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }
        .lms-link a:hover {
            color: #eeeeee; /* Light grey */
        }


        footer {
            width: 100%;
            background-color: #222831; /* Darker grey */
            color: #eeeeee; /* Light grey */
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            left: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Student Content</h1>

        <!-- Class Information -->
        <div class="class-details">
            <h2>Object Oriented Programming (OOP)</h2>
            <p><strong>Instructor:</strong> Prof. SO_team</p>
            <p><strong>Class Schedule:</strong> Mondays and Wednesdays, 10:00 AM - 11:30 AM</p>
            <p><strong>Syllabus:</strong> <a href="#">Download Syllabus</a></p>
            <p><strong>Textbook:</strong> Introduction to Java Programming by Y. Daniel Liang</p>
       
        </div>

        <h1>Data Structures and Algorithms</h1>
     

        <!-- Grade and Quiz Information -->
        <table>
            <thead>
                <tr>
                    <th>Quiz Number</th>
                    <th>Name student</th>
                    <th>Quiz name</th>
                    <th>Grade</th>
                    <th>Status</th>
                  
                </tr>
            </thead>
            <tbody>
            <?php
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["fname"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["no"] . "</td>";
        echo "<td>" . $row["STATUS"] . "</td>";
       
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='8'>No records found</td></tr>";
    }
    ?>
            </tbody>
        </table>

        <!-- Feedback and Support -->
        
        <!-- Link to LMS -->
        <div class="lms-link">
          
        </div>
    </div>


</body>
</html>
<?php

include 'include/footer.php';

?>