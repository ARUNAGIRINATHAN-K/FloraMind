<div align="center">

<img src="FloraMind.png" alt="CipherSingularity Logo" width="500"/>
<BR>
<!--# FloraMind -->

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

## User Guide

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
├── index.php              # Main application entry (HTML UI)
├── predict.php            # Backend API for predictions
├── script.js              # Frontend logic & AJAX
├── style.css              # Custom styles
├── iris.csv               # Training dataset (150 samples)
├── database/
│   └── schema.sql         # Database schema
├── vendor/                # Composer dependencies
│   └── php-ai/php-ml/     # PHP Machine Learning library
├── composer.json          # Dependency manifest
└── composer.phar          # Local Composer (if installed locally)
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

## Contributing

We welcome contributions! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## Support

For questions and support:
<!---- 📧 Email: support@floramind.dev
- 💬 Discord: [Join our community](#)--->
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
