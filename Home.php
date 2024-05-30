<?php
// Include the header HTML content
include 'nav.html'; // Assuming your header content is in header.html

// Include the CSS file
echo '<link rel="stylesheet" type="text/css" href="Home.css">';

// HTML code before the data retrieval section
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

    <!-- รูปภาพในหน้า Home -->
    <img src="Image/Home.png"  width="1460px" height="1050">
    <br>
    <br>

    <!-- ส่วนของรูปภาพและข้อมูลจากฐานข้อมูล -->
    <div class="image-container"> <!-- Container for cards -->
        <?php
        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "questra";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create SQL query to retrieve data
        $sql = "SELECT * FROM sp_name";
        $result = $conn->query($sql);

        $count = 0; // Variable to count the number of items

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($count < 3) { // Check condition not more than 3 items
                    // Display shop data and image
                    echo '<div class="image-container figcaption">'; // Start of card
                   
                    echo '<a href="' . $row["facebook"] . '" target="_blank">';
                    echo '<img src="Image/' . $row["img"] . '" width="200" height="200">';
                    echo '</a>';
                    // Apply inline CSS to remove underline from the name
                   
                    echo '</div>'; // End of card
                    
                   
                   
                    $count++; // Increment the count of displayed items
                } else {
                    break; // Exit the loop when displaying 3 items
                }
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
    <br>
   

    <!-- Main data section -->
    <div align="center"> <!-- Picture section -->
       
    </div>

    <div align="center"> <!-- Picture section -->
        <!-- Main image -->
        <img src="Image/Supanburi.jpg" width="500" height="300">
        <!-- Additional information -->
    </div>

    <div align="center">
        <p><strong>ตำบลรั้วใหญ่</strong> เป็นที่ตั้งอยู่ในอำเภอเมืองสุพรรณบุรี จังหวัดสุพรรณบุรี มีประวัติศาสตร์ที่น่าสนใจและเป็นแหล่งท่องเที่ยวที่มีความสวยงามมากมาย</p>
        <p>จุดเด่นของตำบลนี้ได้แก่ อุทยานแห่งชาติเขาสามยอด ซึ่งเป็นที่ตั้งของศาลาแก้วและวัดโบราณอย่างวัดม่วง และมีงานประเพณีท้องถิ่นที่น่าสนใจ</p>
        <p>เช่น การแข่งขันเรือและงานเทศกาลท้องถิ่นอื่นๆ นอกจากนี้ยังมีโครงการพัฒนาสถานีรถไฟในบริเวณใกล้เคียงเพื่อส่งเสริมการท่องเที่ยวและการพัฒนาทางเศรษฐกิจ</p>
        <p>ของพื้นที่ได้อย่างต่อเนื่อง ชุมชนในตำบลนี้มีวัฒนธรรมและชนบทที่น่าสนใจ เป็นที่พักผ่อนของชาวบ้านและนักท่องเที่ยวที่ต้องการหนีความวุ่นวายของเมืองใหญ่</p>
        <p>ดังนั้น ตำบลรั้วใหญ่ เป็นที่มาของการท่องเที่ยวที่น่าสนใจและเป็นเส้นทางสำคัญ</p>
    </div>

</body>
</html>
