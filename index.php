<?php
session_start();
include 'config.php';

// Check login
if (!isset($_SESSION['user_id'])) {
    echo "<h3>Please login to access the blog.</h3>";
    echo "<a href='login.php'>Login Here</a>";
    exit;
}

// Show success messages
$message = "";
if (isset($_GET['msg'])) {
    $message = $_GET['msg'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog Posts</title>
</head>
<body>

<h2>Welcome to Your Blog</h2>

<!-- Display message -->
<?php if ($message != ""): ?>
    <p style="color:green;"><?php echo $message; ?></p>
<?php endif; ?>

<!-- Create New Post -->
<a href="create_post.php">Create New Post</a> |
<a href="logout.php">Logout</a>

<hr>

<h3>All Posts</h3>

<?php
// Fetch all posts
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($post = $result->fetch_assoc()) {
        ?>

        <div style="border:1px solid black; padding:10px; margin:10px 0;">
            <h3><?php echo $post['title']; ?></h3>
            <p><?php echo nl2br($post['content']); ?></p>
            <small>Posted on: <?php echo $post['created_at']; ?></small>
            <br><br>

            <!-- Edit & Delete Buttons -->
            <a href="edit_post.php?id=<?php echo $post['id']; ?>">Edit</a> |
            <a href="delete_post.php?id=<?php echo $post['id']; ?>" 
               onclick="return confirm('Are you sure you want to delete this post?');">
               Delete
            </a>
        </div>

        <?php
    }
} else {
    echo "<p>No posts found.</p>";
}
?>

</body>
</html>
