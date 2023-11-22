<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "cholera";

$db = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["input_features"])) {
    $input_features = $_POST["input_features"];

    // Make a POST request to the Flask API
    $url = 'http://localhost:5000/predict';
    $data = json_encode(array('input_features' => $input_features));
    
    $options = array(
        'http' => array(
            'header' => "Content-type: application/json\r\n", // Set the content type to JSON
            'method' => 'POST',
            'content' => $data,
        ),
    );
    
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        die("Failed to fetch data from Flask API. Error: " . error_get_last()['message']);
    }

    $response = json_decode($result, true);
    $prediction = $response['prediction'];

    // Save the prediction to the MySQL database
    $insert_query = "INSERT INTO cholera_predictions (input_features, prediction) VALUES ('$input_features', $prediction)";
    mysqli_query($db, $insert_query);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cholera Prediction</title>
</head>
<body>
    <h1>Cholera Prediction</h1>
    <form method="POST" action="">
        <label for="input_features">Input Features (comma-separated):</label>
        <input type="text" name="input_features" id="input_features">
        <input type="submit" value="Predict">
    </form>

    <div>
        <h2>Prediction Result:</h2>
        <p id="prediction_result"><?php echo isset($prediction) ? "Cholera Prediction: $prediction" : ""; ?></p>
    </div>

    <?php
    // Display predictions from the database
    $select_query = "SELECT * FROM cholera_predictions";
    $result = mysqli_query($db, $select_query);
    ?>
    <div>
        <h2>Recent Predictions:</h2>
        <ul>
            <?php while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>Input Features: {$row['input_features']}, Prediction: {$row['prediction']}</li>";
            } ?>
        </ul>
    </div>

</body>
</html>
