<!DOCTYPE html>
<html lang="en">
<?php
require_once("presentation/navigation.php");
if (!session_id()) {
    session_start();
}

$nav = new Nav();
?>

<head>
    <meta charset="UTF-8">
    <?php
    $nav->getViewport();
    $nav->getScriptsAndCSS();
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shoppingcart</title>
</head>
<?php
$nav->getNav();
?>

<body>
    <div id="container">
        <?php showShoppingCart() ?>
    </div>
</body>

</html>