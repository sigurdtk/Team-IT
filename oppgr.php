<?php
session_start();
include_once("config.php");
?>

<html>
	<head>
		<title>Hvordan du tar kontakt med nettsiden</title>
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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


 

 

    
	
<?php
    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<div class="bakgrunn">


<h2 align="center"><font color="black"> Hvordan du kommer i kontakt med oss</h2>

 
	

<table> 
<br>
<br>
	<table align="center">
		<thead>
		 <th align="left"><font color="black">Kontakt oss gjerne gjennom telefon via nr:45234645<br>Eller kontakt oss gjennom E-post dersom du har noen sp&oslash;rsm&aring;l </th>
			
		</thead>
		
		<th align="left"><font color="black"><br> For &aring; kontakte oss gjennom E-post vennligst fyll ut nedenfor </th>
		



		    
		    
</table>
 
 
 
<form name="contactform" method="post" action="kontaktskjema.php">
<table align="center" width="450px">
<tr>
 <td valign="top">
  <label for="first_name">Fornavn *</label>
 </td>
 <td valign="top">
  <input  type="text" name="first_name" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top"">
  <label for="last_name">Etternavn *</label>
 </td>
 <td valign="top">
  <input  type="text" name="last_name" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="email">E-Post *</label>
 </td>
 <td valign="top">
  <input  type="text" name="email" maxlength="80" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="telephone">Telefon nummer</label>
 </td>
 <td valign="top">
  <input  type="text" name="telephone" maxlength="30" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="comments">Melding *</label>
 </td>
 <td valign="top">
  <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
 </td>
</tr>
<tr>
 <td colspan="2" style="text-align:center">
  <input type="submit" value="Send">    
 </td>
</tr>
</table>
</form>


</div>

</body>
</html>