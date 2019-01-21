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


function insert(){

	global $conn;
	$sql = "INSERT INTO test1 (name, surname, age,salary)
VALUES ('John', 'Doe', 17,89.8)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

function select(){
global $conn;
$sql = "SELECT name, surname, age FROM test1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "name: " . $row["name"]. " - surname: " . $row["surname"]. " " . $row["age"]. "<br>";
    }
} else {
    echo "0 results";
}
}

select();

insert();

$conn->close();





?>