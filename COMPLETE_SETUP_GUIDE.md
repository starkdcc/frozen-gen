# 🧊 Frozen Gen - Complete Setup Guide

## 📋 **What You Need:**
- Railway account (signed up with GitHub)
- Your GitHub repository: https://github.com/starkdcc/frozen-gen

---

## 🚀 **Step-by-Step Setup (15 minutes)**

### **Step 1: Access Railway Dashboard** 
1. Go to: https://railway.app/dashboard
2. Login with your GitHub account if not already logged in

### **Step 2: Create MySQL Database** 
1. Click **"New Project"**
2. Click **"Provision MySQL"**
3. Wait for MySQL to deploy (2-3 minutes)
4. **IMPORTANT**: Click on the MySQL service → **"Variables"** tab
5. **COPY AND SAVE** these 4 values somewhere:
   ```
   MYSQL_HOST = [copy the value]
   MYSQL_USER = [copy the value] 
   MYSQL_PASSWORD = [copy the value]
   MYSQL_DATABASE = [copy the value]
   ```

### **Step 3: Deploy Your App**
1. In the same project, click **"New Service"**
2. Choose **"GitHub Repo"**
3. Select: `starkdcc/frozen-gen`
4. Wait for deployment (3-5 minutes)

### **Step 4: Connect Database to App**
1. Click on your **web service** (frozen-gen)
2. Go to **"Variables"** tab
3. Click **"New Variable"** and add these 4:
   ```
   DB_HOST = [paste your MYSQL_HOST here]
   DB_USER = [paste your MYSQL_USER here]
   DB_PASS = [paste your MYSQL_PASSWORD here] 
   DB_NAME = [paste your MYSQL_DATABASE here]
   ```
4. Click **"Deploy"** after adding all variables

### **Step 5: Setup Database Tables**
1. Go back to your **MySQL service**
2. Click **"Query"** tab
3. Copy this SQL and paste it in the query box:

```sql
-- Frozen Gen Database Schema
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(100) NOT NULL,
  `setting_value` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_name` (`setting_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default settings
INSERT IGNORE INTO `settings` (`setting_name`, `setting_value`) VALUES
('site_name', 'Frozen Gen'),
('site_description', 'Premium Account Generator'),
('admin_email', 'admin@frozengen.com');

CREATE TABLE IF NOT EXISTS `generators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `generator_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100),
  `status` enum('available','used') DEFAULT 'available',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `generator_id` (`generator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

4. Click **"Execute"** to run the SQL

### **Step 6: Test Your Application**
1. Go back to your **web service** (frozen-gen)
2. Click **"View Deployment"** or find the live URL
3. Your Frozen Gen homepage should load!

---

## 🎯 **Expected Results:**

✅ **Homepage**: Frozen Gen branding and interface  
✅ **Registration**: Users can create accounts  
✅ **Login**: Authentication system works  
✅ **Admin Panel**: Available at `/AdminPanel/`  
✅ **Database**: All tables created and connected  

---

## 🆘 **Troubleshooting:**

### **App won't load?**
- Check Railway deployment logs
- Verify all 4 environment variables are set correctly

### **Database connection errors?**
- Double-check the MySQL credentials in Variables
- Make sure MySQL service is running

### **"Page not found" errors?**
- Check that index.php exists in your repository
- Verify .htaccess is properly configured

---

## 🎉 **You're Done!**

Your Frozen Gen application should now be:
- **Live on Railway** with a public URL
- **Connected to MySQL** database  
- **Fully functional** with user registration/login
- **Admin panel ready** for management

**Enjoy your new account generator platform! 🧊✨**