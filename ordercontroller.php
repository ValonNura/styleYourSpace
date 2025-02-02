<?php

class OrderController {
    private $orderManager;

    public function __construct($orderManager) {
        $this->orderManager = $orderManager;
    }

    public function listOrders() {
        try {
            return $this->orderManager->getAllOrders();
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getOrder($id) {
        try {
            $order = $this->orderManager->getOrderById($id);
            if (!$order) {
                throw new Exception("Order not found.");
            }
            return $order;
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function updateOrder($id, $status, $quantity) {
        try {
            return $this->orderManager->updateOrder($id, $status, $quantity);
        } catch (Exception $e) {
            return false;
        }
    }

    public function deleteOrder($id) {
        try {
            return $this->orderManager->deleteOrder($id);
        } catch (Exception $e) {
            return false;
        }
    }

    public function filterOrders($search = '', $status = 'all', $date = '') {
        try {
            return $this->orderManager->filterOrders($search, $status, $date);
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
    
}