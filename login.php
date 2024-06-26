<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <link href='https://fonts.googleapis.com/css?family=Monoton' rel='stylesheet'>
        <title>NoCap</title>
        <script src="./scripts/login.js"></script>
    </head>
    <body>
        <h1 class="title">NoCap?</h1>
        <div class="menu">
            <a href="index.php"><div>home</div></a>
            <a href="shoppingcart.php"><div>carrello</div></a>
            <a href="login.php"><div>login</div></a>
            <a href="account.php">account</a>
        </div>

        <div class="login-container">
            <form onsubmit="loginSubmit" action="login.php" method="POST">
                <div>
                    <label for="username"><b>Username</b></label> 
                    <input type="text" placeholder="Inserisci l'username" id="username" name = "username">
                </div>
                <div>
                    <label for="password"><b>Password</b></label> 
                    <input type="password" placeholder="Inserisci la password" id="password" name="password" > 
                </div>
                <input type="submit" value="Accedi" class="submit">
            </form>
        </div>
        <div>Non hai un account? <a href="signup.php">Registrati</a></div>
            <?php
                if(!isset($_POST["username"])){
                    exit();
                }
                $username = $_POST["username"];
                $password = $_POST["password"];
                if(strlen($username) == 0 || strlen($password) == 0){
                    echo "Tutti i campi sono obbligatori";
                    exit();
                }
                $mysqli = new mysqli("localhost", "root", "", "cappelli");
                $password_query = $mysqli -> prepare("SELECT password FROM users WHERE username = (?);"); //prepared statement
                $password_query -> bind_param("s", $username); //associazione variabile al placeholder
                $password_query -> execute();
                $result_password = $password_query -> get_result();

                $mysqli -> close();
                $password_hash = mysqli_fetch_array($result_password)["password"];
                if($result_password -> num_rows != 0){
                    if(password_verify($password, $password_hash)){
                        echo "Accesso effettuato";
                        session_start();
                        $_SESSION["username"] = $username;
                        //echo "<script>window.location.href = 'account.php';</script>";
                        header("Location: account.php");
                    }else{
                        echo "Password errata";
                    }
                }else{
                    echo "<p>Non esiste un account con questo nome</p>";
                }
            ?>
    </body>
</html>