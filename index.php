<?php
    include_once("dblink.php")
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
    include_once ("header.html")
    ?>
    <div id="characterslist">
        <?php
            $sql = "SELECT * FROM characters order by name;";
            $query = mysqli_query($conn, $sql);
            $results = mysqli_fetch_all($query,MYSQLI_ASSOC);
            foreach($results as $result){
                echo '<div class="characters">';
                echo '<img src="images/' . $result['avatar'] . '" class="avatar">';
                echo '<div class="stats">';
                echo '<h2>' . $result['name'] . '</h2><br>';
                echo '<i class="fas fa-heart"></i>';
                echo '<h4>' . $result['health'] . '</h4><br>';
                echo '<i class="fas fa-fist-raised"></i>';
                echo '<h4>' . $result['attack'] . '</h4><br>';
                echo '<i class="fas fa-shield-alt"></i>';
                echo '<h4>' . $result['defense'] . '</h4><br>';
                echo '</div>';
                echo '<a href="character.php?id=' . $result['id'] . '" class="inspect"><i class="fas fa-search"></i>bekijk</a>';
                echo '</div>';
            }
        ?>
    </div>
    <?php
    include_once ("footer.html")
    ?>
</body>
</html>