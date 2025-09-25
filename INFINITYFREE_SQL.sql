-- Copy this entire SQL into InfinityFree phpMyAdmin
-- Click SQL tab, paste this, and click Go

CREATE TABLE IF NOT EXISTS `settings` (
  `website` varchar(100) NOT NULL DEFAULT 'Frozen Gen',
  `paypal` varchar(100) DEFAULT 'support@frozengen.com',
  `footer` text DEFAULT 'Welcome To Frozen Gen!',
  `favicon` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `settings` VALUES ('Frozen Gen', 'support@frozengen.com', 'Welcome To Frozen Gen!', '');

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

CREATE TABLE IF NOT EXISTS `login_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `date` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `writer` varchar(50) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `colour` varchar(20) DEFAULT 'primary',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `news` VALUES (1, 'Welcome to Frozen Gen!', 'Your premium account generator is ready! Start by creating your account and exploring our features.', 'Admin', NOW(), 'primary');

CREATE TABLE IF NOT EXISTS `generators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `generators` VALUES 
(1, 'Netflix Premium', 'High-quality Netflix premium accounts', 1, NOW()),
(2, 'Spotify Premium', 'Premium Spotify accounts with no ads', 1, NOW()),
(3, 'Steam Gaming', 'Steam accounts for gaming', 1, NOW());

INSERT IGNORE INTO `users` VALUES (1, 'Administrator', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@frozengen.com', CURDATE(), NULL, NULL, 1, 1, 2, NULL);

SELECT 'SUCCESS: Frozen Gen database setup completed!' as result;