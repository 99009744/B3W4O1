<?php
    include_once ("dblink.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lacquer&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/908fb2de93.js" crossorigin="anonymous"></script>
    <title>Home page</title>
</head>
<body>
<div id="header">
<?php
    $getresult = $_GET['name'];
    $sql = $conn->prepare("SELECT * FROM characters where name = :name;");
    $sql->execute( [":name" => $getresult] );
    $results = $sql->fetchAll();
    echo '<h1 class="headertext">' . $results[0]['name'] . '</h2>';
    echo '<a href="index.php" id="back">back</a>';
    ?>
</div>

<div id="characterslist">
    <?php
        echo '<div id="info">';
        echo '<img src="images/' . $results[0]['avatar'] . '" id="profilepicture">';
        echo '<div id="stats" style="background-color:' . $results[0]['color'] . '">';
        echo '<i class="fas fa-heart"></i>';
        echo '<h4 class="statsinfo">' . $results[0]['health'] . '</h4><br>';
        echo '<i class="fas fa-fist-raised"></i>';
        echo '<h4 class="statsinfo">' . $results[0]['attack'] . '</h4><br>';
        echo '<i class="fas fa-shield-alt"></i>';
        echo '<h4 class="statsinfo">' . $results[0]['defense'] . '</h4><br>';
        echo '<h4 class="statsinfo">Weapon: </h4>';
        echo '<p class="statsinfo">' . $results[0]['weapon'] . '</p><br>';
        echo '<h4 class="statsinfo">Armor: </h4>';
        echo '<p class="statsinfo">' . $results[0]['armor'] . '</p><br>';
        echo '</div>';
        echo '<p id="bio">' . $results[0]['bio'] . '<p><br>';
        echo '</div>';
        echo '</div>';
    ?>
</div>
<?php
    include_once ("footer.html")
    ?>
</body>
</html>