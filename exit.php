<?php 
    session_start();
    session_destroy();
    header("Location: index.php");
?>
<p>Se non vieni reindirizzato automaticamente, premi <a href="account">qui</a></p>