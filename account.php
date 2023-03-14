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
            if(session_id() == ""){
                echo '<p>Non hai effettuato il login? <a href="login.php">Accedi</a></p>';
            }else{
                $mysqli = new mysqli("localhost", "root", "", "cappelli");
                $username = $_SESSION["username"];
                $account_select = $mysqli -> prepare("SELECT username, email, birthdate FROM users WHERE username = (?)");
                $account_select -> bind("s", $username);
                $account = $account_select -> execute();
                echo "<p>" . $account["username"] . "</p>";
                echo "<p>" . $account["email"] . "</p>";
                echo "<p>" . $account["birthdate"] . "</p>";
                $mysqli -> close(); 
            }
        ?>
    </body>
</html>