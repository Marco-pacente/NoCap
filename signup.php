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
            <form onsubmit="return signupSubmit()" action="signup_redirect.php" method="post">
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
                </div>
                <input type="submit" class="submit" value="Registrati">
            </form>
        </div>
    </body>
</html>