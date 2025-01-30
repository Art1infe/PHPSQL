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

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['deleteMovie'])) {
        $id = $_POST['movie_id'];
        $stmt = $pdo->prepare("DELETE FROM movies WHERE id = ?");
        $stmt->execute([$id]);
    } elseif (isset($_POST['updateMovie'])) {
        $id = $_POST['movie_id'];
        $title = $_POST['title'];
        $director = $_POST['director'];
        $year = $_POST['year'];

        $stmt = $pdo->prepare("UPDATE movies SET title = ?, director = ?, year = ? WHERE id = ?");
        $stmt->execute([$title, $director, $year, $id]);
    } elseif (isset($_POST['addMovie'])) {
        $title = $_POST['title'];
        $director = $_POST['director'];
        $year = $_POST['year'];

        $stmt = $pdo->prepare("INSERT INTO movies (title, director, year) VALUES (?, ?, ?)");
        $stmt->execute([$title, $director, $year]);
    }
}

// Fetch all movies
$stmt = $pdo->query("SELECT * FROM movies");
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Movie Dashboard</h1>

    <form method="post">
        <h2>Add a New Movie</h2>
        <label>Title: <input type="text" name="title" required></label><br>
        <label>Director: <input type="text" name="director" required></label><br>
        <label>Year: <input type="number" name="year" required></label><br>
        <button type="submit" name="addMovie">Add Movie</button>
    </form>

    <h2>Movies List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Director</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movies as $movie): ?>
                <tr>
                    <td><?php echo $movie['id']; ?></td>
                    <td><?php echo htmlspecialchars($movie['title']); ?></td>
                    <td><?php echo htmlspecialchars($movie['director']); ?></td>
                    <td><?php echo $movie['year']; ?></td>
                    <td>
                        <form method="post" style="display: inline;">
                            <input type="hidden" name="movie_id" value="<?php echo $movie['id']; ?>">
                            <button type="submit" name="deleteMovie">Delete</button>
                        </form>

                        <form method="post" style="display: inline;">
                            <input type="hidden" name="movie_id" value="<?php echo $movie['id']; ?>">
                            <input type="text" name="title" placeholder="Title" value="<?php echo htmlspecialchars($movie['title']); ?>" required>
                            <input type="text" name="director" placeholder="Director" value="<?php echo htmlspecialchars($movie['director']); ?>" required>
                            <input type="number" name="year" placeholder="Year" value="<?php echo $movie['year']; ?>" required>
                            <button type="submit" name="updateMovie">Update</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>