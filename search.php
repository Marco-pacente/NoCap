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

        <h1>Cappelli sotto la categoria <?php echo $_GET["type"] ?></h1>

        <span>
            <?php
                $tipo = $_GET["type"];
                $mysqli = new mysqli("localhost", "root", "", "cappelli");
                $query_select = "SELECT * from cappelli WHERE tipo = '". $tipo ."'";
                $result = $mysqli -> query($query_select);
                $mysqli -> close();
                while($cappelli = $result -> fetch_array(MYSQLI_ASSOC)){
                    echo 
                        "<a class = 'vetrina' href='product.php?id_cap=". $cappelli["id_cap"] ."'>
                            <div>
                                    <h2>" . $cappelli["nome"] . "</h2>"."
                                    <img src='". $cappelli["path_img"] ."'>
                            </div>
                        </a>";
                }
            ?>
        </span>
    </body>
</html>