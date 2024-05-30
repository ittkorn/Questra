<?php
// Include the header HTML content
include 'RuaYai.html'; // Assuming your header content is in header.html

// Include the CSS file
echo '<link rel="stylesheet" type="text/css" href="RuaYai.css">';

// โค้ด HTML ก่อนส่วนของการดึงข้อมูล
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Data basic of www.-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Explain about wwww.-->
    <meta name="description" content="การท่องเที่ยว">
    <!--Developer-->
    <meta name="author" content="Questra">
    <!--Keyword to find -->
    <meta name="keywords" content="การท่องเที่ยว">
    <title>Questra</title>
    
    <style>
        
    </style>
</head>
<body>
<div style="text-align: center;">
    <a href="insertform.html" style="background-color: red; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Add Location</a>
</div>
<br>
    
    <nav class="nav">
        <!-- Your navigation links here -->
    </nav>

  <div class= "location div">

       
            <!-- PHP script to fetch data from XAMPP -->
            <?php
            // เชื่อมต่อฐานข้อมูล
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "questra";

            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // สร้างคำสั่ง SQL เพื่อดึงข้อมูล
            $sql = "SELECT * FROM sp_name";
            $result = $conn->query($sql);

            // Loop through the data and display each location
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div >';
                    echo '<figcaption><h1>' . $row["name"] . '</h1></figcaption>';
                    echo '<a href="' . $row["facebook"] . '" target="_blank">';
                    echo '<img src="Image/' . $row["picture"] . '" width="200" height="300">';
                    echo '</a>';
                    echo '<table>';
                    echo '<tr><th></th><td>'.$row['address'].'</td></tr>';
                   
                    echo '</table>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }

            // Close connection
            $conn->close();
            ?>
            </nav>
            </div>
       
        
      
</body>
</html>
