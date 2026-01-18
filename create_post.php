<?php
session_start();
include 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Please login first!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $user_id = $_SESSION['user_id']; // <-- important

    $sql = "INSERT INTO posts (user_id, title, content) VALUES ($user_id, '$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?msg=Post Created Successfully");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>
<h2>Create New Post</h2>
<form method="post" action="">
    Title:<br>
    <input type="text" name="title" required><br><br>
    Content:<br>
    <textarea name="content" rows="5" cols="40" required></textarea><br><br>
    <input type="submit" value="Create Post">
</form>
<a href="index.php">Back to Home</a>
</body>
</html>