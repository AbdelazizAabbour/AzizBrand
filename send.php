<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de Commande</title>
    <link rel="stylesheet" href="./send.css">
</head>
<body>
<header>
        <div class="header-container">
            <a href="./index.html" class="logo" >BadrBrand</a>
        </div>
    </header>
<div id="confirmation-message">
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    $scrollToForm = false;

    if (isset($_POST["send"])) {
        $nom = htmlspecialchars($_POST["nom"]);
        $tel = htmlspecialchars($_POST["tel"]);
        $ville = htmlspecialchars($_POST["ville"]);
        $adresse = htmlspecialchars($_POST["adresse"]);
        $email = htmlspecialchars($_POST["email"]);
        $message = htmlspecialchars($_POST["message"]);

        $body = "
        <h2>Nouvelle commande reçue :</h2>
        <p><strong>Nom complet :</strong> $nom</p>
        <p><strong>Téléphone :</strong> $tel</p>
        <p><strong>Ville :</strong> $ville</p>
        <p><strong>Adresse :</strong> $adresse</p>
        <p><strong>Email :</strong> $email</p>
        <p><strong>Message :</strong><br>$message</p>
        ";

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'azizabour77@gmail.com';
            $mail->Password = 's y z l a c e t u r c n c a b q'; 
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('azizabour77@gmail.com', 'Formulaire Commande');
            $mail->addAddress('azizabour77@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = 'Nouvelle commande client';
            $mail->Body = $body;

            $mail->send();

            echo '<div class="success-box">✅ Votre commande a été envoyée avec succès.</div>';
            $scrollToForm = true;

        } catch (Exception $e) {
            echo '<div class="error-box">❌ Erreur : ' . $mail->ErrorInfo . '</div>';
            $scrollToForm = true;
        }
    }
    ?>
</div>

<section>
    <div>
        <form action="" method="post" id="contact-form">
            <label>Nom complet :</label>
            <input type="text" name="nom" required>

            <label>Numéro de téléphone :</label>
            <input type="text" name="tel" required>

            <label>Ville :</label>
            <input type="text" name="ville" required>

            <label>Adresse :</label>
            <input type="text" name="adresse" required>

            <label>Email (optionnel) :</label>
            <input type="email" name="email">

            <label>Message (optionnel) :</label>
            <textarea name="message" rows="5"></textarea>

            <button type="submit" name="send">Envoyer la commande</button>
        </form>
    </div>
</section>

<script>
    setTimeout(() => {
        const msg = document.getElementById('confirmation-message');
        if (msg) msg.innerHTML = '';
    }, 3000);

    <?php if ($scrollToForm): ?>
        window.scrollTo({
            top: document.getElementById("contact-form").offsetTop,
            behavior: "smooth"
        });
    <?php endif; ?>
</script>

</body>
</html>
