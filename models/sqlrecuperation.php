<?php
require_once 'sqlparameters.php';
//Vérification de l'existence du compte en BDD
try {
    $sth = $db->prepare('SELECT * FROM `users` WHERE `mailBox` = :mailBox');
    $sth->bindValue(':mailBox', $recuperationMailbox, PDO::PARAM_STR);
    $sth->execute();
    $userInformations = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
if (empty($userInformations)) {
    $errors['recuperationMailbox'] = 'Aucun compte n\'est associé à l\'adresse ' . $recuperationMailbox . '.';
} else {
    $expFormat = mktime(
        date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y")
    );
    $expDate = date('d-m-Y H:i:s', $expFormat);
    $key = md5(2418 * 2 + $recuperationMailbox);
    $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
    $key = $key . $addKey;
    // Insertion dans la table temporaire
    $sth = $db->prepare('INSERT INTO `password_reset_temp` (`email`, `key`, `expiration_date`)
VALUES (:mailBox, :recuperationKey, :expDate)');
    $sth->bindValue(':mailBox', $recuperationMailbox, PDO::PARAM_STR);
    $sth->bindValue(':recuperationKey', $key, PDO::PARAM_STR);
    $sth->bindValue(':expDate', $expDate, PDO::PARAM_STR);
    $sth->execute();

    $output = '<p>Cher utilisateur,</p>';
    $output .= '<p>Veuillez cliquer sur le lien suivant pour réinitialiser votre mot de passe.</p>';
    $output .= '<p>-------------------------------------------------------------</p>';
    $output .= '<p><a href="http://fill.info/reset-password.php?
key=' . $key . '&email=' . $recuperationMailbox . '&action=reset" target="_blank">
http://fill.info/reset-password.php
?key=' . $key . '&email=' . $recuperationMailbox . '&action=reset</a></p>';
    $output .= '<p>-------------------------------------------------------------</p>';
    $output .= '<p>Merci de bien vouloir copier le lien entier dans votre navigateur.
Ce lien expirera après un jour pour des raisons de sécurité.</p>';
    $output .= '<p>Si vous n\'êtes pas à l\'origine de cette demande, aucune action n\'est requise, votre mot de passe ne sera pas réinitialisé.
Cependant, vous devriez vous connecter à votre compte et changez votre mot de passe de sécurité car quelqu\'un l\'a peut-être deviné.</p>';
    $output .= '<p>Merci,</p>';
    $output .= '<p>L\'équipe Fill</p>';
    $body = $output;
    $subject = "Password Recovery - AllPHPTricks.com";

    $email_to = $recuperationMailbox;
    $fromserver = "noreply@yourwebsite.com";
    //require("PHPMailer/PHPMailerAutoload.php");
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "mail.yourwebsite.com"; // Enter your host here
    $mail->SMTPAuth = true;
    $mail->Username = "noreply@yourwebsite.com"; // Enter your email here
    $mail->Password = "password"; //Enter your password here
    $mail->Port = 25;
    $mail->IsHTML(true);
    $mail->From = "noreply@yourwebsite.com";
    $mail->FromName = "AllPHPTricks";
    $mail->Sender = $fromserver; // indicates ReturnPath header
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($email_to);
    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "<div class='error'>
<p>An email has been sent to you with instructions on how to reset your password.</p>
</div><br /><br /><br />";
    }
}