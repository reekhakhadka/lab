<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "web_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve all books
$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>Books List</h2>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Publisher</th>
                    <th>Author</th>
                    <th>Edition</th>
                    <th>No. of Pages</th>
                    <th>Price</th>
                    <th>Publish Date</th>
                    <th>ISBN</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . htmlspecialchars($row["title"]) . "</td>
                    <td>" . htmlspecialchars($row["publisher"]) . "</td>
                    <td>" . htmlspecialchars($row["author"]) . "</td>
                    <td>" . htmlspecialchars($row["edition"]) . "</td>
                    <td>" . $row["no_of_page"] . "</td>
                    <td>" . $row["price"] . "</td>
                    <td>" . $row["publish_date"] . "</td>
                    <td>" . htmlspecialchars($row["isbn"]) . "</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No books found.</p>";
    }

    $conn->close();
    ?>
</body>
</html>