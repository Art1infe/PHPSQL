<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    quantity INT NOT NULL,
    price FLOAT NOT NULL
)";
$conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
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
            padding: 10px;
            text-align: left;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        .form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Product Dashboard</h1>

        <div class="form">
            <form action="" method="POST">
                <input type="text" name="title" placeholder="Product Title" required>
                <textarea name="description" placeholder="Description" required></textarea>
                <input type="number" name="quantity" placeholder="Quantity" required>
                <input type="number" step="0.01" name="price" placeholder="Price" required>
                <button type="submit" name="add">Add Product</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['add'])) {
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $quantity = $_POST['quantity'];
                    $price = $_POST['price'];

                    $sql = "INSERT INTO products (title, description, quantity, price) VALUES ('$title', '$description', $quantity, $price)";
                    $conn->query($sql);
                }

                if (isset($_GET['delete'])) {
                    $id = $_GET['delete'];
                    $sql = "DELETE FROM products WHERE id=$id";
                    $conn->query($sql);
                }

                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['title']}</td>";
                    echo "<td>{$row['description']}</td>";
                    echo "<td>{$row['quantity']}</td>";
                    echo "<td>{$row['price']}</td>";
                    echo "<td class='actions'>
                        <a href='?delete={$row['id']}'>Delete</a>
                        <a href='edit.php?id={$row['id']}'>Edit</a>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
