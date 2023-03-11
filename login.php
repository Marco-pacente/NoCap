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
        </div>

        <div class="login-container">
            <form action="" method="post" onsubmit="">
                <div>
                    <label for="username"><b>Username</b></label> 
                    <input type="text" placeholder="Inserisci l'username" id="username">
                </div>
                <div>
                    <label for="password"><b>Password</b></label> 
                    <input type="password" placeholder="Inserisci la password" name="Password" id="password"> 
                </div>
                <input type="submit" value="Accedi" class="submit">
            </form>
        </div>
        <div>Non hai un account? <a href="signup.php">Registrati</a></div>
    </body>
</html>