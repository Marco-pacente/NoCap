<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <link href='https://fonts.googleapis.com/css?family=Monoton' rel='stylesheet'>
        <title>NoCap</title>
    </head>
    <body>
        <h1 class="title">NoCap?</h1>
        <div class="menu">
            <a href="index.php"><div>home</div></a>
            <a href=""><div>carrello</div></a>
            <a href="login.php"><div>login</div></a>
            <a href="account.php">account</a>
        </div>

        <h1>Categorie</h1>

        <span>
            <?php
                $mysqli = new mysqli("localhost", "root", "", "cappelli");
                $query = "SELECT tipo, path_img FROM tipo";
                $result = $mysqli -> query($query);
                $mysqli -> close();
                while($tipo = $result -> fetch_array(MYSQLI_ASSOC)){
                    echo 
                        "<a class = 'vetrina' href='search.php?type=". $tipo["tipo"] ."'>
                            <div>
                                    <h2>" . $tipo["tipo"] . "</h2>"."
                                    <img src='". $tipo["path_img"] ."'>
                            </div>
                        </a>";
                }
            ?>
        </span>
    </body>
</html>