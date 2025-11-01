<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "sl_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ------------------- INSERT OR UPDATE RECORD -------------------
if (isset($_POST['save'])) {
    $name = trim($_POST['name']);
    $rank = trim($_POST['rank']);
    $status = trim($_POST['status']);
    $created_by = trim($_POST['created_by']);
    $updated_by = trim($_POST['updated_by']);
    $image = "";

    // Image upload
    if (!empty($_FILES["image"]["name"])) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);

        $file_name = time() . "_" . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Only jpg, jpeg, png allowed
        $allowed_types = array("jpg", "jpeg", "png");
        if (in_array($file_type, $allowed_types)) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            $image = $file_name;
        }
    }

    // Insert or Update
    if (!empty($_POST['id'])) {
        // UPDATE
        $id = $_POST['id'];
        $sql = "UPDATE userss SET name='$name', rank='$rank', status='$status', 
                updated_by='$updated_by', updated_at=NOW()" . 
                (!empty($image) ? ", image='$image'" : "") . " WHERE id=$id";
        $conn->query($sql);
        echo "✅ Record updated successfully!";
    } else {
        // INSERT
        $stmt = $conn->prepare("INSERT INTO userss (name, rank, status, image, created_by, updated_by, created_at, updated_at)
                                VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())");
        $stmt->bind_param("ssssss", $name, $rank, $status, $image, $created_by, $updated_by);
        $stmt->execute();
        echo "✅ Record added successfully!";
    }
}

// ------------------- DELETE RECORD -------------------
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM userss WHERE id=$id");
    echo "🗑 Record deleted successfully!";
}

// ------------------- EDIT RECORD -------------------
$editData = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM userss WHERE id=$id");
    $editData = $result->fetch_assoc();
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD Example</title>
</head>
<body>
    <h2>User Management (CRUD)</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $editData['id'] ?? '' ?>">

        Name: <input type="text" name="name" required value="<?= $editData['name'] ?? '' ?>"><br><br>
        Rank: <input type="text" name="rank" value="<?= $editData['rank'] ?? '' ?>"><br><br>
        Status: 
        <select name="status">
            <option value="Active" <?= (isset($editData['status']) && $editData['status']=='Active')?'selected':'' ?>>Active</option>
            <option value="Inactive" <?= (isset($editData['status']) && $editData['status']=='Inactive')?'selected':'' ?>>Inactive</option>
        </select><br><br>
        Image: <input type="file" name="image"><br>
        <?php if (!empty($editData['image'])): ?>
            <img src="uploads/<?= $editData['image'] ?>" width="80"><br>
        <?php endif; ?><br>
        Created By: <input type="text" name="created_by" value="<?= $editData['created_by'] ?? '' ?>"><br><br>
        Updated By: <input type="text" name="updated_by" value="<?= $editData['updated_by'] ?? '' ?>"><br><br>

        <input type="submit" name="save" value="<?= isset($editData) ? 'Update' : 'Save' ?>">
    </form>

    <hr>

    <h3>All Users</h3>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th><th>Name</th><th>Rank</th><th>Status</th><th>Image</th>
            <th>Created By</th><th>Updated By</th><th>Created At</th><th>Updated At</th><th>Action</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM users ORDER BY id DESC");
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['rank'] ?></td>
            <td><?= $row['status'] ?></td>
            <td><img src="uploads/<?= $row['image'] ?>" width="60"></td>
            <td><?= $row['created_by'] ?></td>
            <td><?= $row['updated_by'] ?></td>
            <td><?= $row['created_at'] ?></td>
            <td><?= $row['updated_at'] ?></td>
            <td>
                <a href="?edit=<?= $row['id'] ?>">✏ Edit</a> | 
                <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">🗑 Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>