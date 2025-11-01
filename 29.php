<?php
if (isset($_POST['submit'])) {
    // Directory where files will be uploaded
    $target_dir = "uploads/";

    // Create folder if not exists
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // File details
    $file_name = basename($_FILES["cv"]["name"]);
    $target_file = $target_dir . $file_name;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $file_size = $_FILES["cv"]["size"];

    // Allowed file types
    $allowed_types = array("pdf", "doc", "docx");

    // Validation checks
    if (!in_array($file_type, $allowed_types)) {
        echo "❌ Only PDF and DOC/DOCX files are allowed.";
    } elseif ($file_size > 1048576) { // 1MB = 1024*1024 bytes
        echo "❌ File size must be less than 1 MB.";
    } else {
        // Upload file
        if (move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file)) {
            echo "✅ CV uploaded successfully: " . htmlspecialchars($file_name);
        } else {
            echo "❌ Error uploading file.";
        }
    }
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html>
<head>
    <title>Upload CV</title>
</head>
<body>
    <h2>Upload Your CV</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select CV to upload (PDF/DOC/DOCX, Max 1MB): <br><br>
        <input type="file" name="cv" required><br><br>
        <input type="submit" name="submit" value="Upload CV">
    </form>
</body>
</html>