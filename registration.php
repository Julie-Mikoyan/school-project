<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="registration.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">

    <?php
        session_start();

        require_once "database.php";

        if (isset($_POST["submit"])) {
            $fullName = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];
            $roleId = $_POST["role_id"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $error = array();

            if (empty($fullName) || empty($email) || empty($password) || empty($passwordRepeat) || empty($roleId)) {
                array_push($error, "All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($error, "Email is not valid");
            }
            if (strlen($password) < 8) {
                array_push($error, "Password must be at least 8 characters long");
            }
            if ($password !== $passwordRepeat) {
                array_push($error, "Password does not match");
            }

            
            $sql = "SELECT * FROM Users WHERE email = ?";
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) > 0) {
                    array_push($error, "Email already exists!");
                }
            }

            
            if (count($error) > 0) {
                foreach ($error as $err) {
                    echo "<div class='alert alert-danger'>$err</div>";
                }
            } else {
                
                $sql = "INSERT INTO users (fullname, email, password, role_id) VALUES (?, ?, ?, ?)";
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "sssi", $fullName, $email, $passwordHash, $roleId);
                    if (mysqli_stmt_execute($stmt)) {
                        $_SESSION['registration_success'] = "Registration successful! You can now log in.";
                        header("Location: login.php");
                        exit(); 
                    } else {
                        echo "<div class='alert alert-danger'>Error: Could not execute query.</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Error: Could not prepare statement.</div>";
                }
            }
        }
        ?>
        <div class="container">
            <h2>Register</h2>
            <form action="registration.php" method="post">
                <div class="form-group">
                    <input type="text" name="fullname" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="password" name="repeat_password" placeholder="Repeat Password" required>
                </div>
                <div class="form-group">
                <select name="role_id" required style="width: 100%; height: 40px; justify-content: center; color: grey; padding: 10px; border: 1px solid #93c5fd; border-radius: 8px; font-size: 16px; background-color: white; box-sizing: border-box; appearance:none;">
                        <option value="">Select Role</option>
                        <option value="1">Construction Consultant</option>
                        <option value="2">Subcontractor</option>
                        <option value="3">Project Manager</option>
                        <option value="4">Worker</option>
                    </select>
                </div>
                <div class="form-btn">
                    <input type="submit" value="Register" name="submit">
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            }
        }

        function toggleRepeatPassword() {
            const repeatPasswordInput = document.getElementById('repeat_password');
            const repeatEyeIcon = document.getElementById('repeat-eye-icon');
            if (repeatPasswordInput.type === "password") {
                repeatPasswordInput.type = "text";
                repeatEyeIcon.classList.remove('bi-eye');
                repeatEyeIcon.classList.add('bi-eye-slash');
            } else {
                repeatPasswordInput.type = "password";
                repeatEyeIcon.classList.remove('bi-eye-slash');
                repeatEyeIcon.classList.add('bi-eye');
            }
        } 
    </script>

</body>
</html>