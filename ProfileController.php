<?php

require_once 'userContactManager.php';
require_once 'database.php';

class ProfileController {
    private $userManager;
    private $contactMessageManager;

    public function __construct($userManager, $contactMessageManager) {
        $this->userManager = $userManager;
        $this->contactMessageManager = $contactMessageManager;
    }

    public function deleteMessage($messageId) {
        return $this->contactMessageManager->deleteMessage($messageId);
    }

    public function getTotalUsers() {
        return $this->userManager->getTotalUsers();
    }

    public function getRecentMessages() {
        return $this->contactMessageManager->getRecentMessages();
    }

    public function handleRequest() {
        if (isset($_GET['delete_message_id'])) {
            $messageId = $_GET['delete_message_id'];
            $result = $this->deleteMessage($messageId);
            echo json_encode(['status' => $result ? 'success' : 'failure']);
            exit();
        }

        $totalUsers = $this->getTotalUsers();
        $recentMessages = $this->getRecentMessages();

        return [$totalUsers, $recentMessages];
    }
}
?>
