<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\Test\PHPMailer\PHPMailerTest;

require_once '../modele/phpMailer/src/Exception.php';
require_once '../modele/phpMailer/src/PHPMailer.php';
require_once '../modele/phpMailer/src/SMTP.php';

    /*  // hamid
    echo $ajouteNomEns = isset($_GET['ajouteNomEns']) ? $_GET['ajouteNomEns'] : "ggg";
    echo "<pre>";
    echo $validerNomEns = isset($_GET['validerNomEns']) ? $_GET['validerNomEns'] : null;
    if($ajouteNomEns &&  $validerNomEns){
    mail("abdulhamedhajkhalel@gmail.com","demande de ajouter enseigne ","demande de ajouter enseigne ".$ajouteNomEns );
    } 


    // hamid */
    //$mail= new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host ='smtp.gmail.com';
    $mail->SMTPSecure = "ssl";
    $mail->Port=456;

    $mail->isHTML(true);

    $mail->setFrom('abdulhamedhajkhalel@gmail.com', 'MémoRetour');
    $mail->addAddress('abdulhamidhajkhalil@gmail.com');               //Name is optional
   
    $mail->Subject = 'ajouter un ensegne';
    $mail->Body    = 'demande d,ajouter un ensegne <b>AL khalil</b>';
    $mail->send();

    echo "donne";
    echo "<pre>";
    print_r($mail);
    echo "</pre>";

    
require_once('../vue/envoyerEmail.View.php')
?>