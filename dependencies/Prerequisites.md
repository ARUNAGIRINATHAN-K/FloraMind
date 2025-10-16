### Prerequisites
- PHP 8.0 or higher
- MySQL 8.0 or higher
- Composer (for PHP-ML installation)
- Web server (Apache/Nginx)

### Installation

#### Standard Setup (Linux/Mac)

1. Clone the repository
```bash
git clone https://github.com/ARUNAGIRINATHAN-K/floramind.git
cd floramind
```

2. Install dependencies
```bash
composer install
```

3. Configure database
```bash
mysql -u root -p < database/schema.sql
```

4. Update configuration (if needed)
```php
// In predict.php, update these variables:
$host = 'localhost';
$db = 'floramind';
$user = 'root';
$pass = ''; // Update with your MySQL password
```

5. Start the application
```bash
php -S localhost:8000
```

Visit `http://localhost:8000` in your browser.

#### Windows/XAMPP Setup

1. **Clone the repository**
```powershell
cd C:\xampp\htdocs
git clone https://github.com/ARUNAGIRINATHAN-K/floramind.git
cd floramind
```

2. **Install PHP dependencies**
   
   If you don't have Composer globally installed:
```powershell
# Download Composer installer
Invoke-WebRequest -Uri https://getcomposer.org/installer -OutFile composer-setup.php

# Install Composer locally
C:\xampp\php\php.exe composer-setup.php --install-dir=. --filename=composer.phar

# Install dependencies
C:\xampp\php\php.exe composer.phar require php-ai/php-ml
```

   Or if you have Composer globally:
```powershell
composer require php-ai/php-ml
```

3. **Start XAMPP services**
   - Open XAMPP Control Panel
   - Start **Apache** and **MySQL** modules

4. **Create database**
   - Open phpMyAdmin at `http://localhost/phpmyadmin`
   - Go to SQL tab and run the contents of `database/schema.sql`
   
   Or via command line:
```powershell
# Navigate to MySQL bin directory
cd C:\xampp\mysql\bin

# Run schema
.\mysql.exe -u root < C:\xampp\htdocs\floramind\database\schema.sql
```

5. **Update database credentials (if needed)**
   
   Open `predict.php` and verify these settings match your XAMPP MySQL:
```php
$host = 'localhost';
$db = 'floramind';
$user = 'root';
$pass = ''; // Default XAMPP MySQL has no password
```

6. **Access the application**
   
   Visit `http://localhost/floramind` in your browser.

7. **Test the prediction**
   - Enter sample measurements (e.g., 5.1, 3.5, 1.4, 0.2)
   - Click "Predict Flower Type"
   - You should see "Iris-setosa" predicted
   - Past predictions will appear in the table below
