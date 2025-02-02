<?php
require_once "Database.php";

class User {
    private $conn;

    public function __construct(Database $database) {
        $this->conn = $database->connect();
    }

    public function getAllUsers() {
        $stmt = $this->conn->query("SELECT id, name, email, status, role, registration_date FROM users ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($name, $email, $status, $role, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO users (name, email, status, role, password, registration_date) VALUES (?, ?, ?, ?, ?, NOW())");
        return $stmt->execute([$name, $email, $status, $role, $hashedPassword]);
    }

    public function deleteUser($id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function updateUser($id, $name, $email, $status, $role, $password, $registration_date) {
        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->conn->prepare("UPDATE users SET name = ?, email = ?, status = ?, role = ?, password = ?, registration_date = ? WHERE id = ?");
            return $stmt->execute([$name, $email, $status, $role, $hashedPassword, $registration_date, $id]);
        } else {
            $stmt = $this->conn->prepare("UPDATE users SET name = ?, email = ?, status = ?, role = ?, registration_date = ? WHERE id = ?");
            return $stmt->execute([$name, $email, $status, $role, $registration_date, $id]);
        }
    }

    public function getTotalActiveUsers() {
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM users WHERE status = 'active'");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
}
?>
