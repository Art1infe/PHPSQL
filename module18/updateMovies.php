<?php
// Database connection (update with your credentials)
$host = 'localhost';
$dbname = 'movies_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if all required data is provided via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['movie_id'], $_POST['title'], $_POST['director'], $_POST['year'])) {
    $movie_id = $_POST['movie_id'];
    $title = $_POST['title'];
    $director = $_POST['director'];
    $year = $_POST['year'];

    // Prepare and execute the update query
    $stmt = $pdo->prepare("UPDATE movies SET title = ?, director = ?, year = ? WHERE id = ?");
    if ($stmt->execute([$title, $director, $year, $movie_id])) {
        echo "Movie with ID $movie_id has been updated successfully.";
    } else {
        echo "Failed to update the movie. Please try again.";
    }
} else {
    echo "Invalid request. Please provide all required data (movie_id, title, director, year).";
}
?>