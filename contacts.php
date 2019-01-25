<?php
require 'connection.php';
require 'functions.php';

error_reporting(-1);
?>

<!DOCTYPE html>
<html>
<body>
<?php
    $result = selectWithArray();
        echo " <table border = 1 > ";
        echo "<tr>";
            echo "<th>" . "ID" . "</td>";
            echo "<th>" . "USERNAME" . "</th>";
            echo "<th>" . "CONTACT NAME" . "</th>";
            echo "<th>" . "CONTACT SURNAME" . "</th>";
            echo "<th>" . "CONTACT PHONE" . "</th>";
        echo "</tr>";
        $i = 1;
        foreach ($result as $key=>$item) {
            echo "<tr>";
                echo "<td>" .$i."</td>";
                echo "<td>" .$item['username']."</td>";
                echo "<td>" .$item['contact_name']. "</td>";
                echo "<td>" . $item['contact_surname'] . "</td>";
                echo "<td>" . $item['contact_phone'] . "</td>";
            echo "</tr>";
            $i++;
        }
        echo "</table>";
    echo '<a href="logout.php">logout</a>';
?>

</body>
</html>