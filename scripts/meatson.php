<?php
    try {
        $dsn = 'mysql:dbname=foodDb;host=localhost';
        $user = '****';
        $password = '****';

        $dbh = new PDO($dsn, $user, $password);
        $sql = "SELECT * FROM MEAT";

        $sth = $dbh->prepare($sql);

        $sth->execute();
        $meat_data = $sth->fetchALL();
        // print_r($meat_data);

        echo json_encode($meat_data);

        // echo"<h2>Record Created!</h2>";
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
?>
