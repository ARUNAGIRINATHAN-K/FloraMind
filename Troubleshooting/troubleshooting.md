## Troubleshooting

### Common Issues

**Issue: "Unexpected end of JSON input" error**
```
Cause: Missing dependencies or database connection error returning non-JSON response
Solution (Windows/XAMPP):
1. Install dependencies: C:\xampp\php\php.exe composer.phar require php-ai/php-ml
2. Verify vendor/autoload.php exists
3. Check browser DevTools Network tab for actual response
```

**Issue: "Class not found" error**
```bash
# Solution: Install PHP-ML
composer require php-ai/php-ml
# Or on Windows XAMPP:
C:\xampp\php\php.exe composer.phar require php-ai/php-ml
```

**Issue: Database connection failed**
```php
// Solution 1: Check credentials in predict.php
$host = 'localhost';
$db = 'floramind';
$user = 'root';
$pass = ''; // XAMPP default has no password

// Solution 2: Verify MySQL service is running
# Linux/Mac:
sudo systemctl status mysql
# Windows XAMPP:
Open XAMPP Control Panel and start MySQL module
```

**Issue: "iris.csv not found"**
```
Cause: File path resolution issue
Solution: Ensure iris.csv is in the same directory as predict.php
The updated predict.php uses absolute paths to avoid this issue
```

**Issue: Prediction accuracy is low**
```php
// Increase K value in KNN
$classifier = new KNearestNeighbors($k = 5);
```
