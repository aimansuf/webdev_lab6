CREATE DATABASE IF NOT EXISTS mydb;
USE mydb;

CREATE TABLE IF NOT EXISTS persons (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(255) NOT NULL,
    LastName VARCHAR(255) NOT NULL,
    Address VARCHAR(255) NOT NULL,
    City VARCHAR(255) NOT NULL
);

INSERT INTO persons (FirstName, LastName, Address, City) VALUES
('John', 'Doe', '123 Main Street', 'New York'),
('Jane', 'Smith', '456 Oak Avenue', 'Los Angeles'),
('Michael', 'Johnson', '789 Pine Road', 'Chicago'),
('Emily', 'Williams', '321 Elm Street', 'Houston'),
('David', 'Brown', '654 Maple Drive', 'Phoenix');

INSERT INTO persons (FirstName, LastName, Address, City) VALUES
('Ahmad', 'Hassan', 'Jalan Tun Razak', 'Kuala Lumpur'),
('Siti', 'Aminah', 'Jalan Bukit Bintang', 'Kuala Lumpur'),
('Raj', 'Kumar', 'Jalan Pudu', 'Kuala Lumpur'),
('Lim', 'Chen', 'Jalan Alor', 'Kuala Lumpur');