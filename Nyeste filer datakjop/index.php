<?php
session_start();
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Der du gjor datahandelen din</title>
	<link rel="stylesheet" type="text/css" href="hoved.css">
	<link rel='stylesheet' type='text/css' href='styles.css' />
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- -->
<div id="wrap">
	 
	
<div id="container">



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

<div id='cssmenu1'>
<ul>
   <li class='active'><a href='#'><span>Kategorier</span></a></li>
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
   <li class='has-sub'><a href='#'><span>Stasjonær</span></a>
   <li class='has-sub'><a href='#'><span>Bærbar</span></a>
   <ul>
   <li><a href='#'><span>Acer</span></a></li>
         <li class='last'><a href='#'><span>ASUS</span></a></li>
   </ul>
   <li class='last'><a href='#'><span>Kontakt oss</span></a></li>
</ul>
</div>



<!-- Lagt til kode -->


<div id="products-wrapper">
    <h1>Products</h1>
    <div class="products">
    <?php
    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
	$results = $mysqli->query("SELECT * FROM products ORDER BY id ASC");
    if ($results) { 
        //output results from database
        while($obj = $results->fetch_object())
        {
			
			echo '<div class="product">'; 
            echo '<form method="post" action="cart_update.php">';
			echo '<div class="product-thumb"><img src="images/'.$obj->product_img_name.'"></div>';
            echo '<div class="product-content"><h3>'.$obj->product_name.'</h3>';
            echo '<div class="product-desc">'.$obj->product_desc.'</div>';
            echo '<div class="product-info">Price '.$currency.$obj->price.' <button class="add_to_cart">Add To Cart</button></div>';
            echo '</div>';
            echo '<input type="hidden" name="product_code" value="'.$obj->product_code.'" />';
            echo '<input type="hidden" name="type" value="add" />';
			echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
            echo '</form>';
            echo '</div>';
        }
    
    }
    ?>
    </div>
    
<div class="shopping-cart">
<h2>Your Shopping Cart</h2>
<?php
if(isset($_SESSION["products"]))
{
    $total = 0;
    echo '<ol>';
    foreach ($_SESSION["products"] as $cart_itm)
    {
        echo '<li class="cart-itm">';
        echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
        echo '<h3>'.$cart_itm["name"].'</h3>';
        echo '<div class="p-code">P code : '.$cart_itm["code"].'</div>';
        echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
        echo '<div class="p-price">Price :'.$currency.$cart_itm["price"].'</div>';
        echo '</li>';
        $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
        $total = ($total + $subtotal);
    }
    echo '</ol>';
    echo '<span class="check-out-txt"><strong>Total : '.$currency.$total.'</strong> <a href="view_cart.php">Check-out!</a></span>';
}else{
    echo 'Your Cart is empty';
}
?>
</div>
    
</div>
<div id="footer">footer</div>


</div> 



</body>
</html>
