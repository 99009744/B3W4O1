<?php
    include_once ("dblink.php");
    include_once ("dblink.php");
    $id = $_GET['id'];
    $sql = 'SELECT * FROM characters WHERE id = ' . $id . ';';
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
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
    echo '<h1 class="headertext">' . $result['name'] . '</h2>';
    ?>
</div>

<div id="characterslist">
    <?php
        echo '<div id="info">';
        echo '<img src="images/' . $result['avatar'] . '" id="profilepicture">';
        echo '<div id="stats" style="background-color:' . $result['color'] . '">';
        echo '<i class="fas fa-heart"></i>';
        echo '<h4 class="statsinfo">' . $result['health'] . '</h4><br>';
        echo '<i class="fas fa-fist-raised"></i>';
        echo '<h4 class="statsinfo">' . $result['attack'] . '</h4><br>';
        echo '<i class="fas fa-shield-alt"></i>';
        echo '<h4 class="statsinfo">' . $result['defense'] . '</h4><br>';
        echo '<h4 class="statsinfo">Weapon: </h4>';
        echo '<p class="statsinfo">' . $result['weapon'] . '</p><br>';
        if($result['armor'] = "NULL"){

        }
        else{
            echo '<h4 class="statsinfo">Armor: </h4>';
            echo '<p class="statsinfo">' . $result['armor'] . '</p><br>';
        }
        echo '</div>';
        echo '<p id="bio">' . $result['bio'] . '<p><br>';
        echo '</div>';
        echo '</div>';
    ?>
</div>
<?php
    include_once ("footer.html")
    ?>
</body>
</html>