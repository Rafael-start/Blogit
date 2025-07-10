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


<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $archivo = "boletin.txt";
        $entrada = $email . "\n";

        // Verifica si ya está registrado
        if (strpos(file_get_contents($archivo), $email) !== false) {
            echo "<h2>Este correo ya está suscrito.</h2>";
        } else {
            file_put_contents($archivo, $entrada, FILE_APPEND | LOCK_EX);
            echo "<h2>¡Gracias por suscribirte!</h2>";
        }
    } else {
        echo "<h2>Correo inválido.</h2>";
    }
} else {
    echo "<h2>Acceso no permitido.</h2>";
}
?>
