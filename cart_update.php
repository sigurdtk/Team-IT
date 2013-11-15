<?php
session_start();
include_once("config.php");

//Legg produkt i handlevogn
if(isset($_POST["type"]) && $_POST["type"]=='add')
{
	$product_code 	= filter_var($_POST["product_code"], FILTER_SANITIZE_STRING); //produkt kode
	$return_url 	= base64_decode($_POST["return_url"]); //url return
	
	//MySqli query - får detaljer om produkt fra db ved å bruke produktkode
	$results = $mysqli->query("SELECT product_name,price FROM products WHERE product_code='$product_code' LIMIT 1");
	$obj = $results->fetch_object();
	
	if ($results) { //vi har produktinfoen
		
		//forbrered array for session variable
		$new_product = array(array('name'=>$obj->product_name, 'code'=>$product_code, 'qty'=>1, 'price'=>$obj->price));
		
		if(isset($_SESSION["products"])) //hvis vi har session
		{
			$found = false; //sett funnet produkt til false
			
			foreach ($_SESSION["products"] as $cart_itm) //loop gjennom session array
			{
				if($cart_itm["code"] == $product_code){ //hvis produktet eksisterer i array
					$qty = $cart_itm["qty"]+1; //forhøy kvantiteten
					$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$qty, 'price'=>$cart_itm["price"]);
					$found = true;
				}else{
					//produkt eksisterer ikke i listen,hent gammel informasjon og forbered array for session var
					$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
				}
			}
			
			if($found == false) //hvis vi ikke finner produktet i array
			{
				//legg til ny bruker produkt i array
				$_SESSION["products"] = array_merge($product, $new_product);
			}else{
				//finner bruker produkt i array liste, hever antallet
				$_SESSION["products"] = $product;
			}
			
		}else{
			//create a new session var if does not exist
			$_SESSION["products"] = $new_product;
		}
		
	}
	
	//redirect back to original page
	header('Location:'.$return_url);
}

//remove item from shopping cart
if(isset($_GET["removep"]) && isset($_GET["return_url"]) && isset($_SESSION["products"]))
{
	$product_code 	= $_GET["removep"]; //get the product code to remove
	$return_url = base64_decode($_GET["return_url"]); //get return url
	
	foreach ($_SESSION["products"] as $cart_itm) //loop through session array var
	{
		if($cart_itm["code"]==$product_code){ //item exist in the list
			
			//continue only if quantity is more than 1
			//removing item that has 0 qty
			if($cart_itm["qty"]>1) 
			{
			$qty = $cart_itm["qty"]-1; //just decrese the quantity
			//prepare array for the products session
			$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$qty, 'price'=>$cart_itm["price"]);
			}
			
		}else{
			$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
		}
		
		//set session with new array values
		$_SESSION["products"] = $product;
	}
	
	//redirect back to original page
	header('Location:'.$return_url);
}
?>