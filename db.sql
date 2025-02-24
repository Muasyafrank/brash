

CREATE DATABASE shop_db;
USE shop_db;

CREATE TABLE shops (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image LONGBLOB NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    shop_id INT,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image LONGBLOB NOT NULL,
    FOREIGN KEY (shop_id) REFERENCES shops(id) ON DELETE CASCADE
);



INSERT INTO shops (name, image) VALUES
('Ezekiel General Shop', 'https://via.placeholder.com/300x200/FFB6C1/000000?text=Shop+1'),  
('Mwangaza General Shop', 'https://via.placeholder.com/300x200/ADD8E6/000000?text=Shop+2'),  
('Mzito General Shop', 'https://via.placeholder.com/300x200/90EE90/000000?text=Shop+3'),  
('Zawadi Supermarket', 'https://via.placeholder.com/300x200/FFFFE0/000000?text=Shop+4'),
('Ezekiel General Shop', 'https://via.placeholder.com/300x200/FFB6C1/000000?text=Shop+1'),  
('Mwangaza General Shop', 'https://via.placeholder.com/300x200/ADD8E6/000000?text=Shop+2'),  
('Mzito General Shop', 'https://via.placeholder.com/300x200/90EE90/000000?text=Shop+3'),  
('Zawadi Supermarket', 'https://via.placeholder.com/300x200/FFFFE0/000000?text=Shop+4');



INSERT INTO products (shop_id, name, price, image) VALUES
(1, 'Bread', 50, 'https://via.placeholder.com/150x100/F08080/000000?text=Bread'); -- Light red placeholder
-- (1, 'Milk', 100, 'https://via.placeholder.com/150x100/FAF0E6/000000?text=Milk'), 
-- (1, 'Sugar', 75, 'https://via.placeholder.com/150x100/EEE8AA/000000?text=Sugar'); 

INSERT INTO products (shop_id, name, price, image) VALUES
(2, 'Rice', 150, 'https://via.placeholder.com/150x100/D8BFD8/000000?text=Rice'); 
-- (2, 'Cooking Oil', 200, 'https://via.placeholder.com/150x100/E0FFFF/000000?text=Oil'), 
-- (2, 'Salt', 25, 'https://via.placeholder.com/150x100/F5F5DC/000000?text=Salt');

-- Mzito General Shop products
INSERT INTO products (shop_id, name, price, image) VALUES
(3, 'Beans', 80, 'https://via.placeholder.com/150x100/F0E68C/000000?text=Beans');
-- (3, 'Maize Flour', 120, 'https://via.placeholder.com/150x100/ADD8E6/000000?text=Flour'), 
-- (3, 'Tomatoes', 40, 'https://via.placeholder.com/150x100/FFA07A/000000?text=Tomato'); 

INSERT INTO products (shop_id, name, price, image) VALUES
(4, 'Apples', 60, 'https://via.placeholder.com/150x100/FFC0CB/000000?text=Apple');
-- (4, 'Bananas', 30, 'https://via.placeholder.com/150x100/FFFF00/000000?text=Banana'), 
-- (4, 'Oranges', 50, 'https://via.placeholder.com/150x100/FFA500/000000?text=Orange'); 