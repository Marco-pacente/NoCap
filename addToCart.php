<?php
    session_start();
    if(!isset($_SESSION["username"])){
        ?>
            <p>Prima di aggiungere un articolo al carrello devi effettuare l'accesso. Accedi <a href='login.php'>Qui</a></p>
        <?php
        exit();
    }
    $username = $_SESSION["username"];
    $mysqli = new mysqli("localhost", "root", "", "cappelli");
    $query = "SELECT id_user FROM users WHERE username = '" . $username . "'";
    $user_id = $mysqli -> query($query);
    $user_id = $user_id -> fetch_array()["id_user"];
    $storage_id = $_GET["id"];
    $query_id = $mysqli -> prepare("SELECT * FROM storage WHERE id_storage = (?)");
    $query_id -> bind_param("i", $storage_id);
    
    
    $insert = $mysqli -> prepare("INSERT INTO carrello (id_storage, id_user) VALUES ((?), (?))");
    $insert -> bind_param("ii", $storage_id, $user_id);
    $insert -> execute();
    $mysqli -> close();    
    header("Location: account.php");
    echo "Se non vieni reindirizzato automaticamente, premi <a href='account.php'>qui</a>";
?>