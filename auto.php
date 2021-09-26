<?php

$errorMSG = "";

 use PHPMailer\PHPMailer\PHPMailer;

if($_POST['request'] && $_POST['request']=='contact')
{

// NAME
if (empty($_POST["frmname"])) {
    $errorMSG = "Name is required ";
} else {
    $frmname = $_POST["frmname"];
}

// Location
if (empty($_POST["frmlocation"])) {
    $errorMSG = "Location is required ";
} else {
    $frmlocation = $_POST["frmname"];
}

// Email
if (empty($_POST["frmemail"])) {
    $errorMSG = "Email is required ";
} else {
    $frmemail = $_POST["frmemail"];
}

// Phone
if (empty($_POST["frmphone"])) {
    $errorMSG = "Phone is required ";
} else {
    $frmphone = $_POST["frmphone"];
}
 
// Designation
if (empty($_POST["frmdesignation"])) {
    $errorMSG = "Designation is required ";
} else {
    $frmdesignation = $_POST["frmdesignation"];
}

// Message
if (empty($_POST["frmmessage"])) {
    $errorMSG = "Message is required ";
} else {
    $frmmessage = $_POST["frmmessage"];
}

require_once 'PHPMailer/PHPMailer.php';
include_once "PHPMailer/Exception.php";
include_once "PHPMailer/SMTP.php";

$mail = new PHPMailer(true);
//$mail->IsSMTP();
$mail->CharSet    = 'UTF-8';
$mail->SMTPDebug  = 0;
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "TLS";
$mail->Port       = 587;
$mail->Username   = "adenola.uthman@dmtca.com";
$mail->Password   = "olasco12345@!";
$mail->Host       = "smtp.gmail.com";

$mail->setFrom('adenola.uthman@dmtca.com', 'Adenola');
$mail->addAddress('adenola.uthman@dmtca.com', 'Adenola');

$mail->isHTML(true);
$mail->Subject     = 'New request from'." ".$frmname ." " .'to you';
$mail->Body        = //<<<EOD
     '<strong>Name:</strong>'.$frmname.' <br>
     <strong>Email:</strong>'.$frmemail.' <br>
     <strong>Phone:</strong> '.$frmphone.' <br>
     <strong>Location:</strong> '.$frmlocation.' <br>
     <strong>Message:</strong> '.$frmmessage .'<br>';
     
     if($mail->Send()) {
 require_once 'PHPMailer/PHPMailer.php';
//include_once "PHPMailer/Exception.php";
include_once "PHPMailer/SMTP.php";
   $autoRespond = new PHPMailer();

 // $autoRespond->IsSMTP();
   $autoRespond->CharSet    = 'UTF-8';
   $autoRespond->SMTPDebug  = 0;
   $autoRespond->SMTPAuth   = TRUE;
   $autoRespond->SMTPSecure = "TLS";
   $autoRespond->Port       = 587;
   $autoRespond->Username   = "adenola.uthman@dmtca.com";
   $autoRespond->Password   = "olasco12345@!";
   $autoRespond->Host       = "smtp.gmail.com";

   $autoRespond->setFrom('adenola.uthman@dmtca.com', 'Adenola');
   $autoRespond->addAddress($frmemail);
   $autoRespond->Subject = "AutoResponse: We received your submission"; 
   $autoRespond->Body = "We received your submission. We will contact you";

   $autoRespond->Send(); 
     }
     // redirect to success page
if ($autoRespond && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}	

     }


?>