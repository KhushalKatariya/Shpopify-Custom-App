<?php

// Set variables for our request
$shop = $_GET['shop'];
$api_key = "your_api_key";
$scopes = "read_orders,write_orders";
$redirect_uri = "http://localhost/";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . "/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();
