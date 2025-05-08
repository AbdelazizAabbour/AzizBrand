<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de Commande</title>
    <style>
          :root {
            --primary-color: #2f2f2f;
            --text-dark: #18181b;
            --text-light: #71717a;
            --white: #ffffff;
            --max-width: 1200px;
            --header-font: "Lora", serif;
            --body-font: "Poppins", sans-serif;
            --accent-color: #9f7e54;
            --bg-light: #f8f8f8;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        body {
            font-family: var(--body-font);
            background-color: var(--bg-light);
            padding: 2rem;
            margin: 0;
        }

        form {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease;
        }

        input, textarea {
            width: 100%;
            padding: 1rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-family: var(--body-font);
        }

        button {
            background-color: var(--accent-color);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1rem;
            transition: transform 0.3s ease;
        }

        button:hover {
            transform: scale(1.05);
        }

        #confirmation-message {
            text-align: center;
            font-family: var(--body-font);
            margin-bottom: 2rem;
            transition: opacity 1s ease;
        }

        .success-box {
            display: inline-block;
            padding: 1.5rem 2rem;
            border-radius: 12px;
            font-weight: bold;
            font-size: 1.3rem;
            background-color: #d1fae5;
            color: #065f46;
            border: 2px solid #10b981;
            box-shadow: 0 0 20px #10b981;
            animation: fadeIn 1s ease-in-out;
        }

        .error-box {
            display: inline-block;
            padding: 1.5rem 2rem;
            border-radius: 12px;
            font-weight: bold;
            font-size: 1.3rem;
            background-color: #fee2e2;
            color: #991b1b;
            border: 2px solid #dc2626;
            box-shadow: 0 0 20px #dc2626;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>
</head>
<body>

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
            $mail->Subject = '📦 Nouvelle commande client';
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
