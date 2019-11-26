<?php //addtocart.php
if (!session_id()) {
    session_start();
    /*print_r($_SESSION);*/
}

$remId = isset($_POST['removeFromCart']) ? $_POST['removeFromCart'] : '';
if ($remId) {
    unset($_SESSION['shoppingCart'][$_POST['productId']]);
}

header("Location:../showshoppingcart.php");
