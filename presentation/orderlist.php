<!DOCTYPE HTML> <!-- presentation/orderlist.php -->
<html>
<?php
require_once("presentation/navigation.php");
if (!session_id()) {
    session_start();
}

$nav = new Nav();
?>

<head>
    <meta charset=utf-8>
    <?php
    $nav->getViewport();
    $nav->getScriptsAndCSS();
    ?>
    <title>Orders</title>
</head>
<?php
$nav->getNav();
?>

<body>
    <div class="container">
        <h1>Orderlist</h1>
        <?php
        showOrderList($orderList);
        ?>
    </div>

</body>

</html>