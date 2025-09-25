-- Frozen Gen - Railway Database Setup
-- Copy ALL of this and paste into Railway MySQL Query tab, then click Execute

-- Settings table
CREATE TABLE IF NOT EXISTS `settings` (
  `website` varchar(100) NOT NULL DEFAULT 'Frozen Gen',
  `paypal` varchar(100) DEFAULT 'support@frozengen.com',
  `footer` text DEFAULT 'Welcome To Frozen Gen!',
  `favicon` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert settings if not exists
INSERT IGNORE INTO `settings` (`website`, `paypal`, `footer`, `favicon`) VALUES
('Frozen Gen', 'support@frozengen.com', 'Welcome To Frozen Gen!', '');

-- Users table
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_last_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT (CURRENT_DATE),
  `ip` varchar(45) DEFAULT NULL,
  `hash` varchar(100) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `status` tinyint(1) DEFAULT 1,
  `rank` tinyint(1) DEFAULT 1,
  `profile_img` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
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

-- Insert welcome news
INSERT IGNORE INTO `news` (`id`, `title`, `message`, `writer`) VALUES
(1, 'Welcome to Frozen Gen!', 'Welcome to the ultimate account generator platform. Get started by creating your account and exploring our premium features!', 'Admin');

-- Generators table
CREATE TABLE IF NOT EXISTS `generators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample generators
INSERT IGNORE INTO `generators` (`id`, `name`, `description`) VALUES
(1, 'Netflix Premium', 'High-quality Netflix premium accounts'),
(2, 'Spotify Premium', 'Premium Spotify accounts with no ads'),
(3, 'Steam Gaming', 'Steam accounts for gaming');

-- Create admin user
-- Username: admin
-- Password: admin123 (CHANGE THIS AFTER FIRST LOGIN!)
INSERT IGNORE INTO `users` (`id`, `first_last_name`, `username`, `password`, `email`, `date`, `rank`) VALUES
(1, 'Administrator', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@frozengen.com', CURDATE(), 2);

-- Verify setup
SELECT 'SUCCESS: Database setup completed!' as STATUS;
SELECT 'Admin Login: admin / admin123' as LOGIN_INFO;
SELECT COUNT(*) as TOTAL_TABLES FROM information_schema.tables WHERE table_schema = 'railway';