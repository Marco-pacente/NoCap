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
        </div>
        <?php
            $isValid = true;
            $email = trim($_POST["email"]); 
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);
            $bday = trim($_POST["bday"]);
            if(strlen($username)<4 || strlen($username)>20){
                $isValid = false;
                echo("Username non valido");
            }
            if(strlen($email))
        ?>
    </body>