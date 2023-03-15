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
                $tipo = $_GET["type"];
                $mysqli = new mysqli("localhost", "root", "", "cappelli");
                $query_select = "SELECT * from cappelli, storage WHERE cappelli.id_cap = storage.id_cap AND tipo = (?)";
                $cappelli = $mysqli -> query($query_select);
            ?>
        </span>
    </body>
</html>