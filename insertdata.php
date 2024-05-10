<?php
// Check if all required fields are present
if(isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["time"])) {
    // Sanitize input data
    $name = htmlspecialchars($_POST["Name"]);
    $address = htmlspecialchars($_POST["Address"]);
    $time = htmlspecialchars($_POST["Time"]);

    // Here you can perform further actions with the data, such as saving it to a database

    // For now, let's just display a success message
    echo "Data received successfully:<br>";
    echo "Name: " . $name . "<br>";
    echo "address: " . $address . "<br>";
    echo "time: " . $time . "<br>";
} else {
    // If any required field is missing, display an error message
    echo "Error: Please fill out all the fields.";
}
?>
