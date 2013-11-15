<?php
session_start();
include_once("config.php");
?>

<?php
mysql_connect("boltit.uia.no","sigurk11","2ubYnU7upA2eryta");
mysql_select_db("sigurk11");
$name=$_POST['name'];
$comment=$_POST['comment'];
$submit=$_POST['submit'];
 
$dbLink = mysql_connect("boltit.uia.no", "sigurk11", "2ubYnU7upA2eryta");
    mysql_query("SET character_set_client=utf8", $dbLink);
    mysql_query("SET character_set_connection=utf8", $dbLink);
 
if($submit)
{
if($name&&$comment)
{
$insert=mysql_query("INSERT INTO commentable (name,comment) VALUES ('$name','$comment') ");
}
else
{
echo "please fill out all fields";
}
}
?>

<html>
<head>
		<title>Her kan du skrive tilbakemeldinger</title>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="styles.css">
		 
	</head>
 
<body>
<?php
include ("bakgrunn.php");
?>
<br>
 <?php
include ("shopping_cart.php");
?>
<div class="bakgrunn">
<table> 
<br>
<br>
	<table align="center">
		<thead>
		 <th>Dersom du &oslash;nsker &aring; dele erfaringer med kundeservice og lignende fra denne nettsiden,<br> da kan du sende oss en tilbakemelding.<br><br> Vennligst fyll ut rutene nedenfor.<br></br> </th>
			
		</thead>
		
	 
		
	 

</div> 
		    
		    
</table>

<center>
<form action="kommentar.php" method="POST">
<table>
<tr><td>Navn: <br><input type="text" name="name"/></td></tr>
<tr><td colspan="2">Tilbakemelding: </td></tr>
<tr><td colspan="5"><textarea name="comment" rows="10" cols="50"></textarea></td></tr>
<tr><td colspan="2"><input type="submit" name="submit" value="Comment"></td></tr>
</table>
</form>

<?php
$dbLink = mysql_connect("boltit.uia.no", "sigurk11", "2ubYnU7upA2eryta");
    mysql_query("SET character_set_results=utf8", $dbLink);
    mb_language('uni');
    mb_internal_encoding('UTF-8');
 
$getquery=mysql_query("SELECT * FROM commentable ORDER BY id DESC");
while($rows=mysql_fetch_assoc($getquery))
{
$id=$rows['id'];
$name=$rows['name'];
$comment=$rows['comment'];
echo $name . '<br/>' . '<br/>' . $comment . '<br/>' . '<br/>' . '<hr size="1"/>'
;}
?>
 
</body>
</html>