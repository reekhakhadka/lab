<?php
if (isset($_POST['submit'])) {
    $conn = new mysqli("localhost", "root", "", "web_db");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $title = $conn->real_escape_string($_POST['title']);
    $publisher = $conn->real_escape_string($_POST['publisher']);
    $author = $conn->real_escape_string($_POST['author']);
    $edition = $conn->real_escape_string($_POST['edition']);
    $no_of_page = (int)$_POST['no_of_page'];
    $price = (float)$_POST['price'];
    $publish_date = $conn->real_escape_string($_POST['publish_date']);
    $isbn = $conn->real_escape_string($_POST['isbn']);

    $sql = "INSERT INTO books (title, publisher, author, edition, no_of_page, price, publish_date, isbn)
            VALUES ('$title', '$publisher', '$author', '$edition', $no_of_page, $price, '$publish_date', '$isbn')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Book stored successfully.</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>
    <h2>Add Book to Library</h2>
    <form method="POST" action="">
        Title: <input type="text" name="title" required><br><br>
        Publisher: <input type="text" name="publisher"><br><br>
        Author: <input type="text" name="author"><br><br>
        Edition: <input type="text" name="edition"><br><br>
        No. of Pages: <input type="number" name="no_of_page"><br><br>
        Price: <input type="number" name="price" step="0.01"><br><br>
        Publish Date: <input type="date" name="publish_date"><br><br>
        ISBN: <input type="text" name="isbn"><br><br>
        <input type="submit" name="submit" value="Add Book">
    </form>
</body>
</html>