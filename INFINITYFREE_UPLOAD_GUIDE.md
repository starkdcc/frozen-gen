# 📤 Frozen Gen - InfinityFree Upload Guide

## 🎯 **Where to Upload Your Files**

All your Frozen Gen files need to go in the **`htdocs`** folder (or `public_html`) on InfinityFree.

---

## 🌐 **Method 1: File Manager (EASIEST)**

### **Step 1: Access File Manager**
1. Go to your **InfinityFree Control Panel**
2. Look for **"File Manager"** or **"Files"** section
3. Click on it to open the web-based file manager

### **Step 2: Navigate to htdocs**
1. You'll see folders like `htdocs`, `logs`, etc.
2. **Double-click `htdocs`** - this is your website root
3. This folder should be empty (or have a default index page)

### **Step 3: Upload Your Files**
1. **Select all files** from `F:\frozen-gen-deploy\`
2. You can either:
   - **Drag and drop** files into the file manager
   - **Use Upload button** in the file manager
   - **Create ZIP file** and upload, then extract

### **Files to Upload:**
```
✅ All PHP files (index.php, login.php, register.php, etc.)
✅ AdminPanel/ folder (entire folder)
✅ css/ folder
✅ js/ folder  
✅ images/ folder
✅ inc/ folder
✅ php/ folder
✅ pieces/ folder
✅ .htaccess file
✅ All other files and folders
```

---

## 🔧 **Method 2: FTP Upload (Advanced)**

### **Step 1: Get FTP Details**
In InfinityFree control panel, find:
- **FTP Server/Host**
- **FTP Username** 
- **FTP Password**
- **Port** (usually 21)

### **Step 2: Download FTP Client**
- **FileZilla** (free): https://filezilla-project.org/
- **WinSCP** (Windows): https://winscp.net/

### **Step 3: Connect and Upload**
1. **Enter FTP details** in your FTP client
2. **Connect to server**
3. **Navigate to htdocs folder** on server
4. **Upload all files** from `F:\frozen-gen-deploy\`

---

## 📋 **After Upload Checklist**

### **✅ Verify File Structure:**
Your `htdocs` folder should look like:
```
htdocs/
├── index.php
├── login.php
├── register.php
├── .htaccess
├── AdminPanel/
│   ├── index.php
│   ├── login.php
│   └── [all admin files]
├── inc/
│   └── database.php
├── php/
├── css/
├── js/
└── [all other folders/files]
```

### **✅ Test Your Website:**
1. **Visit your domain** (e.g., `yoursite.infinityfreeapp.com`)
2. **Should show**: Frozen Gen homepage
3. **Test registration**: Try creating an account
4. **Test admin**: Go to `/AdminPanel/` and login with `admin`/`admin123`

---

## 🚨 **Important Notes:**

### **File Permissions:**
- Most files should be **644**
- Folders should be **755**
- InfinityFree usually sets these automatically

### **Database Setup:**
- **Before testing**, make sure you've:
  1. Created the database in InfinityFree
  2. Run the SQL from `INFINITYFREE_SQL.sql` in phpMyAdmin
  3. Updated database credentials (already done ✅)

### **Common Issues:**
- **"File not found"**: Check that `index.php` is in `htdocs` root
- **Database errors**: Verify database creation and credentials
- **Permission errors**: Check file permissions in File Manager

---

## 🎉 **Expected Result:**

After successful upload, your website should be:
- **Live** at your InfinityFree domain
- **Homepage** showing Frozen Gen branding
- **Registration/Login** working
- **Admin panel** accessible at `/AdminPanel/`

---

## 📞 **Need Help?**

If upload fails:
1. **Check file size limits** (InfinityFree has limits)
2. **Try smaller batches** instead of all files at once
3. **Use ZIP method**: ZIP all files, upload ZIP, extract on server
4. **Check InfinityFree documentation** for specific upload instructions

**Your Frozen Gen application will be live once uploaded! 🧊✨**