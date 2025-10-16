# FloraMind - Windows/XAMPP Quick Setup Guide

This guide will help you set up FloraMind on Windows using XAMPP.

## Prerequisites
- [XAMPP](https://www.apachefriends.org/) installed (includes PHP 8.x and MySQL)
- Git for Windows (optional, for cloning)

## Step-by-Step Setup

### 1. Get the Code
```powershell
# Navigate to XAMPP htdocs folder
cd C:\xampp\htdocs

# Clone the repository (or download ZIP and extract)
git clone https://github.com/ARUNAGIRINATHAN-K/floramind.git
cd floramind
```

### 2. Install PHP Dependencies

**Option A: Without Composer installed globally**
```powershell
# Download Composer installer
Invoke-WebRequest -Uri https://getcomposer.org/installer -OutFile composer-setup.php

# Install Composer locally in project
C:\xampp\php\php.exe composer-setup.php --install-dir=. --filename=composer.phar

# Install php-ai/php-ml dependency
C:\xampp\php\php.exe composer.phar require php-ai/php-ml

# Clean up installer
Remove-Item composer-setup.php
```

**Option B: With Composer installed globally**
```powershell
composer require php-ai/php-ml
```

### 3. Start XAMPP Services

1. Open **XAMPP Control Panel**
2. Click **Start** for **Apache** module
3. Click **Start** for **MySQL** module
4. Verify both show green "Running" status

### 4. Create Database

**Option A: Using phpMyAdmin (Recommended for beginners)**
1. Open browser and go to: `http://localhost/phpmyadmin`
2. Click **SQL** tab
3. Copy and paste contents of `database\schema.sql`
4. Click **Go** to execute

**Option B: Using MySQL command line**
```powershell
# Navigate to MySQL bin folder
cd C:\xampp\mysql\bin

# Run the schema file
.\mysql.exe -u root < C:\xampp\htdocs\floramind\database\schema.sql
```

### 5. Verify Database Connection

Open `predict.php` and check these settings:
```php
$host = 'localhost';
$db = 'floramind';
$user = 'root';
$pass = ''; // XAMPP default MySQL has no password
```

### 6. Test the Application

1. Open your browser
2. Go to: `http://localhost/floramind`
3. You should see the FloraMind interface

**Test prediction:**
- Sepal Length: `5.1`
- Sepal Width: `3.5`
- Petal Length: `1.4`
- Petal Width: `0.2`
- Click **Predict Flower Type**
- Expected result: **Iris-setosa**

### 7. Verify Everything Works

✅ **Success indicators:**
- Prediction appears in a colored card
- Past predictions table updates below
- No console errors in browser DevTools (F12)

## Troubleshooting

### "Failed to predict: Unexpected end of JSON input"
**Cause:** Missing PHP dependencies
```powershell
# Run in project folder:
C:\xampp\php\php.exe composer.phar require php-ai/php-ml
```

### "Database connection failed"
**Solutions:**
1. Start MySQL in XAMPP Control Panel
2. Run `database\schema.sql` in phpMyAdmin
3. Check credentials in `predict.php` match your setup

### Apache won't start
**Common causes:**
- Port 80 already in use (Skype, IIS, etc.)
- Click **Config** → **httpd.conf** and change `Listen 80` to `Listen 8080`
- Restart Apache and use `http://localhost:8080/floramind`

### MySQL won't start
**Common causes:**
- Port 3306 in use
- Click **Config** → **my.ini** and change port to 3307
- Update `predict.php` to use `localhost:3307`

### "iris.csv not found"
**Solution:** Ensure `iris.csv` is in the same folder as `predict.php`

## Project Structure
```
C:\xampp\htdocs\floramind\
├── index.php          ← Main UI
├── predict.php        ← Backend API
├── script.js          ← Frontend logic
├── style.css          ← Styles
├── iris.csv           ← Training data
├── database\
│   └── schema.sql     ← Database setup
├── vendor\            ← Composer dependencies (created after install)
│   └── php-ai\
│       └── php-ml\    ← Machine learning library
└── composer.json      ← Dependency config (created after install)
```

## Next Steps

### Check Logs
- PHP errors: `C:\xampp\php\logs\php_error_log`
- Apache errors: `C:\xampp\apache\logs\error.log`
- Browser console: Press F12 → Console tab

### Development Tips
- Enable PHP errors during development (add to top of `predict.php`):
  ```php
  ini_set('display_errors', '1');
  error_reporting(E_ALL);
  ```
- Use browser DevTools Network tab to inspect API requests/responses
- Check `http://localhost/floramind/predict.php?action=get_past` returns JSON array

## Getting Help

If you encounter issues:
1. Check browser console (F12) for JavaScript errors
2. Check Apache error logs in XAMPP
3. Verify all XAMPP services are running
4. Make sure `vendor` folder exists with `autoload.php`
5. Open GitHub issue with error details

## Success! 🎉

Your FloraMind installation is complete. The app uses K-Nearest Neighbors (KNN) machine learning to classify iris flowers based on measurements. Each prediction is stored in MySQL for tracking and analysis.

**Sample predictions to try:**
- Iris-setosa: `5.1, 3.5, 1.4, 0.2`
- Iris-versicolor: `5.9, 3.0, 4.2, 1.5`
- Iris-virginica: `6.3, 2.9, 5.6, 1.8`
