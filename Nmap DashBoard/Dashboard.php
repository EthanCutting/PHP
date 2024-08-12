<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    /* General container styling */
    body{
        background-color: #1c1c1c; /* Dark background color */
        color: #e0e0e0; /* Light text color */
    }    
    .dashboard-container {
        width: 90%;
        max-width: 1200px;
        margin: auto;
        border: 1px solid #333;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        background-color: #1c1c1c;
        color: #e0e0e0;
    }

    /* Header styling */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 2px solid #444;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .header h1 {
        font-family: 'Arial', sans-serif;
        color: #e74c3c; /* Red accent color */
        margin: 0;
    }

    /* User info in the header */
    .user-info {
        display: flex;
        align-items: center;
        font-size: 16px;
        color: #e0e0e0;
    }

    .user-info i {
        margin-right: 8px;
        font-size: 18px; /* Adjusted font size for better alignment */
    }

    .user-info span {
        font-weight: bold;
    }

    /* Sidebar styling */
    .sidebar {
        width: 25%;
        float: left;
        padding: 10px;
        border-right: 2px solid #444;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
    }

    .sidebar ul li {
        margin: 10px 0;
    }

    .sidebar ul li a {
        text-decoration: none;
        color: #e74c3c; /* Red accent color */
        font-size: 16px;
    }

    .sidebar ul li a:hover {
        text-decoration: underline;
    }

    /* Main content area styling */
    .main-content {
        width: 75%;
        float: left;
        padding: 10px;
    }

    /* Card styling */
    .card {
        border: 1px solid #444;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        background-color: #2c2c2c;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
    }

    .card h2 {
        margin-top: 0;
        color: #e74c3c;
        font-family: 'Arial', sans-serif;
    }

    .card p {
        color: #e0e0e0;
    }

    /* Input area styling */
    .textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #555;
        border-radius: 4px;
        background-color: #333;
        color: #e0e0e0;
        box-sizing: border-box;
    }

    .button {
        display: block;
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: #e74c3c;
        color: white;
        font-size: 16px;
        cursor: pointer;
        margin-top: 10px;
    }

    .button:hover {
        background-color: #c0392b;
    }

    /* Result display styling */
    .result {
        white-space: pre-wrap;
        background-color: #333;
        border: 1px solid #444;
        padding: 10px;
        border-radius: 4px;
        color: #e0e0e0;
    }
    
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="header">
            <h1>Bobby Dashboard</h1>
            <div class="user-info">
                <i class="fas fa-user"></i> <!-- User icon -->
                <span><?php echo htmlspecialchars($_SESSION['username']); ?></span>
            </div>
        </div>
        <div class="sidebar">
            <ul>
                <li><a href="#scan">Nmap Scan</a></li>
                <li><a href="logout.php">LogOut</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="card">
                <h2>Nmap Scan</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <label for="target">Enter Target (e.g., 192.168.1.1):</label>
                    <input type="text" name="target" id="target" class="textarea" placeholder="Enter target IP or domain" required>
                    <input type="submit" value="Run Scan" class="button">
                </form>
                <?php
                if (isset($_POST['target'])) {
                    $target = escapeshellarg(trim($_POST['target']));
                    $command = "nmap -v -A $target";
                    
                    // Execute Nmap command
                    $output = shell_exec($command);
                    
                    // Display the output
                    echo "<div class='result'><h3>Scan Results:</h3><pre>" . htmlspecialchars($output) . "</pre></div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
