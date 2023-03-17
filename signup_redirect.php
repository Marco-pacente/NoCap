<?php
    $isValid = true;
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $bday = date('Y-m-d', strtotime($_POST['bday']));


    if(strlen($username)<4 || strlen($username)>20){
        $isValid = false;
        echo("Username non valido<br>");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("Email non valida<br>");
    $isValid = false;
    }
    if(strlen($password)<8){
        echo("La password deve essere di almeno 8 caratteri<br>");
        $isValid = false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    if($isValid){
        $mysqli = new mysqli("localhost", "root", "", "cappelli");
        if($mysqli -> connect_errno){
            echo $mysqli -> connect_error;
            exit();
        }else{
            $username_query = $mysqli -> prepare("SELECT * from users where username = (?)");
            $username_query -> bind_param("s", $username);
            $username_query -> execute(); 
            $usn_rows = $username_query -> get_result();
            $email_query = $mysqli -> prepare("SELECT * from users where email = (?)");
            $email_query -> bind_param("s", $email);
            $email_query -> execute();
            $email_rows = $email_query -> get_result();
            if($usn_rows -> num_rows != 0 || $email -> num_rows != 0){
                echo "Un account con questo username o email esiste già<br>";
            }else{
                $inserimento = $mysqli->prepare("INSERT INTO users(username, password, email, birthdate) VALUES (?, ?, ?, ?)");
                $inserimento -> bind_param("ssss", $username, $password, $email, $bday);
                $inserimento -> execute();
                if ($mysqli -> errno == 0){
                    echo "<h1>Registrazione effettuata con successo!</h1>";
                    session_start();
                    $_SESSION["Account"] = $username;
                    echo "<script>seTimeOut(loadAccount, 2000)</script>";
                }else{
                    echo "errore " . $mysqli -> error   ;
                }
            }
        }
        echo "<div>Se non vieni reindirizzato automaticamente, premi <a href='account.php'>qui</a> </div>";
        $mysqli -> close();
    }
?>