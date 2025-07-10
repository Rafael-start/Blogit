<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = htmlspecialchars($_POST["nombre"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars($_POST["mensaje"]);

    $destinatario = "vivepuntacanoa@vivepuntacanoa.com"; // ← cámbialo si quieres
    $asunto = "Nuevo mensaje desde el formulario de VivePuntaCanoa";

    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo: $email\n";
    $contenido .= "Mensaje:\n$mensaje\n";

    $cabeceras = "From: $email";

    if (mail($destinatario, $asunto, $contenido, $cabeceras)) {
        echo "<h2>Gracias, $nombre. Tu mensaje fue enviado correctamente.</h2>";
    } else {
        echo "<h2>Lo sentimos, hubo un problema al enviar tu mensaje.</h2>";
    }
} else {
    echo "<h2>Acceso no permitido.</h2>";
}
?>

