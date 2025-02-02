<?php
class DashboardController {
    private $dashboardManager;

    public function __construct($dashboardManager) {
        $this->dashboardManager = $dashboardManager;
    }

    public function getDashboardData() {
        return [
            'totalUsers' => $this->dashboardManager->getTotalUsers(),
            'totalOrders' => $this->dashboardManager->getTotalOrders(),
            'totalRevenue' => $this->dashboardManager->getTotalRevenue(),
            'bestSellingProducts' => $this->dashboardManager->getBestSellingProducts(),
            'recentOrders' => $this->dashboardManager->getRecentOrders(),
            'recentContacts' => $this->dashboardManager->getRecentContacts()
        ];
    }
}
?>
