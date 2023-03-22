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
                if(!$result -> num_rows){
                    ?>
                    <h2>Errore</h2>
                    <?php
                    exit();
                }
                $prodotto = $result -> fetch_array(MYSQLI_ASSOC);
                $result -> free_result();
                ?>

                <div>
                    <h1> <?php echo $prodotto["nome"] ?>  </h1> <img src = ' <?php echo $prodotto["path_img"] ?>'>
                    <h2>Descrizione</h2>
                    <p> <?php echo $prodotto["descrizione"] ?> </p> 
                </div>
                <?php
                    $storage_query = $mysqli -> prepare("SELECT * FROM cappelli, storage WHERE cappelli.id_cap = storage.id_cap AND cappelli.id_cap = (?)");
                    $storage_query -> bind_param("i", $id_cap);
                    $storage_query -> execute();
                    $result = $storage_query -> get_result();
                    $mysqli -> close();
                ?>
                    <table> <th>Taglia</th> <th>Colore</th> <th>Prezzo</th>
                    <?php
                    while($storage = $result -> fetch_array(MYSQLI_ASSOC)){
                            ?>
                            <tr>
                                <td> <?php echo $storage["taglia"] ?></td>
                                <td> <?php echo $storage["colore"] ?> </td>
                                <td> <?php echo $storage["prezzo"]?>  €</td>
                                <?php
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