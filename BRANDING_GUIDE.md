# 🎨 Frozen Gen Branding Customization Guide

## 🔧 Database Configuration Files to Edit

### For Your Brand Name: Change "darkgg" to "your_brand_name"

#### 1. **pieces/inc.php** (Line 11)
```php
DEFINE("database", "your_brand_name"); // Change "darkgg"
```

#### 2. **AdminPanel/pieces/inc.php** (Line 11)  
```php
DEFINE("database", "your_brand_name"); // Change "darkgg"
```

#### 3. **inc/database.php** (Line 6)
```php
$mydb = "your_brand_name"; // Change "darkgg"
```

#### 4. **AdminPanel/inc/database.php** (Line 6)
```php  
$mydb = "your_brand_name"; // Change "darkgg"
```

#### 5. **php/database.php** (Line 8)
```php
private $db_name = "your_brand_name"; // Change "darkgg"
```

#### 6. **AdminPanel/php/database.php** (Line 8)
```php
private $db_name = "your_brand_name"; // Change "darkgg"
```

## 🎭 Other Branding Elements You Can Customize:

### Website Settings (Database)
Update the `settings` table in your database:
- **website**: Your site name (e.g., "Frozen Gen")
- **favicon**: Your favicon URL
- **footer**: Footer text/copyright

### Visual Branding Files:
- **logo.png** - Main logo image
- **favicon.ico** - Browser icon
- **CSS files** - Color schemes, themes
- **Meta tags** - SEO titles and descriptions

### Text Branding:
- Page titles in PHP files
- Welcome messages
- Email templates (in register.php)
- Error messages
- Button text and labels

## 🚀 Quick Brand Change Commands:

### For "Frozen Gen" Branding:
Replace all instances of `darkgg` with `frozen_gen`:

```bash
# Database name in all config files
"darkgg" → "frozen_gen"
```

### For Custom Branding:
Replace with your brand name:
```bash  
# Example: "darkgg" → "myawesome_gen"
"darkgg" → "myawesome_gen"
```

## 📋 Branding Checklist:
- [ ] Update database name in all 6 config files
- [ ] Update website name in settings table
- [ ] Replace logo files
- [ ] Update favicon
- [ ] Customize colors/CSS
- [ ] Update page titles
- [ ] Customize email templates
- [ ] Update footer/copyright text

## 💡 Pro Tips:
1. **Use consistent naming**: If database is "frozen_gen", keep it consistent
2. **Update environment files**: Also update `.env.example` with your brand
3. **Test thoroughly**: After changes, test login, registration, and admin panel
4. **Backup first**: Always backup before making changes

## 🎨 Advanced Branding:
- **Theme colors**: Edit CSS files in `/css/` directory
- **Layout**: Modify HTML structure in PHP files  
- **Icons**: Replace FontAwesome icons with custom ones
- **Animations**: Customize loading animations and effects
- **Typography**: Change fonts in CSS files