<?php
    session_start();
    if(!isset($_SESSION["username"])){
        echo "Prima di aggiungere un articolo al carrello devi effettuare l'accesso. Accedi <a href='login.php'>Qui</a>">
        exit();
    }
    $username = $_SESSION["username"];
    $mysqli = new mysqli("localhost", "root", "", "cappelli");
    $query = "SELECT id_user FROM users WHERE username = '" . $username . "'";
    $user_id = $mysqli -> query($query);
    $user_id = $user_id -> fetch_array()["id_user"];
    $storage_id = $_GET["id"];
    $insert = $mysqli -> prepare("INSERT INTO carrello (id_storage, id_user) VALUES ((?), (?))");
    $insert -> bind_param("ii", $storage_id, $user_id);
    $insert -> execute();
    $mysqli -> close();
    echo "<script>window.location.href = 'shoppingcart.php';</script>";
    echo "Se non vieni reindirizzato automaticamente, premi <a href='account'>qui</a>";
?>