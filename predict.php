<?php
// predict.php
header('Content-Type: application/json'); // Ensure JSON response
ini_set('display_errors', 0); // Disable HTML error output
error_reporting(E_ALL);

require 'vendor/autoload.php'; // Composer autoloader

use Phpml\Classification\KNearestNeighbors;
use Phpml\Dataset\CsvDataset;

// Database connection
$host = 'localhost';
$db = 'floramind';
$user = 'root'; // Update as needed
$pass = ''; // Update as needed

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}

// Handle GET for past predictions
if (isset($_GET['action']) && $_GET['action'] === 'get_past') {
    try {
        $stmt = $pdo->query('SELECT * FROM predictions ORDER BY id DESC LIMIT 10');
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($rows);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => 'Failed to fetch predictions: ' . $e->getMessage()]);
    }
    exit;
}

// Handle POST for prediction
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Validate inputs
        $sepal_length = isset($_POST['sepal_length']) ? (float) $_POST['sepal_length'] : null;
        $sepal_width = isset($_POST['sepal_width']) ? (float) $_POST['sepal_width'] : null;
        $petal_length = isset($_POST['petal_length']) ? (float) $_POST['petal_length'] : null;
        $petal_width = isset($_POST['petal_width']) ? (float) $_POST['petal_width'] : null;

        if (is_null($sepal_length) || is_null($sepal_width) || is_null($petal_length) || is_null($petal_width)) {
            throw new Exception('All measurements are required');
        }

        // Load Iris dataset
        if (!file_exists('iris.csv')) {
            throw new Exception('Iris dataset (iris.csv) not found');
        }
        $dataset = new CsvDataset('iris.csv', 4, true);
        $samples = $dataset->getSamples();
        $targets = $dataset->getTargets();

        // Train KNN
        $classifier = new KNearestNeighbors(3);
        $classifier->train($samples, $targets);

        // Predict
        $prediction = $classifier->predict([$sepal_length, $sepal_width, $petal_length, $petal_width]);

        // Save to DB
        $stmt = $pdo->prepare('INSERT INTO predictions (sepal_length, sepal_width, petal_length, petal_width, prediction) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$sepal_length, $sepal_width, $petal_length, $petal_width, $prediction]);

        echo json_encode(['success' => true, 'prediction' => $prediction]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => 'Prediction failed: ' . $e->getMessage()]);
    }
    exit;
}

echo json_encode(['success' => false, 'error' => 'Invalid request']);
exit;