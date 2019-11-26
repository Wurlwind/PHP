<?php //showallgames.php
if (!session_id()) {
    session_start();
    //print_r($_SESSION);
}
require_once("business/orderService.php");

$orderSvc  = new OrderService();
$orderList = $orderSvc->getUserOrders($_SESSION['userId']);

function showOrderList($orderlist)
{
    $curUrl = $_SERVER['REQUEST_URI'];
    foreach ($orderlist as $order) {
        echo "<div class='listedOrders'>";

        echo ("Order: " . $order->getId() . "  |  Ordered On: " . $order->getDate() . "<br/>");
        echo ("Total Price of Order: €" . $order->getTotalPrice() . "<br/>");
        echo "<table><tr>";
        echo "<th>Game</th> <th>Amount</th> <th>Price Per Unit</th><th>Total Price</th></tr>";
        foreach ($order->getGames() as $game) {
            $totalPrice = $game[1] * $game[2];
            echo "<tr>";
            echo "<td>$game[0]</td>";
            echo "<td>$game[1]</td>";
            echo "<td>€$game[2]</td>";
            echo "<td>€$totalPrice</td>";
            echo "</tr>";
        }
        echo "<table><br/>";
    }
}

include("presentation/orderlist.php");
