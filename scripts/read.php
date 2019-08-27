<?php
    $dsn = 'mysql:dbname=foodDb;host=localhost';
    $user = 'arbys';
    $password = 'meaties';

    try {
        $dbh = new PDO($dsn, $user, $password);

        $statement = 'SELECT 
            S_NAME as meatName,
            S_DONENESS as doneness,
            B_EDIBLE_RAW as edibleRaw,
            B_WHITE as whiteMeat,
            S_CATEGORY as category
         FROM meat';

        $query = $dbh->prepare($statement);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->fetchAll();

        echo json_encode($result);

    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
?>