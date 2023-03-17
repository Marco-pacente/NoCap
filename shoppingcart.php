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
            <a href="shoppingcart.php"><div>carrello</div></a>
            <a href="login.php"><div>login</div></a>
            <a href="account.php">account</a>
        </div>

        <h1>Carrello</h1>

        <span>
            <?php
                $username = $_SESSION["username"];
                $mysqli = new mysqli("localhost", "root", "", "cappelli");
                $query = "SELECT id_user FROM users WHERE username = '" . $username . "'";
                $user_id = $mysqli -> query($query);
                $user_id = $user_id -> fetch_array()["id_user"];
                $query = "SELECT cappelli.nome, storage.taglia, storage.colore FROM users, cappelli, storage, carrello WHERE users.id_user = carrello.id_user AND carrello.id_storage = storage.id_storage AND storage.id_cap = cappelli.id_cap AND users.id_user= '" . $user_id . "'";
                $result = $mysqli -> query($query);
                while($carrello = $result -> fetch_array(ARRAY_ASSOC)){
                    echo $carrello["nome"];
                    echo "<br>";
                    echo $carrello["colore"];
                    echo $carrello["taglia"];
                }
            ?>
        </span>
    </body>
</html>