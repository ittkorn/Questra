<?php
include("dbconnect.php");

if (isset($_POST["submit"])) {
    $picture_name = $_FILES['pictures']['name'];
    $tempname = $_FILES['pictures']['tmp_name'];
    $folder = "Image/" . basename($picture_name);
    $name = $_POST['name'];
    $address = $_POST['address'];
    $facebook = $_POST['facebook'];

    // Validate and sanitize input
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $address = filter_var($address, FILTER_SANITIZE_STRING);
    $facebook = filter_var($facebook, FILTER_VALIDATE_URL);

    // Check if the uploaded file is an image
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $file_type = mime_content_type($tempname);

    if (in_array($file_type, $allowed_types)) {
        // Use prepared statements to avoid SQL injection
        $query = $connect->prepare("INSERT INTO sp_name (picture, name, address, facebook) VALUES (?, ?, ?, ?)");
        $query->bind_param("ssss", $picture_name, $name, $address, $facebook);
        $result = $query->execute();

        if ($result && move_uploaded_file($tempname, $folder)) {
            echo "<script>alert('Data inserted successfully')</script>";
        } else {
            echo "<script>alert('ERROR: Could not insert data')</script>";
        }
    } else {
        echo "<script>alert('ERROR: Uploaded file is not a valid image')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }
        .container {
            background-color: #222;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 1000px;
            text-align: center;
        }
        .container h2 {
            margin-bottom: 20px;
            font-size: 36px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group input[type="text"],
        .form-group input[type="url"],
        .form-group input[type="file"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
        }
        .form-group button {
            width: calc(50% - 10px);
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin: 5px;
        }
        .form-group button[type="submit"] {
            background-color: #ff0000;
            color: #fff;
        }
        .form-group button[type="reset"] {
            background-color: #555;
            color: #fff;
        }
        .form-group button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>MEMBER QUESTRA</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" name="pictures" placeholder="Upload Pictures" required />
            </div>
            <div class="form-group">
                <input type="text" name="name" placeholder="Enter Name" required />
            </div>
            <div class="form-group">
                <input type="text" name="address" placeholder="Enter Address" required />
            </div>
            <div class="form-group">
                <input type="url" name="facebook" placeholder="Enter Facebook URL" required />
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Submit</button>
                <button type="reset" name="reset">Reset</button>
            </div>
        </form>
    </div>
</body>
</html>
