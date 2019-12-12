<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>meatAPP</title>
</head>
<body>
    <div id="container">
        <h1>So Many Meats</h1>
        <form action="scripts/script.php" method="POST">
            <!-- Name input -->
            <label for="name">Meat: </label>
            <input type="text" name="name" placeholder="Meat Name">
            <br>
            <!-- Doneness Selector -->
            <label for="doneness">Choose the doneness:</label>
            <br>
            <select name="doneness" id="doneness">
                <option value="select" selected>Choose Your Doneness</option>
                <option value="seared">Seared</option>
                <option value="rare">Rare</option>
                <option value="medium-rare">Medium-Rare</option>
                <option value="heart-attack">Heart-Attack</option>
                <option value="grilled">Grilled</option>
                <option value="fried">Fried</option>
                <option value="burnt">Burnt</option>
            </select>
            <!-- Edible Radios -->
            <fieldset id="edible">
                <label for="edible">Is it edible raw?</label>
                <br>
                <label for="edibleRaw">Yes</label>
                <input type="radio" name="edibleRaw" value="Yes" checked>
                <label for="edibleRaw">No</label>
                <input type="radio" name="edibleRaw" value="No">
            </fieldset>
            <!-- Is White Radios -->
            <fieldset id="isWhite">
                <label for="isWhite">Is it white meat?</label>
                <br>
                <label for="white">Yes</label>
                <input type="radio" name="white" value="Yes" checked>
                <label for="white">No</label>
                <input type="radio" name="white" value="No">
            </fieldset>
            <!-- Category Text Area -->
            <label for="category">What category does the meat fall into?</label>
            <br>
            <textarea name="category" id="category" cols="30" rows="10"></textarea>
            <br>
            <!-- Submit Button -->
            <button type="submit" id="submitButton">Send yo meats</button>
        </form>
    </div>
</body>
</html>

<?php
    /* Connect to a MySQL database using driver invocation */
    $dsn = 'mysql:dbname=foodDb;host=localhost';
    $user = '****';
    $password = '****';

    try {
        $dbh = new PDO($dsn, $user, $password);
        // echo "connected!";
        $sql = 'SELECT * FROM meat';
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $resultArray = $sth->fetchAll();
        foreach ($resultArray as $key => $value){
            echo "<p>Key $key.
            <br/> Meat Name: ".$value['S_NAME'].
            "<br/> Doneness: ".$value['S_DONENESS'].
            "<br/> Category: ".$value['S_CATEGORY']."</p>";
        }
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
?>
