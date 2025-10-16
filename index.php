<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FloraMind - Iris Flower Classifier</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">FloraMind: Iris Flower Classifier</h1>
        <p class="text-center lead">Enter flower measurements to predict the Iris species using K-Nearest Neighbors (KNN) machine learning. This app demonstrates basic ML in PHP with data persistence in MySQL.</p>

        <!-- Input Form -->
        <form id="predictionForm" class="card p-4 mb-4">
            <div class="row">
                <div class="col-md-6">
                    <label for="sepalLength" class="form-label">Sepal Length (cm)</label>
                    <input type="number" class="form-control" id="sepalLength" name="sepal_length" step="0.1" required>
                    <div class="preview mt-2">Preview: <span id="sepalLengthPreview">0</span> cm</div>
                </div>
                <div class="col-md-6">
                    <label for="sepalWidth" class="form-label">Sepal Width (cm)</label>
                    <input type="number" class="form-control" id="sepalWidth" name="sepal_width" step="0.1" required>
                    <div class="preview mt-2">Preview: <span id="sepalWidthPreview">0</span> cm</div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="petalLength" class="form-label">Petal Length (cm)</label>
                    <input type="number" class="form-control" id="petalLength" name="petal_length" step="0.1" required>
                    <div class="preview mt-2">Preview: <span id="petalLengthPreview">0</span> cm</div>
                </div>
                <div class="col-md-6">
                    <label for="petalWidth" class="form-label">Petal Width (cm)</label>
                    <input type="number" class="form-control" id="petalWidth" name="petal_width" step="0.1" required>
                    <div class="preview mt-2">Preview: <span id="petalWidthPreview">0</span> cm</div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Predict Flower Type</button>
        </form>

        <!-- Prediction Result -->
        <div id="result" class="card p-4 mb-4 d-none">
            <h3 class="text-center">Prediction Result</h3>
            <div id="predictionOutput" class="text-center"></div>
        </div>

        <!-- Past Predictions -->
        <div class="card p-4">
            <h3 class="text-center mb-3">Past Predictions</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sepal L (cm)</th>
                        <th>Sepal W (cm)</th>
                        <th>Petal L (cm)</th>
                        <th>Petal W (cm)</th>
                        <th>Predicted Type</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody id="pastPredictions"></tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="script.js"></script>
</body>
</html>