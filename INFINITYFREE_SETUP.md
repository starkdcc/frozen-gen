# 🧊 Frozen Gen - Complete InfinityFree Setup

## 🎯 **Why InfinityFree is Better:**
- ✅ **Easy phpMyAdmin** access for database management
- ✅ **Free hosting** with good PHP support
- ✅ **Simple file upload** via File Manager or FTP
- ✅ **No complex Docker** or deployment issues
- ✅ **Familiar cPanel** interface

---

## 🚀 **Step-by-Step Setup (20 minutes)**

### **Step 1: Create MySQL Database** 🗄️
1. In your InfinityFree control panel (where you are now)
2. Click **"+ Create Database"**
3. Database name: `frozen_gen`
4. **SAVE THESE DETAILS** (you'll need them):
   ```
   Database Host: sql301.infinityfree.com
   Database Name: if0_40017164_frozen_gen
   Username: if0_40017164
   Password: [copy from InfinityFree]
   ```

### **Step 2: Access phpMyAdmin** 📊
1. Look for **"Manage"** or **"phpMyAdmin"** button next to your database
2. Click it to open phpMyAdmin
3. This is where we'll create all the database tables

### **Step 3: Create Database Tables** 🛠️
In phpMyAdmin:
1. Select your database (`if0_40017164_frozen_gen`)
2. Click **"SQL"** tab
3. Copy and paste this SQL:

```sql
-- Frozen Gen Database Tables for InfinityFree

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
  `date` date NOT NULL DEFAULT (CURRENT_DATE),
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

INSERT IGNORE INTO `news` VALUES (1, 'Welcome to Frozen Gen!', 'Your premium account generator is ready!', 'Admin', NOW(), 'primary');

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

-- Create admin user (admin/admin123)
INSERT IGNORE INTO `users` VALUES (1, 'Administrator', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@frozengen.com', CURDATE(), NULL, NULL, 1, 1, 2, NULL);

SELECT 'SUCCESS: Database setup completed!' as result;
```

4. Click **"Go"** to execute

### **Step 4: Update Database Configuration** 🔧
1. Open your `inc/database.php` file
2. Update the connection details with your InfinityFree credentials:

```php
<?php
// InfinityFree MySQL Connection
$host = 'sql301.infinityfree.com';
$username = 'if0_40017164';
$password = 'YOUR_MYSQL_PASSWORD_FROM_INFINITYFREE';
$database = 'if0_40017164_frozen_gen';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>
```

### **Step 5: Upload Your Files** 📤
**Option A: File Manager (Easier)**
1. Go to InfinityFree Control Panel
2. Click **"File Manager"**
3. Navigate to `htdocs` or `public_html` folder
4. Upload all your Frozen Gen files

**Option B: FTP (Advanced)**
1. Use FTP client like FileZilla
2. FTP details should be in your InfinityFree control panel
3. Upload all files to the web root directory

### **Step 6: Test Your Website** 🧪
1. Visit your InfinityFree domain (should be like: `yoursite.infinityfreeapp.com`)
2. You should see the Frozen Gen homepage!
3. Test registration and login
4. Admin panel: `yoursite.infinityfreeapp.com/AdminPanel/`
   - Username: `admin`
   - Password: `admin123`

---

## 🎉 **Expected Results:**

✅ **Live Website**: Frozen Gen running on InfinityFree
✅ **Database**: All tables created with sample data
✅ **Admin Access**: Working admin panel
✅ **User Registration**: Functional signup/login
✅ **Account Generators**: Ready to use

---

## 🆘 **Troubleshooting:**

**Database Connection Error?**
- Double-check MySQL credentials
- Ensure database exists
- Check if host is correct

**File Not Found?**
- Make sure files are in `htdocs` or `public_html`
- Check file permissions

**Admin Login Not Working?**
- Try the SQL insert for admin user again
- Check if users table exists

---

## 🎯 **Advantages of This Setup:**

- **Free forever** (with InfinityFree limits)
- **Easy to manage** via control panel
- **phpMyAdmin access** for database management
- **No deployment complexity** like Railway
- **Standard PHP hosting** environment

**Your Frozen Gen application will be fully functional on InfinityFree! 🧊✨**