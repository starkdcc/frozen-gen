-- Frozen Gen Database Schema
-- This file contains the database structure for the Frozen Gen application

CREATE DATABASE IF NOT EXISTS frozen_gen;
USE frozen_gen;

-- Settings table
CREATE TABLE IF NOT EXISTS `settings` (
  `website` varchar(100) NOT NULL DEFAULT 'Frozen Gen',
  `paypal` varchar(100) DEFAULT NULL,
  `footer` text DEFAULT NULL,
  `favicon` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `settings` (`website`, `paypal`, `footer`, `favicon`) VALUES
('Frozen Gen', 'support@frozengen.com', 'Welcome To Frozen Gen!', '');

-- Users table
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_last_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL UNIQUE,
  `date` date NOT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `hash` varchar(100) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `status` tinyint(1) DEFAULT 1,
  `rank` tinyint(1) DEFAULT 1,
  `profile_img` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Login logs table
CREATE TABLE IF NOT EXISTS `login_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `date` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- News table
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `writer` varchar(50) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `colour` varchar(20) DEFAULT 'primary',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default news
INSERT INTO `news` (`title`, `message`, `writer`, `date`) VALUES
('Welcome to Frozen Gen!', 'Welcome to the ultimate account generator platform. Get started by creating your account!', 'Admin', NOW());

-- Generators table (for future expansion)
CREATE TABLE IF NOT EXISTS `generators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;