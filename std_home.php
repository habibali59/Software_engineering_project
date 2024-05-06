<div>
<?php

include 'include/header.php';

?>

</div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "quiz_system";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = null;


$sql = "SELECT * FROM complete join meterals on meterals.id=complete.id";
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
            top: 0;
            right:100%;
            width: 100%; /* تعيين العرض على 100٪ */
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #eeeeee; /* Light grey */
            color: #222831; /* Dark grey */
            border-radius: 5px;
            box-shadow: 0 0 10px 5px rgba(255, 215, 0, 0.7); /* Gold glowing shadow */
            transition: box-shadow 0.3s; /* Add transition for smoother effect */
            margin-left: 0; /* تحديد التباعد من اليسار */
            margin-right: 0; /* تحديد التباعد من اليمين */
        }
        th, td {
            border: 20px solid #dddddd; /* Lighter grey */
            padding: 15px;
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
       
        <!-- Class Information -->
        <div class="class-details">
            
         
        
        </div>
        

        <!-- Grade and Quiz Information -->
        <table >
    <thead>
      <tr>
        <th>No.</th>
        <th style='margin-right: 0;'>Subject Name</th>
       
       
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        
       
        <td><a href="Introduction_to_Programming.php">Introduction to Programming</a></td>
        
      </tr>
      <tr>
        <td>2</td>
        <td><a href="Data_Structures_and_Algorithms.php">Data Structures and Algorithms</a></td>
     
        
      </tr>
      
      <tr>
        <td>4</td>
        <td><a href="#">Computer Networks</a></td>
       
       
      </tr>
      <tr>
        <td>5</td>
        <td><a href="#">Software Engineering</a></td>
        
        
      </tr>
     
       
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