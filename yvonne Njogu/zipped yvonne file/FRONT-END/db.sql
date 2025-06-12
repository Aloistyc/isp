

CREATE DATABASE IF NOT EXISTS ISP;


USE ISP;

CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    id_number VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    wifi_package VARCHAR(50) NOT NULL,
    area VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

USE ISP;

CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_number VARCHAR(50) NOT NULL,
    client_name VARCHAR(100) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    wifi_package VARCHAR(50) NOT NULL,
    payment_method VARCHAR(20) NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


USE ISP;

CREATE TABLE support_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_number VARCHAR(50) NOT NULL,
    client_name VARCHAR(100) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    network_problem VARCHAR(100) NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
