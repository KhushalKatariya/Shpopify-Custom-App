<?php

// Set variables for our request
$shop = $_GET['shop'];
$api_key = "a16418837a392f317a60fdfa99618a65";
$scopes = "read_orders,write_orders,read_products,write_products,read_content,write_content,read_customers,write_customers";
$redirect_uri = "https://localhost/ShopifyApp/SecondApp/token.php";
// $redirect_uri = "https://5d8c-2401-4900-1c80-ddbb-3529-507f-be2f-13cf.ngrok-free.app/ShopifyApp/SecondApp/token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . "/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();