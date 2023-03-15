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
        <?php
            session_start();
            if(!isset($_SESSION["username"])){
                echo '<p>Non hai effettuato il login? <a href="login.php">Accedi</a></p>';
                exit();
            }else{
                $mysqli = new mysqli("localhost", "root", "", "cappelli");
                $username = $_SESSION["username"];
                $account_select = $mysqli -> prepare("SELECT username, email, birthdate FROM users WHERE username = (?)");
                $account_select -> bind_param("s", $username);
                $account_select -> execute();
                $account = $account_select -> get_result();
                $account = mysqli_fetch_array($account);
                $mysqli -> close(); 
                echo "<p>" . $username . "</p>";
                echo "<p>" . $account["email"] . "</p>";
                echo "<p>" . $account["birthdate"] . "</p>";
            }
        ?>
        <a href="shoppingcart.php">Carrello</a>
        
        <form action="exit.php" method="get">
                <input class="button" type="submit" value="Esci">
        </form>
    </body>
</html>