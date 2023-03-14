<html>
    <head>
        <title>NoCap</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <link href='https://fonts.googleapis.com/css?family=Monoton' rel='stylesheet'>
        <script src="./scripts/signup.js"></script>
    </head>
    <body>
        <h1 class="title">NoCap?</h1>
        <div class="menu">
            <a href="index.php"><div>home</div></a>
            <a href="shoppingcart.php"><div>carrello</div></a>
            <a href="login.php"><div>login</div></a>
        </div>
        <div>
            <form onsubmit="return signupSubmit()" action="signup.php" method="post">
                <div>
                    <label for="email">Email</label>
                    <input id="email" type="text" name="email" placeholder="Inserire la mail">
                    <br>
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" placeholder="Inserire il nome utente">
                    <br>
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="Inserire la password">
                    <br>
                    <label for="bday">Data di nascita</label>
                    <input id="bday" type="date" name="bday" placeholder="Inserire la data di nascita">
                    <br>
                    <div id="error"></div>
                    <input type="submit" class="submit" value="Registrati">
                </form>
            </div>
        </div>
        <?php
        if (!isset($_POST["username"])) {
            exit();
        }
        $isValid = true;
        $email = trim($_POST["email"]); 
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $bday = $_POST["bday"];
        if(strlen($username)<4 || strlen($username)>20){
            $isValid = false;
            echo("Username non valido<br>");
        }
        $emailRegex = "/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo("Email non valida<br>");
        $isValid = false;
        }
        if(strlen($password)<8){
            echo("La password deve essere di almeno 8 caratteri<br>");
            $isValid = false;
        }
        if($isValid){
            $mysqli = new mysqli("localhost", "root", "", "cappelli");
            if($mysqli -> connect_errno){
                echo $mysqli -> connect_error;
                exit();
            }else{
                $username_query = "SELECT username from users where username = '" . $username . "';";
                $usn_rows = $mysqli -> query($username_query);
                $email_query = "SELECT username from users where email = '" . $email . "';";
                $psw_rows = $mysqli -> query($email_query);
                if($usn_rows -> num_rows != 0 || $psw_rows -> num_rows != 0){
                    echo "Un account con questa email o password esiste già<br>";
                }else{
                    $inserimento = $mysqli->prepare("INSERT INTO users(username, password, email, birthdate) VALUES (?, ?, ?, ?)");
                    $inserimento -> bind_param("sssd", $username, $password, $email, $bday);
                    $inserimento -> execute();
                }
            }
        }
        ?>
    </body>
</html>