<?php
    $dsn = 'mysql:dbname=foodDb;host=localhost';
    $user = 'arbys';
    $password = 'meaties';

    echo json_encode($_POST);
    
    try {
        $dbh = new PDO($dsn, $user, $password);

        $statement = 'INSERT INTO meat
        (
            S_NAME,
            S_DONENESS,
            B_EDIBLE_RAW,
            B_WHITE,
            S_CATEGORY
        )
         VALUES(
            :name,
            :doneness,
            :edible,
            :white,
            :category
         )';

        $query = $dbh->prepare($statement);
        $query->execute([
            ":name" => $_POST["name"],
            ":doneness" => $_POST["doneness"],
            ":edible" => $_POST["edibleRaw"],
            ":white" => $_POST["white"],
            ":category" => $_POST["category"]
        ]);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->fetchAll();

        echo json_encode($result);

    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
?>