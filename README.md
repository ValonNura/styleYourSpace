CREATE DATABASE user_registration;

USE user_registration;

CREATE TABLE users_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL
);

INSERT INTO users_data (username, password, email) VALUES ('john_doe', 'password123', 'john.doe@example.com');
INSERT INTO users_data (username, password, email) VALUES ('jane_smith', 'mypassword', 'jane.smith@example.com');
INSERT INTO users_data (username, password, email) VALUES ('alice_jones', 'alice2023', 'alice.jones@example.com');
INSERT INTO users_data (username, password, email) VALUES ('bob_brown', 'bobspassword', 'bob.brown@example.com');
INSERT INTO users_data (username, password, email) VALUES ('charlie_white', 'charliepass', 'charlie.white@example.com');
