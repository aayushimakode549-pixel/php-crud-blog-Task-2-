<?php
include 'config.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Please login first!");
}

// Check if post ID is given
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid post ID!");
}

$post_id = intval($_GET['id']); // make sure ID is a number

// Delete query
$sql = "DELETE FROM posts WHERE id = $post_id";

if ($conn->query($sql) === TRUE) {
    // Redirect back to index after deleting
    header("Location: index.php?msg=Post Deleted Successfully");
    exit;
} else {
    echo "Error deleting post: " . $conn->error;
}
?>