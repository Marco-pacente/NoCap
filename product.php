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
        <span>
            <?php
                $id_cap = $_GET["id_cap"];
                $mysqli = new mysqli("localhost", "root", "", "cappelli");
                $prodotto_query = $mysqli -> prepare("SELECT nome, path_img, descrizione FROM cappelli WHERE id_cap = (?)");
                $prodotto_query -> bind_param("i", $id_cap);
                $prodotto_query -> execute();
                $result = $prodotto_query -> get_result();
                $prodotto = $result -> fetch_array(MYSQLI_ASSOC);
                $result -> free_result();
                echo 
                    "<div>".
                        "<h1>" . $prodotto["nome"] . "</h1>" . "<img src = '" . $prodotto["path_img"] . "'>" .
                        "<h2>Descrizione</h2>" .
                        "<p>" . $prodotto["descrizione"] . "</p>" . 
                    "</div>";
                $storage_query = $mysqli -> prepare("SELECT * FROM cappelli, storage WHERE cappelli.id_cap = storage.id_cap AND cappelli.id_cap = (?)");
                $storage_query -> bind_param("i", $id_cap);
                $storage_query -> execute();
                $result = $storage_query -> get_result();
                $mysqli -> close();
                echo "<table> <th>Taglia</th> <th>Colore</th> <th>Prezzo</th>";
                while($storage = $result -> fetch_array(MYSQLI_ASSOC)){
                    echo 
                        "<tr>".
                            "<td>". $storage["taglia"] . "</td>".
                            "<td>". $storage["colore"] . "</td>";
                            "<td>". $storage["prezzo"] . "€" . "</td>";
                            if($storage["quantità"]>0){
                        echo "<a href='addToCart.php?id=". $storage["id_storage"] ."'>Aggiungi al carrello</a>";
                    } 
                    echo "<tr>";
                        
                }
                echo "</table>";
            ?>
        </span>
    </body>
</html>