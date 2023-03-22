<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css"> <!-- collegamento a style.css -->
        <link href='https://fonts.googleapis.com/css?family=Monoton' rel='stylesheet'><!--collegamento al font -->
        <title>NoCap</title>
    </head>
    <body>
        <h1 class="title">NoCap?</h1>
        <div class="menu">
            <a href="index.php"><div>home</div></a>
            <a href="shoppingcart.php"><div>carrello</div></a>
            <a href="login.php"><div>login</div></a>
            <a href="account.php">account</a>
        </div>

        <h1>Categorie</h1>

        <span>
            <?php
                $mysqli = new mysqli("localhost", "root", "", "cappelli");
                $query = "SELECT tipo, path_img FROM tipo"; //query che prende tutti i tipi e le rispettive immagini 
                $result = $mysqli -> query($query);
                $mysqli -> close();
                while($tipo = $result -> fetch_array(MYSQLI_ASSOC)){
                    ?>
                    <a class = 'vetrina' href='search.php?type=<?php echo $tipo["tipo"]?>'>
                            <div>
                                    <h2> <?php echo $tipo["tipo"] ?> </h2>
                                    <img src= <?php echo $tipo["path_img"]?>>
                            </div>
                        </a>
                    <?php
                }
            ?>
        </span>
    </body>
</html>