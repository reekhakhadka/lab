<?php
if (isset($_POST['submit'])) {
    // Directory to store uploaded images
    $target_dir = "profile_images/";

    // Create folder if it doesn’t exist
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Get file information
    $file_name = basename($_FILES["profile"]["name"]);
    $target_file = $target_dir . $file_name;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $file_size = $_FILES["profile"]["size"];

    // Allowed file types
    $allowed_types = array("png", "jpg", "jpeg");

    // Validation checks
    if (!in_array($file_type, $allowed_types)) {
        echo "❌ Only PNG and JPEG image files are allowed.";
    } elseif ($file_size > 512000) { // 500KB = 500 * 1024 bytes
        echo "❌ File size must be less than 500 KB.";
    } else {
        // Upload file
        if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
            echo "✅ Profile image uploaded successfully: " . htmlspecialchars($file_name);
            echo "<br><img src='$target_file' width='150' height='150' alt='Profile Image'>";
        } else {
            echo "❌ Error uploading the image.";
        }
    }
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html>
<head>
    <title>Upload Profile Image</title>
</head>
<body>
    <h2>Upload Your Profile Image</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select Image (PNG/JPEG, Max 500KB): <br><br>
        <input type="file" name="profile" accept=".png, .jpg, .jpeg" required><br><br>
        <input type="submit" name="submit" value="Upload Image">
    </form>
</body>
</html>