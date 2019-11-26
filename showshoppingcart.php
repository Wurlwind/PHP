<?php
if (!session_id()) {
    session_start();
    /*print_r($_SESSION);*/
}

require_once("business/gameService.php");

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {

    if (!(isset($_SESSION['shoppingCart']))) {
        $_SESSION['shoppingCart'] = array();
    }

    function showShoppingCart()
    {
        echo "<table>
            <th>Game</th>
            <th>Amount</th>
            <th>Price Per Unit</th>
            <th>Total Price</th>";
        $cartTotal = 0;
        $gameSvc = new GameService();
        if (count($_SESSION['shoppingCart']) != 0) {
            foreach ($_SESSION['shoppingCart'] as $cartItem => $itemAmount) {
                $game = $gameSvc->getById($cartItem);
                $title = $game->getGameTitle();
                $price = $game->getPrice();
                $totalPrice = $itemAmount * $price;
                $cartTotal += $totalPrice;

                echo "<tr>";
                echo "<td>" . $title . "</td>";
                echo "<td>" . $itemAmount . "</td>";
                echo "<td>€" . $price . "</td>";
                echo "<td>€" . $totalPrice . "</td>";
                echo "<td><form action='./functions/removefromcart.php' method='post'>
                  <input type='hidden' name='productId' value='" . $cartItem . "'>
                  <input type='submit' name='removeFromCart' value='Remove'>
                  </form>
                  </td>";
                echo "</tr>";
            }
            echo "Total Price: €" . $cartTotal;
            echo "<form action='./functions/placeorder.php' method='post'>
          <input type='submit' name='placeOrder' value='Place Order'></form>";
        }
        echo "</table><br />";
    }
} else {
    header("location: homepage.php");
    exit;
}
include("presentation/shoppingcart.php");
