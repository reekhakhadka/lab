<?php
// Database Connection
$conn = new mysqli("localhost", "root", "", "sl_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ------------------------ COURSE CRUD ------------------------
if (isset($_POST['save_course'])) {
    $title = trim($_POST['title']);
    $duration = trim($_POST['duration']);
    $status = trim($_POST['status']);

    if (!empty($_POST['id'])) {
        // Update Course
        $id = $_POST['id'];
        $conn->query("UPDATE courses SET title='$title', duration='$duration', status='$status', updated_at=NOW() WHERE id=$id");
        echo "✅ Course updated successfully!";
    } else {
        // Insert Course
        $conn->query("INSERT INTO courses (title, duration, status, created_at, updated_at)
                      VALUES ('$title', '$duration', '$status', NOW(), NOW())");
        echo "✅ New course added!";
    }
}

// Delete Course
if (isset($_GET['delete_course'])) {
    $id = $_GET['delete_course'];
    $conn->query("DELETE FROM courses WHERE id=$id");
    echo "🗑 Course deleted!";
}

// Edit Course
$editCourse = null;
if (isset($_GET['edit_course'])) {
    $id = $_GET['edit_course'];
    $editCourse = $conn->query("SELECT * FROM courses WHERE id=$id")->fetch_assoc();
}

// ------------------------ STUDENT CRUD ------------------------
if (isset($_POST['save_student'])) {
    $name = trim($_POST['name']);
    $course_id = $_POST['course_id'];
    $fee = $_POST['fee'];
    $rollno = $_POST['rollno'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $status = $_POST['status'];

    if (!empty($_POST['student_id'])) {
        // Update student
        $id = $_POST['student_id'];
        $conn->query("UPDATE students SET name='$name', course_id='$course_id', fee='$fee', rollno='$rollno',
                      phone='$phone', address='$address', dob='$dob', status='$status', updated_at=NOW()
                      WHERE id=$id");
        echo "✅ Student updated successfully!";
    } else {
        // Insert student
        $conn->query("INSERT INTO students (name, course_id, fee, rollno, phone, address, dob, status, created_at, updated_at)
                      VALUES ('$name','$course_id','$fee','$rollno','$phone','$address','$dob','$status',NOW(),NOW())");
        echo "✅ New student added!";
    }
}

// Delete Student
if (isset($_GET['delete_student'])) {
    $id = $_GET['delete_student'];
    $conn->query("DELETE FROM students WHERE id=$id");
    echo "🗑 Student deleted!";
}

// Edit Student
$editStudent = null;
if (isset($_GET['edit_student'])) {
    $id = $_GET['edit_student'];
    $editStudent = $conn->query("SELECT * FROM students WHERE id=$id")->fetch_assoc();
}

// Fetch all courses for dropdown
$courses = $conn->query("SELECT * FROM courses");
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD - Courses & Students</title>
</head>
<body>
<h2>📘 Course Management</h2>

<form method="post">
    <input type="hidden" name="id" value="<?= $editCourse['id'] ?? '' ?>">
    Title: <input type="text" name="title" required value="<?= $editCourse['title'] ?? '' ?>"><br><br>
    Duration: <input type="text" name="duration" value="<?= $editCourse['duration'] ?? '' ?>"><br><br>
    Status:
    <select name="status">
        <option value="Active" <?= (isset($editCourse['status']) && $editCourse['status']=='Active')?'selected':'' ?>>Active</option>
        <option value="Inactive" <?= (isset($editCourse['status']) && $editCourse['status']=='Inactive')?'selected':'' ?>>Inactive</option>
    </select><br><br>
    <input type="submit" name="save_course" value="<?= isset($editCourse) ? 'Update Course' : 'Add Course' ?>">
</form>

<h3>All Courses</h3>
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Title</th><th>Duration</th><th>Status</th><th>Action</th></tr>
<?php
$result = $conn->query("SELECT * FROM courses ORDER BY id DESC");
while ($row = $result->fetch_assoc()):
?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['title'] ?></td>
<td><?= $row['duration'] ?></td>
<td><?= $row['status'] ?></td>
<td>
<a href="?edit_course=<?= $row['id'] ?>">✏ Edit</a> |
<a href="?delete_course=<?= $row['id'] ?>" onclick="return confirm('Delete this course?')">🗑 Delete</a>
</td>
</tr>
<?php endwhile; ?>
</table>

<hr>

<h2>🎓 Student Management</h2>

<form method="post">
    <input type="hidden" name="student_id" value="<?= $editStudent['id'] ?? '' ?>">
    Name: <input type="text" name="name" required value="<?= $editStudent['name'] ?? '' ?>"><br><br>
    Course:
    <select name="course_id" required>
        <option value="">Select Course</option>
        <?php
        $courses->data_seek(0);
        while ($course = $courses->fetch_assoc()):
        ?>
        <option value="<?= $course['id'] ?>" <?= (isset($editStudent['course_id']) && $editStudent['course_id']==$course['id'])?'selected':'' ?>>
            <?= $course['title'] ?>
        </option>
        <?php endwhile; ?>
    </select><br><br>
    Fee: <input type="number" step="0.01" name="fee" value="<?= $editStudent['fee'] ?? '' ?>"><br><br>
    Roll No: <input type="text" name="rollno" value="<?= $editStudent['rollno'] ?? '' ?>"><br><br>
    Phone: <input type="text" name="phone" value="<?= $editStudent['phone'] ?? '' ?>"><br><br>
    Address: <textarea name="address"><?= $editStudent['address'] ?? '' ?></textarea><br><br>
    DOB: <input type="date" name="dob" value="<?= $editStudent['dob'] ?? '' ?>"><br><br>
    Status:
    <select name="status">
        <option value="Active" <?= (isset($editStudent['status']) && $editStudent['status']=='Active')?'selected':'' ?>>Active</option>
        <option value="Inactive" <?= (isset($editStudent['status']) && $editStudent['status']=='Inactive')?'selected':'' ?>>Inactive</option>
    </select><br><br>
    <input type="submit" name="save_student" value="<?= isset($editStudent) ? 'Update Student' : 'Add Student' ?>">
</form>

<h3>All Students</h3>
<table border="1" cellpadding="6">
<tr>
<th>ID</th><th>Name</th><th>Course</th><th>Fee</th><th>Roll No</th><th>Phone</th><th>Status</th><th>Action</th>
</tr>
<?php
$result = $conn->query("SELECT s.*, c.title AS course_name FROM students s 
                        LEFT JOIN courses c ON s.course_id = c.id ORDER BY s.id DESC");
while ($row = $result->fetch_assoc()):
?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['name'] ?></td>
<td><?= $row['course_name'] ?></td>
<td><?= $row['fee'] ?></td>
<td><?= $row['rollno'] ?></td>
<td><?= $row['phone'] ?></td>
<td><?= $row['status'] ?></td>
<td>
<a href="?edit_student=<?= $row['id'] ?>">✏ Edit</a> |
<a href="?delete_student=<?= $row['id'] ?>" onclick="return confirm('Delete this student?')">🗑 Delete</a>
</td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>