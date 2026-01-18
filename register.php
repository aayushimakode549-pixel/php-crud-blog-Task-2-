<?php
include 'config.php';
include 'header.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];

    // Prevent duplicate
    $check = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($check->num_rows > 0) {
        $message = "<div class='error'>Username already exists!</div>";
    } else {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            $message = "<div class='success'>Registration successful!</div>";
        } else {
            $message = "<div class='error'>Error occurred!</div>";
        }
    }
}
?>

<h2>Register</h2>

<?= $message ?>

<form method="POST">
    Username:<br>
    <input type="text" name="username" required><br><br>

    Password:<br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Register</button>
</form>

<br>
<a href="login.php">Already have an account? Login</a>

<?php include 'footer.php'; ?>