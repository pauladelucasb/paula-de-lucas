<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpiar y sanitizar los datos recibidos del formulario
    $name = strip_tags(trim($_POST["Name"]));
    $email = filter_var(trim($_POST["Email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["Subject"]));
    $message = trim($_POST["Message"]);

    // Validar que los campos obligatorios no estén vacíos y el email sea válido
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Please, complete all the sections.";
        exit;
    }

    // Correo de destino
    $to = "pd758@georgetown.edu";
    
    // Asunto del correo que recibirás
    $email_subject = "Nuevo mensaje de contacto: $subject";
    
    // Construir el cuerpo del mensaje
    $email_content = "Has recibido un nuevo mensaje desde tu sitio web:\n\n";
    $email_content .= "Nombre: $name\n";
    $email_content .= "Correo: $email\n";
    $email_content .= "Asunto: $subject\n\n";
    $email_content .= "Mensaje:\n$message\n";

    // Cabeceras del correo (para que aparezca el correo del usuario como remitente)
    $headers = "From: $email \r\n";
    $headers .= "Reply-To: $email \r\n";

    // Enviar el correo usando la función mail() del servidor
    if (mail($to, $email_subject, $email_content, $headers)) {
        // Si se envía con éxito, redirige a tu página de agradecimiento
        header("Location: thanks.html");
        exit();
    } else {
        http_response_code(500);
        echo "Oops! Something went wrong while sending the message. Please try again later.";
    }
} else {
    http_response_code(403);
    echo "Access denied";
}
?>
