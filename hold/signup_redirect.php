<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <link href='https://fonts.googleapis.com/css?family=Monoton' rel='stylesheet'>
        <title>NoCap</title>
        <script src="./scripts/signup.js"></script>
    </head>
    <body>
        <h1 class="title">NoCap?</h1>
        <div class="menu">
            <a href="index.php"><div>home</div></a>
            <a href=""><div>carrello</div></a>
            <a href="login.php"><div>login</div></a>
        </div>
        <?php
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
                    $inserimento = $mysqli->prepare("INSERT INTO users(username, password, email, birthdate) VALUES (?, ?, ?, ?)");
                    $inserimento -> bind_param("sssd", $username, $password, $email, $bday);
                    $inserimento -> execute();
                }
            }else{
                echo '
                    Se non vieni reindirizzato automaticamente, premi <a href="signup.php">qui</a>
                ';
            }
        ?>
    </body>