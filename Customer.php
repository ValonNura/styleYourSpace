<?php
class Customer {
    private $first_name;
    private $last_name;
    private $email;
    private $telephone;
    private $address;
    private $city;
    private $state_province;
    private $zip_code;
    private $country;
    private $comments;
    private $errors = [];

    public function __construct($data) {
        $this->first_name = htmlspecialchars(trim($data['first_name'] ?? ''));
        $this->last_name = htmlspecialchars(trim($data['last_name'] ?? ''));
        $this->email = filter_var($data['email'] ?? '', FILTER_SANITIZE_EMAIL);
        $this->telephone = htmlspecialchars(trim($data['telephone'] ?? ''));
        $this->address = htmlspecialchars(trim($data['address'] ?? ''));
        $this->city = htmlspecialchars(trim($data['city'] ?? ''));
        $this->state_province = htmlspecialchars(trim($data['state_province'] ?? ''));
        $this->zip_code = htmlspecialchars(trim($data['zip_code'] ?? ''));
        $this->country = htmlspecialchars(trim($data['country'] ?? ''));
        $this->comments = htmlspecialchars(trim($data['comments'] ?? ''));
        
        $this->validate();
    }

    private function validate() {
        if (empty($this->first_name)) {
            $this->errors[] = "First name is required.";
        }
        if (empty($this->last_name)) {
            $this->errors[] = "Last name is required.";
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "A valid email address is required.";
        }
        if (!preg_match('/^\\+?[0-9\-\s]{10,15}$/', $this->telephone)) {
            $this->errors[] = "A valid telephone number is required.";
        }
        if (empty($this->address)) {
            $this->errors[] = "Address is required.";
        }
        if (empty($this->city)) {
            $this->errors[] = "City is required.";
        }
        if (empty($this->state_province)) {
            $this->errors[] = "State/Province is required.";
        }
        if (empty($this->zip_code)) {
            $this->errors[] = "Zip code is required.";
        }
        if (empty($this->country)) {
            $this->errors[] = "Country is required.";
        }
    }

    public function isValid() {
        return empty($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }

 
    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getCity() {
        return $this->city;
    }

    public function getStateProvince() {
        return $this->state_province;
    }

    public function getZipCode() {
        return $this->zip_code;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getComments() {
        return $this->comments;
    }
}
?>
