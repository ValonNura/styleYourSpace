CREATE DATABASE user_registration;

USE user_registration;

CREATE TABLE users_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);


INSERT INTO users_data (username, password, email) VALUES ('john_doe', 'password123', 'john.doe@example.com');
INSERT INTO users_data (username, password, email) VALUES ('jane_smith', 'mypassword', 'jane.smith@example.com');
INSERT INTO users_data (username, password, email) VALUES ('alice_jones', 'alice2023', 'alice.jones@example.com');
INSERT INTO users_data (username, password, email) VALUES ('bob_brown', 'bobspassword', 'bob.brown@example.com');
INSERT INTO users_data (username, password, email) VALUES ('charlie_white', 'charliepass', 'charlie.white@example.com');

CREATE TABLE users (
   id int(11) NOT NULL,
   name varchar(100) NOT NULL,
   email varchar(100) NOT NULL,
   password varchar(255) NOT NULL,
   role enum('admin','user') DEFAULT 'user'
) 

INSERT INTO users (id, name, email, password, role) VALUES
(1, 'Admin User', 'admin@example.com', '$2y$10$6GFd.NfsHTlCw/NmztDbAedHaDIbwm3MlgKlk/yywVkXI263yUkyG', 'admin'),
(2, 'Regular User', 'user@example.com', 'userpass', 'user');



CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL
);


CREATE TABLE subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


