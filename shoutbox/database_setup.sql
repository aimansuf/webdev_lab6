CREATE DATABASE IF NOT EXISTS shoutbox;
USE shoutbox;

CREATE TABLE IF NOT EXISTS shouts (
    shout_id INT AUTO_INCREMENT PRIMARY KEY,
    shout_text TEXT NOT NULL,
    shout_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO shouts (shout_text) VALUES
('Hello everyone! Welcome to ShoutBox! 👋'),
('This is a simple message board system for Lab 6a.'),
('You can post your thoughts and messages here!'),
('Messages are stored in MySQL database.'),
('Try posting your own shout! 😊');