<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $err = [];

    // Name
    if (isset($_POST['Name']) && trim($_POST['Name']) != '') {
        $Name = trim($_POST['Name']);
    } else {
        $err['Name'] = "Enter your name";
    }

    // Date of Birth
    if (isset($_POST['DOB']) && trim($_POST['DOB']) != '') {
        $DOB = $_POST['DOB'];
    } else {
        $err['DOB'] = "Enter your date of birth";
    }

    // Doctor Name
    if (isset($_POST['doctor_name']) && trim($_POST['doctor_name']) != '') {
        $doctor_name = trim($_POST['doctor_name']);
    } else {
        $err['doctor_name'] = "Enter the doctor's name";
    }

    // Appointment Date
    if (isset($_POST['appointment_date']) && trim($_POST['appointment_date']) != '') {
        $appointment_date = $_POST['appointment_date'];
    } else {
        $err['appointment_date'] = "Select appointment date";
    }

    // Appointment Time
    if (isset($_POST['appointment_time']) && trim($_POST['appointment_time']) != '') {
        $appointment_time = $_POST['appointment_time'];
    } else {
        $err['appointment_time'] = "Select appointment time";
    }

    // Gender
    if (isset($_POST['gender']) && in_array($_POST['gender'], ['Male', 'Female', 'Other'])) {
        $gender = $_POST['gender'];
    } else {
        $err['gender'] = "Select gender";
    }

    // Fee
    if (isset($_POST['fee']) && is_numeric($_POST['fee']) && $_POST['fee'] >= 0) {
        $fee = $_POST['fee'];
    } else {
        $err['fee'] = "Enter a valid fee amount";
    }

    // Remarks
    if (isset($_POST['remarks']) && trim($_POST['remarks']) != '') {
        $remarks = trim($_POST['remarks']);
    } else {
        $err['remarks'] = "Enter remarks";
    }

    if (count($err) == 0) {
        try {
            $connect = new mysqli('localhost', 'root', '', 'web_db');
            $stmt = $connect->prepare("INSERT INTO patients (Name, DOB, doctor_name, appointment_date, appointment_time, gender, fee, remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            if (!$stmt) {
                die("Prepare failed: " . $connect->error); // This will show the real error
            }

            $stmt->bind_param("ssssssss", $Name, $DOB, $doctor_name, $appointment_date, $appointment_time, $gender, $fee, $remarks);
            $stmt->execute();

            if ($stmt->affected_rows == 1) {
                echo "Appointment successfully added.";
                $name = $doctor_name = $dob = $gender = $appointment_date = $appointment_time = $fee = $remarks = "";
            } else {
                echo "Failed to add appointment.";
            }
            $stmt->close();
        } catch (Exception $ex) {
            die("Error: " . $ex->getMessage());
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Appointment</title>
</head>
<body>
    <h1>Add Appointment</h1>
    <form method="post" action="">
        <label>Name:</label>
        <input type="text" name="Name" value="<?php echo isset($Name) ? $Name : ''; ?>">
        <?php echo isset($err['Name']) ? $err['Name'] : ''; ?>
        <br />

        <label>Date of Birth:</label>
        <input type="date" name="DOB" value="<?php echo isset($DOB) ? $DOB : ''; ?>">
        <?php echo isset($err['DOB']) ? $err['DOB'] : ''; ?>
        <br />

        <label>Doctor Name:</label>
        <input type="text" name="doctor_name" value="<?php echo isset($doctor_name) ? $doctor_name : ''; ?>">
        <?php echo isset($err['doctor_name']) ? $err['doctor_name'] : ''; ?>
        <br />

        <label>Appointment Date:</label>
        <input type="date" name="appointment_date" value="<?php echo isset($appointment_date) ? $appointment_date : ''; ?>">
        <?php echo isset($err['appointment_date']) ? $err['appointment_date'] : ''; ?>
        <br />

        <label>Appointment Time:</label>
        <input type="time" name="appointment_time" value="<?php echo isset($appointment_time) ? $appointment_time : ''; ?>">
        <?php echo isset($err['appointment_time']) ? $err['appointment_time'] : ''; ?>
        <br />

        <label>Gender:</label>
        <select name="gender">
            <option value="">-- Select Gender --</option>
            <option value="Male" <?php echo (isset($gender) && $gender == 'Male') ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo (isset($gender) && $gender == 'Female') ? 'selected' : ''; ?>>Female</option>
            <option value="Other" <?php echo (isset($gender) && $gender == 'Other') ? 'selected' : ''; ?>>Other</option>
        </select>
        <?php echo isset($err['gender']) ? $err['gender'] : ''; ?>
        <br />

        <label>Fee:</label>
        <input type="number" step="0.01" name="fee" value="<?php echo isset($fee) ? $fee : ''; ?>">
        <?php echo isset($err['fee']) ? $err['fee'] : ''; ?>
        <br />

        <label>Remarks:</label>
        <textarea name="remarks"><?php echo isset($remarks) ? $remarks : ''; ?></textarea>
        <?php echo isset($err['remarks']) ? $err['remarks'] : ''; ?>
        <br /><br />

        <input type="submit" value="Submit">
    </form>
</body>
</html>
