<?php
// Database connection
$servername = "localhost";
$username = "root"; // Default XAMPP MySQL user
$password = "toor"; // Default XAMPP MySQL password
$dbname = "login_db"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error_message = "";
$login_success = false; // Flag for login success

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = trim($_POST["username"]);
    $input_password = trim($_POST["password"]);

    // Prepare and execute SQL statement
    $sql = "SELECT password FROM users WHERE username=?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $input_username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($stored_password);
            $stmt->fetch();

            // Verify password
            if ($input_password === $stored_password) {
                $login_success = true; // Set flag for login success
            } else {
                $error_message = "Invalid username or password.";
            }
        } else {
            $error_message = "Invalid username or password.";
        }

        $stmt->close();
    } else {
        $error_message = "FAILED TO prepare SQL statement: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        /* CSS for styling */
        .login-container {
            width: 300px;
            margin: auto;
            padding: 20px;
            border: 1px solid #1c1c1c;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #1c1c1c;
            color: #e0e0e0;
        }

        h2 {
            font-family: 'Arial', sans-serif;
            color: #e74c3c; /* Red accent color */
            margin: 0;
        }

        label {
        }

        body {
            background-color: gray;
        }

        .error {
            color: red;
        }
    </style>
    <script>
        function showPopup() {
            alert("Login successful!");
            window.location.href = "php.php"; // Redirect to php.php
        }
    </script>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="if(<?php echo json_encode($login_success); ?>) showPopup(); return <?php echo json_encode(!$login_success); ?>;">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            
            <p><a href="R.php">Sign Up</a></p>

            <input type="submit" value="Login">
        </form>
        <?php
        if (!empty($error_message)) {
            echo "<p class='error'>$error_message</p>";
        }
        ?>
    </div>
</body>
</html>
