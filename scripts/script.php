<?php
    $name = $_POST["name"];
    $doneness = $_POST["doneness"];
    $edible = $_POST["edibleRaw"];
    $white = $_POST["white"];
    $category = $_POST["category"];

    try {
        $dsn = 'mysql:dbname=foodDb;host=localhost';
        $user = '****';
        $password = '****';

        $dbh = new PDO($dsn, $user, $password);
        $sql = "INSERT INTO meat (
            S_NAME,
            S_DONENESS,
            B_EDIBLE_RAW,
            B_WHITE,
            S_CATEGORY
        )
        VALUES (
            :name,
            :doneness,
            :edible,
            :white,
            :category
        )";
        $sth = $dbh->prepare($sql);

        $sth->execute(array(
            "name" => $name,
            "doneness" => $doneness,
            "edible" => $edible,
            "white" => $white,
            "category" => $category
        ));

        echo"<h2>Record Created!</h2>";
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
?>
