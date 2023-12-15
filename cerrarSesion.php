<?php
session_start(); // Inicia la sesión si no se ha iniciado todavía

// Si el usuario hace clic en el botón para cerrar sesión
if(isset($_POST['logout'])) {
    // Elimina todas las variables de sesión
    session_unset();

    // Destruye la sesión
    session_destroy();

    // Redirige al usuario a la página de inicio de sesión o a donde desees
    header("Location: login.html");
    exit();
}
?>
