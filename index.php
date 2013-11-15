
<?php
session_start();
include_once("config.php");

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Der du gjor datahandelen din</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
</head>
<body>


<?php
include ("bakgrunn.php");
?>
<?php
include ("forside.php");
?>
<?php
include ("shopping_cart.php");
?>


</body>
</html>
