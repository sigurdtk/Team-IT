<?php
session_start();
include_once("config.php");
?>

<?php
if(isset($_POST['email'])) {
     
    
    $email_to = "datakjop@outlook.com";
    $email_subject = "Kontakt";
     
     
    function died($error) {
        // your error code can go here
        echo "Vi beklager, men det har oppstått en feil under kontaktforsøket.";
        echo "Feil(ene) kan sees under.<br /><br />";
        echo $error."<br /><br />";
        echo "Venligst prøv på nytt.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('Vi beklager men det har oppstått noen feil her.');       
    }
     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'E-post adressen er ikke gyldig.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'Ditt fornavn viser seg å være ugyldig.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'Ditt etternavn viser seg å være ugyldig.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'Ugyldig kommentar. Prøv på nytt.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Kundemelding under.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Fornavn: ".clean_string($first_name)."\n";
    $email_message .= "Etternavn: ".clean_string($last_name)."\n";
    $email_message .= "E-post: ".clean_string($email_from)."\n";
    $email_message .= "Telefon Nummer: ".clean_string($telephone)."\n";
    $email_message .= "Melding: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 


<html>

	<head>
		<title>Takk for din hendvenelse</title>
	 
	<link rel="stylesheet" type="text/css" href="styles.css">
	 
	</head>
	<?php
include ("bakgrunn.php");
?>
	<body>
<br>
 

  <?php
include ("shopping_cart.php");
?>





 

<p align="center"><b>Din melding er blitt motatt!</b></p>

<p align="center"> 
Takk for at du kontaktet oss, vi setter pris p&aring; alle hendvendelser fra kundene v&aring;re!<br>
Din melding vil bli behandlet s&aring; fort som mulig.
<br><a href="index.php"> Trykk her for &aring; returnere til nettsiden</a></p>

</body>
</html>
 
 
 
<?php
}
?>