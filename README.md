# 🧊 Frozen Gen - Premium Account Generator

A powerful PHP-based account generator platform with user management, authentication, and admin features.

## ✨ Features

- **User Registration & Authentication** - Secure login system with password hashing
- **Admin Panel** - Complete administrative interface
- **Account Generators** - Extensible generator system  
- **News System** - Keep users updated with announcements
- **Responsive Design** - Mobile-friendly interface
- **Database Management** - MySQL-based data storage

## 🚀 Quick Deploy

### Deploy to Railway (Recommended)
[![Deploy on Railway](https://railway.app/button.svg)](https://railway.app/new)

1. Click the button above
2. Connect your GitHub repository
3. Follow the guide in `DEPLOY_RAILWAY.md`

### Deploy to Vercel
[![Deploy with Vercel](https://vercel.com/button)](https://vercel.com/new)

1. Click the button above  
2. Connect your GitHub repository
3. Follow the guide in `DEPLOY_VERCEL.md`

## 📋 Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx) or serverless platform

## 🛠️ Local Development

1. Clone the repository
2. Configure database in `inc/database-env.php`
3. Import `database-schema.sql` to your MySQL database
4. Start your local server

## 📁 Project Structure

```
frozen-gen/
├── inc/                 # Database and configuration files
├── AdminPanel/         # Admin interface
├── css/               # Stylesheets
├── js/                # JavaScript files
├── assets/            # Static assets
├── database-schema.sql # Database structure
└── *.php              # Main application files
```

## ⚙️ Configuration

### Environment Variables
```env
DB_HOST=localhost
DB_USER=your_username
DB_PASS=your_password
DB_NAME=frozen_gen
```

### Database Setup
Run the SQL commands in `database-schema.sql` to create the required tables.

## 🔐 Default Admin Access

After deployment:
1. Register a new account
2. Update the user's rank to '5' in the database for admin access
3. Access admin panel at `/AdminPanel/`

## 📚 Documentation

- [Railway Deployment](DEPLOY_RAILWAY.md)
- [Vercel Deployment](DEPLOY_VERCEL.md)
- [Environment Setup](.env.example)

## 🐛 Troubleshooting

### Common Issues
- **Database Connection**: Check environment variables
- **Permission Errors**: Ensure proper file permissions
- **Email Issues**: Email verification is disabled by default

### Support
- Check the deployment guides for platform-specific issues
- Review error logs in your hosting dashboard

## 📄 License

This project is open source and available under the MIT License.

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request

---

**Frozen Gen** - Built for scalability and performance 🚀