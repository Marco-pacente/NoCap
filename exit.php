<?php 
    session_start();
    session_destroy();
    echo "<script> window.location.href = 'index.php'; </script>"
?>
<p>Se non vieni reindirizzato automaticamente, premi <a href="account">qui</a></p>