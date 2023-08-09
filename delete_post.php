<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $postFile = isset($_POST['post_file']) ? $_POST['post_file'] : '';

    if ($postFile) {
        if (strpos($postFile, 'posts/') === 0 && file_exists($postFile)) {
            if (unlink($postFile)) {
                echo "<script> alert('deleted')</script>";
                header("location:index.php");
            } else {
                echo "Failed to delete the post.";
            }
        } else {
            echo "Invalid post file.";
        }
    } else {
        echo "Missing post file.";
    }
} else {
    echo "Invalid request method.";
}
?>
