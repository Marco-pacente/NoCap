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
            <a href=""><div>carrello</div></a>
            <a href="login.php"><div>login</div></a>
            <a href="account.php">account</a>
        </div>

        <div class="login-container">
            <form action="login.php" method="POST">
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
                $mysqli = new mysqli("localhost", "root", "", "cappelli");
                $password_query = "SELECT password FROM users WHERE username = '".$username."'";
                $result_password = $mysqli -> query($password_query);
                $password_hash = mysqli_fetch_array($result_password)["password"];
                if($result_password -> num_rows != 0){
                    i
                    f(password_verify($password, $password_hash)){
                        echo "Accesso effettuato";
                        session_start();
                        $_SESSION["username"] = $username;
                        header("account.php");
                    }else{
                        echo "Password errata";
                    }
                }else{
                    echo "<p>Non esiste un account con questo nome</p>";
                }
                $mysqli -> close();
            ?>
    </body>
</html>