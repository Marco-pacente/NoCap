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
                $query_select = $mysqli -> prepare("SELECT * from cappelli WHERE tipo = (?)");
                $query_select -> bind_param("s", $tipo);
                $query_select -> execute();
                $result = $query_select -> get_result();
                $mysqli -> close();
                while($cappelli = $result -> fetch_array(MYSQLI_ASSOC)){
                    ?>
                        <a class = 'vetrina' href='product.php?id_cap= <?php echo $cappelli["id_cap"] ?>'>
                            <div>
                                    <h2> <?php echo $cappelli["nome"] ?> </h2>
                                    <img src='<?php echo $cappelli["path_img"]?>'>
                            </div>
                        </a>
                        <?php
                }
            ?>
        </span>
    </body>
</html>