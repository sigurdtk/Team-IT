<?php
if(isset($_POST['email'])) {
     
    
    $email_to = "datakjop@outlook.com";
    $email_subject = "Tilbakemeldinger";
     
     
    function died($error) {
        // your error code can go here
        echo "Vi beklager, men det har oppstått en feil under sendelsen av tilbakemeldingen.";
        echo "Feil(ene) kan sees under.<br /><br />";
        echo $error."<br /><br />";
        echo "Venligst prøv på nytt.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
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
    $email_message .= "Tilbakemelding: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 


<html>

	<head>
		<title>Takk for din hendvenelse</title>
	<link rel="stylesheet" type="text/css" href="hoved.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
	</head>
	<body>
<div id="container"container>
 


<div id="header">
 

</div>


<div id='cssmenu'>
<ul>
   <li class='active'><a href='hoved.html'><span>Hjem</span></a></li>
   <li class='has-sub'><a href='#'><span>Produkter</span></a>
      <ul>
         <li><a href='#'><span>Mobil</span></a></li>
         <li><a href='#'><span>Stasjonær</span></a></li>
         <li class='last'><a href='#'><span>Bærbar</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Om oss</span></a>
      <ul>
         <li><a href='#'><span>Gjestebok</span></a></li>
         <li class='last'><a href='#'><span>Hvem er vi</span></a></li>
      </ul>
   </li>
   <li class='last'><a href='#'><span>Kontakt oss</span></a></li>
</ul>
</div>






 

<p align="center"><b>Din tilbakemelding er blitt motatt!</b></p>

<p align="center"> 
Takk for at du har sendt oss tilbakemelding oss, vi setter pris p&aring; alle hendvendelser fra kundene v&aring;re!<br>
Din tilbakemelding vil bli behandlet s&aring; fort som mulig.
<br><a href="hoved.html"> Trykk her for &aring; returnere til nettsiden</a></p>

</body>
</html>
 
 
<?php
}
?>