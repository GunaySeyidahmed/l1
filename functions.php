<?php

require 'connection.php';
global $pdo;
function selectWithArray()
{
    global $pdo;
    $query = 'SELECT user.id, user.username, user.password, contacts.contact_name, contacts.contact_surname, 
            contacts.contact_phone FROM user INNER JOIN contacts ON user.id = contacts.userId';
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll();
    return $users;
}

function insertUser($username, $password, $phone)
{
    global $pdo;

    $data = [
        'username' => $username,
        'password' => $password,
        'phone' => $phone,
    ];

    $stmt= $pdo->prepare("INSERT INTO user (username, password,  phone) VALUES (:username, :password, :phone)");
    $stmt->execute($data);
    return true;
}

function delete($id)
{
    global $conn;

    $sql = "DELETE FROM users WHERE id=" . "$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

function update($id)
{
    global $conn;
    $sql = "UPDATE users SET name='Doe' WHERE id=" . "$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

function selectByUsername($username)
{
    global $conn;
    $sql = "SELECT password FROM user where username='" . $username . "'";
    exit($sql);
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            return $row["password"] . "<br>";
        }
    } else {
        echo "0 results";
    }
}

function checkUser($username, $password)
{
    global $pdo;
    $sql = "SELECT id FROM user where username='" . $username . "' AND password='" . $password . "' limit 1";

    $result = $pdo->prepare($sql);
    $result->execute();
    $row = $result->fetch();


    if ($row['id'] > 0) {
        return true;
    } else {
        return false;
    }

}

?>