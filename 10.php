<?php
$conn = new mysqli("localhost", "root", "", "web_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Handle deletion
if (isset($_GET['delete_id'])) {
    $delete_id = (int)$_GET['delete_id'];
    $sql = "DELETE FROM books WHERE id = $delete_id";

    if ($conn->query($sql)) {
        echo "<p style='color:green;'>Book deleted successfully.</p>";
    } else {
        echo "<p style='color:red;'>Error deleting book: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Books</title>
</head>
<body>
    <h2>Book List (Click Delete to Remove)</h2>
    <table border="1" cellpadding="6">
        <tr>
            <th>ID</th><th>Title</th><th>Author</th><th>Publisher</th><th>Delete</th>
        </tr>
        <?php
        $res = $conn->query("SELECT id, title, author, publisher FROM books");
        while ($row = $res->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>" . htmlspecialchars($row['title']) . "</td>
                    <td>" . htmlspecialchars($row['author']) . "</td>
                    <td>" . htmlspecialchars($row['publisher']) . "</td>
                    <td><a href='?delete_id={$row['id']}' onclick=\"return confirm('Are you sure?')\">Delete</a></td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>