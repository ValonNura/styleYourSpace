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
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(50) NOT NULL,
    dimensions VARCHAR(50),
    price DECIMAL(10, 2) NOT NULL,
    old_price DECIMAL(10, 2) DEFAULT NULL,
    image_default VARCHAR(255) NOT NULL,
    image_hover VARCHAR(255) NOT NULL,
    is_best_seller BOOLEAN DEFAULT FALSE,
    rating INT DEFAULT 0
);

INSERT INTO products
(name, category, dimensions, price, old_price, image_default, image_hover, is_best_seller, rating)
VALUES
('Black Table Lamp', 'lighting', '15" H x 8" W x 8" D', 345.00, 499.00, 'uploads/black_lamp.png', 'uploads/black_lamp_hover.png', 1, 5),
('Mushroom Table Lamp', 'lighting', '12" H x 7" W x 7" D', 98.00, 150.00, 'uploads/mushroom_lamp.png', 'uploads/mushroom_lamp_hover.png', 0, 3),
('Marble Table Lamp', 'lighting', '16" H x 9" W x 9" D', 466.00, 600.00, 'uploads/marble_tablelamp.png', 'uploads/marble_tablelamp_hover.png', 1, 5),
('Gold Chandelier', 'lighting', '18" H x 14" W x 14" D', 456.00, 700.00, 'uploads/gold_chandelier.png', 'uploads/gold_chandelier_hover.png', 1, 4),
('Black Chandelier', 'lighting', '20" H x 12" W x 12" D', 199.00, 350.00, 'uploads/black_chandelier.png', 'uploads/black_chandelier_hover.png', 0, 3),
('Palm Floor Lamp', 'lighting', '72" H x 12" W x 12" D', 377.00, 450.00, 'uploads/palm_floorlamp.png', 'uploads/palm_floorlamp_hover.png', 0, 4),
('Wooden Bed', 'beds', '75" L x 60" W x 48" H', 3700.00, 4500.00, 'uploads/wooden_bed.png', 'uploads/wooden_bed_hover.png', 0, 3),
('Royal Blue Bed', 'beds', '78" L x 62" W x 50" H', 2400.00, 3000.00, 'uploads/royalblue_bed.png', 'uploads/royalblue_bed_hover.png', 0, 3),
('Panora Bed', 'beds', '80" L x 64" W x 52" H', 5078.00, 6000.00, 'uploads/panora_bed.png', 'uploads/panora_bed_hover.png', 0, 5),
('Upholstered Bed', 'beds', '82" L x 60" W x 51" H', 4800.00, 5500.00, 'uploads/upholstered_bed.png', 'uploads/upholstered_bed_hover.png', 0, 4),
('Siro Bed', 'beds', '76" L x 61" W x 49" H', 3400.00, 4000.00, 'uploads/siro_bed.png', 'uploads/siro_bed_hover.png', 0, 3),
('Wingback Bed', 'beds', '85" L x 68" W x 55" H', 17659.00, 20000.00, 'uploads/wingback_bed.png', 'uploads/wingback_bed_hover.png', 1, 5),
('Grey Sofa', 'sofas', '84" L x 35" W x 30" H', 1980.00, 2500.00, 'uploads/grey_sofa.png', 'uploads/grey_sofa_hover.png', 0, 4),
('Mylene Sofa', 'sofas', '80" L x 36" W x 32" H', 2400.00, 2800.00, 'uploads/mylene_sofa.png', 'uploads/mylene_sofa_hover.png', 1, 4),
('Leonne Sofa', 'sofas', '90" L x 38" W x 34" H', 3200.00, 3800.00, 'uploads/leonne_sofa.png', 'uploads/leonne_sofa_hover.png',1, 5),
('Leather Sofa', 'sofas', '88" L x 40" W x 36" H', 3780.00, 4500.00, 'uploads/leather_sofa.png', 'uploads/leather_sofa_hover.png', 1, 5),
('Cloud Sofa', 'sofas', '92" L x 40" W x 35" H', 4290.00, 5000.00, 'uploads/cloud_sofa.png', 'uploads/cloud_sofa_hover.png', 0, 4),
('Pinth Sofa', 'sofas', '95" L x 42" W x 37" H', 5900.00, 7000.00, 'uploads/pinth_sofa.png', 'uploads/pinth_sofa_hover.png', 1, 5),
('Oak Dresser', 'dressers', '50" L x 18" W x 30" H', 5432.00, 6000.00, 'uploads/oak_dresser.png', 'uploads/oak_dresser_hover.png', 0, 3),
('Shagreen Dresser', 'dressers', '52" L x 20" W x 32" H', 3567.00, 4000.00, 'uploads/shagreen_dresser.png', 'uploads/shagreen_dresser_hover.png', 1, 4),
('Ford Dresser', 'dressers', '48" L x 19" W x 28" H', 1768.00, 2000.00, 'uploads/ford_dresser.png', 'uploads/ford_dresser_hover.png', 0, 3),
('Oberlin Dresser', 'dressers', '40" L x 18" W x 29" H', 239.00, 350.00, 'uploads/oberlin_dresser.png', 'uploads/oberlin_dresser_hover.png', 1, 4),
('White Dresser', 'dressers', '45" L x 18" W x 30" H', 356.00, 500.00, 'uploads/white_dresser.png', 'uploads/white_dresser_hover.png', 0, 3),
('Wooden Dresser', 'dressers', '47" L x 19" W x 31" H', 422.00, 550.00, 'uploads/wooden_dresser.png', 'uploads/wooden_dresser_hover.png', 0, 4),
('Avot Chair', 'chairs', '20" L x 20" W x 35" H', 760.00, 900.00, 'uploads/avot_chair.png', 'uploads/avot_chair_hover.png', 0, 3),
('Camel Chair', 'chairs', '22" L x 21" W x 33" H', 322.00, 400.00, 'uploads/camel_chair.png', 'uploads/camel_chair_hover.png', 1, 4),
('Lupo Chair', 'chairs', '21" L x 21" W x 34" H', 244.00, 300.00, 'uploads/lupo_chair.png', 'uploads/lupo_chair_hover.png', 0, 3),
('Fluffy Chair', 'chairs', '24" L x 22" W x 36" H', 1000.00, 1200.00, 'uploads/fluffy_chair.png', 'uploads/fluffy_chair_hover.png', 0, 4),
('Velvet Chair', 'chairs', '23" L x 22" W x 34" H', 344.00, 400.00, 'uploads/velvet_chair.png', 'uploads/velvet_chair_hover.png', 0, 3),
('Brown Chair', 'chairs', '22" L x 21" W x 33" H', 278.00, 350.00, 'uploads/brown_chair.png', 'uploads/brown_chair_hover.png', 0, 3),
('Round Mirror', 'decor', '30" D x 1" W', 199.00, 250.00, 'uploads/round_mirror.png', 'uploads/round_mirror_hover.png', 1, 4),
('Meduza Decor', 'decor', '12" H x 8" W x 8" D', 69.00, 100.00, 'uploads/meduzadecor.png', 'uploads/meduzadecor_hover.png', 0, 3),
('Metal Vase', 'decor', '10" H x 6" W x 6" D', 134.00, 180.00, 'uploads/metalvase.png', 'uploads/metalvase_hover.png', 1, 4),
('Candel Holder', 'decor', '8" H x 6" W x 6" D', 2334.00, 2500.00, 'uploads/candelholder.png', 'uploads/candelholder_hover.png', 0, 4),
('Wall Decor', 'decor', '36" L x 2" W x 24" H', 2400.00, 2800.00, 'uploads/wall_decor.png', 'uploads/wall_decor_hover.png', 1, 5),
('Porcelain Vase', 'decor', '12" H x 7" W x 7" D', 400.00, 450.00, 'uploads/porcelain_vase.png', 'uploads/porcelain_vase_hover.png', 0, 4);

