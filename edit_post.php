<?php
session_start();
include 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Please login first!");
}

// Check if post ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Post ID missing!");
}

$post_id = intval($_GET['id']); // convert to number

// Fetch existing post data
$sql = "SELECT * FROM posts WHERE id = $post_id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Post not found!");
}

$post = $result->fetch_assoc();

// If form submitted → update post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);

    $update = "UPDATE posts SET title='$title', content='$content' WHERE id=$post_id";

    if ($conn->query($update) === TRUE) {
        header("Location: index.php?msg=Post Updated Successfully");
        exit;
    } else {
        echo "Error updating post: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>
    <h2>Edit Post</h2>

    <form method="POST">
        Title: <br>
        <input type="text" name="title" value="<?php echo $post['title']; ?>" required><br><br>

        Content: <br>
        <textarea name="content" rows="5" cols="40" required><?php echo $post['content']; ?></textarea><br><br>

        <input type="submit" value="Update Post">
    </form>

    <br>
    <a href="index.php">Back to Home</a>
</body>
</html>