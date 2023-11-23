<?php

$shop_url = $_GET['shop'];

header('location: install.php?shop=' . $shop_url);
exit();

?>