<?php
include 'config.php';
include 'header.php';
session_start();

$message = "";

date_default_timezone_set('Asia/Kolkata');
$date = date("d M Y");
$time = date("h:i A");
?>

<div class="date-box">
📅 Date: <?= $date ?> | ⏰ Time: <?= $time ?>
</div>
<br>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE username='$username'");

    if ($result->num_rows == 0) {
        $message = "<div class='error'>User not found!</div>";
    } else {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $message = "<div class='success'>Login successful!</div>";
            header("refresh:1;url=index.php");
        } else {
            $message = "<div class='error'>Incorrect password!</div>";
        }
    }
}
?>

<h2>Login</h2>

<?= $message ?>

<form method="POST">
    Username:<br>
    <input type="text" name="username" required><br><br>

    Password:<br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>

<br>
<a href="register.php">Create an account</a>

<?php include 'footer.php'; ?>


