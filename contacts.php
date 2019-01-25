<?php
require 'connection.php';
require 'functions.php';

error_reporting(-1);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        .position-center {
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -30%);
            width: 30%;
        }
        .table-width{
            width: 70% !important;
            /*top: 25%;*/
        }
        .btn-logout{
            background: blue;
            color: white !important;
            width: 150px;
            font-size:20px;
            text-align: center;
            text-decoration: none !important;
            padding: 0 25px;
            display: inline-block;
            height: 40px;
            border-radius: 40px;
            line-height: 40px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center text-primary" style="margin-top: 25px">Kontaklar cedveli</h1>
<?php
    $result = selectWithArray();
        echo " <table border = 1 class='table table-striped position-center table-width'> ";
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
    echo '<div class="float-right"><a href="logout.php" class="btn-logout">logout</a></div>';
?>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>

</body>
</html>