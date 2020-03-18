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
<?php
        $sql = $conn->prepare("SELECT COUNT(*)  FROM characters;");
        $sql->execute();
        $header = $sql->fetchAll();
        echo '<div id="header">';
        echo '<h1 class="headertext"> All ' . $header[0][0] . ' characters</h1>';
        echo '</div>'
    ?>
    <div id="characterslist">
        <?php
            $sql = $conn->prepare("SELECT * FROM characters order by name;");
            $sql->execute();
            $results = $sql->fetchAll();
            foreach($results as $result){
                echo '<div class="characters">';
                echo '<img src="images/' . $result['avatar'] . '" class="avatar">';
                echo '<div class="stats">';
                echo '<h2 style="color:' . $result['color'] . '">' . $result['name'] . '</h2><br>';
                echo '<i class="fas fa-heart" style="color:' . $result['color'] . '"></i>';
                echo '<h4 style="color:' . $result['color'] . '">' . $result['health'] . '</h4><br>';
                echo '<i class="fas fa-fist-raised"style="color:' . $result['color'] . '"></i>';
                echo '<h4 style="color:' . $result['color'] . '">' . $result['attack'] . '</h4><br>';
                echo '<i class="fas fa-shield-alt" style="color:' . $result['color'] . '"></i>';
                echo '<h4 style="color:' . $result['color'] . '">' . $result['defense'] . '</h4><br>';
                echo '</div>';
                echo '<a href="character.php?name=' . urlencode($result['name']) . '" class="inspect" style="color:' . $result['color'] . '"><i class="fas fa-search" style="color:' . $result['color'] . '"></i>bekijk</a>';
                echo '</div>';
            }
        ?>
    </div>
    <?php
    include_once ("footer.html")
    ?>
</body>
</html>