<?php //business/orderService.php

require_once("data/orderDAO.php");

class OrderService
{

    public function getGameOverview()
    {
        $orderDAO = new OrderDAO();
        $list = $orderDAO->getAll();
        return $list;
    }

    public function getUserOrders($id)
    {
        $orderDAO = new OrderDao();
        $game = $orderDAO->getUserOrders($id);
        return $game;
    }
}
