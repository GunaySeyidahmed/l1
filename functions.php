<?php

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

function insertUser($name, $password, $phone)
{
    global $pdo;
    $sql = "insert into user (`username`,`password`,`phone`) VALUES ('" . $name . "','" . $password . "','" . $phone . "')";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$name, $password, $phone]);

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