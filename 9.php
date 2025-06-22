<?php
$conn = new mysqli("localhost", "root", "", "web_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Handle update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $conn->real_escape_string($_POST['title']);
    $publisher = $conn->real_escape_string($_POST['publisher']);
    $author = $conn->real_escape_string($_POST['author']);
    $edition = $conn->real_escape_string($_POST['edition']);
    $no_of_page = (int)$_POST['no_of_page'];
    $price = (float)$_POST['price'];
    $publish_date = $_POST['publish_date'];
    $isbn = $conn->real_escape_string($_POST['isbn']);

    $sql = "UPDATE books SET
                title='$title',
                publisher='$publisher',
                author='$author',
                edition='$edition',
                no_of_page=$no_of_page,
                price=$price,
                publish_date='$publish_date',
                isbn='$isbn'
            WHERE id=$id";

    if ($conn->query($sql)) {
        echo "<p style='color:green;'>Book updated successfully.</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }
}

// Fetch book to edit
$editBook = null;
if (isset($_GET['edit_id'])) {
    $edit_id = (int)$_GET['edit_id'];
    $res = $conn->query("SELECT * FROM books WHERE id = $edit_id");
    if ($res->num_rows == 1) {
        $editBook = $res->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Books</title>
</head>
<body>
    <h2>Edit Book</h2>

    <?php if ($editBook): ?>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $editBook['id'] ?>">
        Title: <input type="text" name="title" value="<?= htmlspecialchars($editBook['title']) ?>"><br><br>
        Publisher: <input type="text" name="publisher" value="<?= htmlspecialchars($editBook['publisher']) ?>"><br><br>
        Author: <input type="text" name="author" value="<?= htmlspecialchars($editBook['author']) ?>"><br><br>
        Edition: <input type="text" name="edition" value="<?= htmlspecialchars($editBook['edition']) ?>"><br><br>
        No. of Pages: <input type="number" name="no_of_page" value="<?= $editBook['no_of_page'] ?>"><br><br>
        Price: <input type="number" step="0.01" name="price" value="<?= $editBook['price'] ?>"><br><br>
        Publish Date: <input type="date" name="publish_date" value="<?= $editBook['publish_date'] ?>"><br><br>
        ISBN: <input type="text" name="isbn" value="<?= htmlspecialchars($editBook['isbn']) ?>"><br><br>
        <input type="submit" name="update" value="Update Book">
    </form>
    <hr>
    <?php endif; ?>

    <h2>Book List</h2>
    <table border="1" cellpadding="6">
        <tr>
            <th>ID</th><th>Title</th><th>Author</th><th>Publisher</th><th>Edit</th>
        </tr>
        <?php
        $res = $conn->query("SELECT id, title, author, publisher FROM books");
        while ($row = $res->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>" . htmlspecialchars($row['title']) . "</td>
                    <td>" . htmlspecialchars($row['author']) . "</td>
                    <td>" . htmlspecialchars($row['publisher']) . "</td>
                    <td><a href='?edit_id={$row['id']}'>Edit</a></td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>