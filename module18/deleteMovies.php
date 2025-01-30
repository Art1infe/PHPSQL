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

// Check if movie_id is provided via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['movie_id'])) {
    $movie_id = $_POST['movie_id'];

    // Prepare and execute the delete query
    $stmt = $pdo->prepare("DELETE FROM movies WHERE id = ?");
    if ($stmt->execute([$movie_id])) {
        echo "Movie with ID $movie_id has been deleted successfully.";
    } else {
        echo "Failed to delete the movie. Please try again.";
    }
} else {
    echo "Invalid request. Please provide a valid movie ID.";
}
?>
