<?php
// Database connection
$servername = "localhost";
$username = "root"; // Default XAMPP MySQL user
$password = "toor"; // Default XAMPP MySQL password
$dbname = "login_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error_message = "";
$signup_success = false; // Flag for signup success

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = trim($_POST["username"]);
    $input_email = trim($_POST["email"]);
    $input_password = trim($_POST["password"]);
    $input_repassword = trim($_POST["repassword"]);

    // Validate password
    if ($input_password !== $input_repassword) {
        $error_message = "Passwords do not match.";
    } else {
        // Prepare and execute SQL statement to insert user
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sss", $input_username, $input_email, $input_password);
            if ($stmt->execute()) {
                $signup_success = true; // Set flag for signup success
            } else {
                $error_message = "ERROR executing statement: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $error_message = "FAILED TO prepare SQL statement: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up Page</title>
    <style>
        /* CSS for styling */
        .SignUp-container {
            width: 300px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .error {
            color: red;
        }
    </style>
    <script>
        function showPopupAndRedirect() {
            alert("You have successfully created an account! Redirecting to login page...");
            window.location.href = "login.php"; // Redirect to login.php
        }
    </script>
</head>
<body>
    <div class="SignUp-container">
        <h2>Sign Up Page</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <label for="repassword">Re-Password:</label>
            <input type="password" id="repassword" name="repassword" required><br>

            <input type="submit" value="Sign Up">
        </form>
        <?php
        if (!empty($error_message)) {
            echo "<p class='error'>$error_message</p>";
        }
        ?>
        <?php
        if ($signup_success) {
            echo "<script>showPopupAndRedirect();</script>";
        }
        ?>
    </div>
</body>
</html>
