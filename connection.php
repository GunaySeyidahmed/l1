<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="mydb";




$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO test1 (name, surname, age,salary)
VALUES ('John', 'Doe', 17,89.8)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();





?>