<div align="center">

# FloraMind 

*An intelligent flower classification system powered by machine learning*

![FloraMind Logo](https://img.shields.io/badge/🌸_FloraMind-Intelligent_Classifier-ff69b4?style=for-the-badge)

[![PHP Version](https://img.shields.io/badge/PHP-8.0+-777BB4?style=flat-square&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=flat-square&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.0-7952B3?style=flat-square&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![License](https://img.shields.io/badge/License-Apache-yellow.svg?style=flat-square)](LICENSE)
[![Status](https://img.shields.io/badge/Status-Active-success?style=flat-square)](https://github.com/yourusername/floramind)
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](CONTRIBUTING.md)

*FloraMind is a full-stack web app that uses machine learning to classify flowers from user measurements. Powered by the Iris dataset and K-Nearest Neighbors, it predicts species through an intuitive interface.*
</div>

----
<br>

## Features

### Interactive User Interface
- Clean, responsive Bootstrap 5-based design
- Real-time input validation
- Live measurement preview
- Mobile-friendly interface

### Machine Learning Classification
- K-Nearest Neighbors (KNN) algorithm implementation
- Trained on the classic Iris dataset
- Predicts three species: Iris Setosa, Iris Versicolor, Iris Virginica
- High accuracy classification

### Dynamic Results Display
- Color-coded species predictions
- Icon-based visual feedback
- Detailed classification confidence scores
- Responsive result cards

### Data Persistence
- MySQL database integration
- Automatic prediction logging
- Timestamp tracking
- Historical data storage

### Analytics Capabilities
- Prediction history tracking
- Usage statistics
- Model performance insights
- Admin dashboard (optional)

## Technology Stack

| Layer | Technologies |
|-------|-------------|
| **Frontend** | HTML5, CSS3, Bootstrap 5, JavaScript (ES6) |
| **Backend** | PHP 8, PHP-ML Library |
| **Database** | MySQL 8 |
| **ML Algorithm** | K-Nearest Neighbors (KNN) |
| **Dataset** | Iris Dataset (CSV) |

## Quick Start

### Prerequisites
- PHP 8.0 or higher
- MySQL 8.0 or higher
- Composer (for PHP-ML installation)
- Web server (Apache/Nginx)

### Installation

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

4. Update configuration
```php
// config/database.php
define('DB_HOST', 'localhost');
define('DB_NAME', 'floramind');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
```

5. Start the application
```bash
php -S localhost:8000
```

Visit `http://localhost:8000` in your browser.

## Usage Guide

### Making a Prediction

1. **Enter Measurements**
   - Sepal Length (cm): 4.0 - 8.0
   - Sepal Width (cm): 2.0 - 5.0
   - Petal Length (cm): 1.0 - 7.0
   - Petal Width (cm): 0.1 - 3.0

2. **Submit for Classification**
   - Click the "Classify Flower" button
   - Wait for the prediction results

3. **View Results**
   - Species name displayed
   - Confidence score shown
   - Visual indicators provided

### Understanding Results

**Iris Setosa**
- Typically small petals
- Wide sepals
- Color: Purple theme

**Iris Versicolor**
- Medium-sized features
- Balanced proportions
- Color: Blue theme

**Iris Virginica**
- Large petals
- Narrow sepals
- Color: Pink theme

## Project Structure

```
floramind/
├── index.php              # Main application entry
├── assets/
│   ├── css/
│   │   └── styles.css     # Custom styles
│   ├── js/
│   │   └── app.js         # Frontend logic
│   └── images/            # Icons and visuals
├── src/
│   ├── Classifier.php     # KNN implementation
│   ├── Database.php       # DB connection
│   └── Logger.php         # Prediction logging
├── data/
│   └── iris.csv           # Training dataset
├── config/
│   └── database.php       # DB configuration
├── database/
│   └── schema.sql         # Database schema
└── docs/                  # Documentation
```

## How It Works

### 1. Data Collection
The application uses the Iris dataset, containing 150 samples with four features each:
- Sepal length and width
- Petal length and width

### 2. Model Training
The KNN algorithm is trained using PHP-ML:
```php
$classifier = new KNearestNeighbors($k = 3);
$classifier->train($samples, $labels);
```

### 3. Prediction
User input is processed and classified:
```php
$prediction = $classifier->predict($userInput);
```

### 4. Storage
Results are logged to MySQL for analytics:
```sql
INSERT INTO predictions (sepal_length, sepal_width, 
petal_length, petal_width, predicted_species, timestamp)
VALUES (?, ?, ?, ?, ?, NOW());
```

## API Reference

### POST /classify
Classifies a flower based on measurements.

**Request Body:**
```json
{
  "sepal_length": 5.1,
  "sepal_width": 3.5,
  "petal_length": 1.4,
  "petal_width": 0.2
}
```

**Response:**
```json
{
  "success": true,
  "species": "Iris Setosa",
  "confidence": 0.95,
  "timestamp": "2025-10-15 12:30:45"
}
```

### GET /analytics
Retrieves prediction statistics.

**Response:**
```json
{
  "total_predictions": 1250,
  "species_distribution": {
    "Iris Setosa": 420,
    "Iris Versicolor": 415,
    "Iris Virginica": 415
  },
  "accuracy": 0.96
}
```

## Educational Value

### Learning Objectives
- Understanding supervised machine learning
- Implementing KNN algorithm
- Full-stack web development
- Database design and integration
- RESTful API concepts
- Data validation and sanitization

### Suitable For
- Computer Science students
- Web development learners
- Machine learning beginners
- Full-stack bootcamp projects

## Extending FloraMind

### Suggested Enhancements
1. **Multi-Model Support**: Add SVM, Decision Trees, Random Forest
2. **Image Classification**: Integrate CNN for flower image recognition
3. **User Authentication**: Add login and personalized history
4. **Real-time Charts**: Visualize predictions with Chart.js
5. **Export Functionality**: Download prediction history as CSV
6. **API Rate Limiting**: Implement request throttling
7. **Caching Layer**: Use Redis for faster predictions

## Troubleshooting

### Common Issues

**Issue: "Class not found" error**
```bash
# Solution: Install PHP-ML
composer require php-ai/php-ml
```

**Issue: Database connection failed**
```php
// Check credentials in config/database.php
// Verify MySQL service is running
sudo systemctl status mysql
```

**Issue: Prediction accuracy is low**
```php
// Increase K value in KNN
$classifier = new KNearestNeighbors($k = 5);
```

## Contributing

We welcome contributions! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## Support

For questions and support:
- 📧 Email: support@floramind.dev
- 💬 Discord: [Join our community](#)
- 🐛 Issues: [GitHub Issues](https://github.com/ARUNAGIRINATHAN-K/floramind/issues)

## Roadmap

- [x] Basic KNN implementation
- [x] Web interface
- [x] Database integration
- [ ] Analytics dashboard
- [ ] Multi-model support
- [ ] Docker containerization
- [ ] API authentication
- [ ] Image classification

---

**Built with ❤️ for education and innovation**
