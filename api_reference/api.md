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
