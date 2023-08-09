<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    $content = isset($_POST['content']) ? trim($_POST['content']) : '';

    $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');

    if (strlen($title) < 4 || strlen($title) > 140) {
        echo "Topic title must be 4-140 characters long.";
    } elseif (strlen($content) < 6 || strlen($content) > 2000) {
        echo "Post content must be 6-2000 characters long.";
    } else {
        if (!is_dir('posts')) {
            mkdir('posts');
        }

        $filename = 'posts/' . time() . '.txt';

        $fileContent = "Title: " . $title . "\nContent: " . $content . "\n\n";
        file_put_contents($filename, $fileContent);

        echo "<script> alert('Post created successfully')</script>";
        header("location:index.php");
    }
} else {
    echo "Invalid request method.";
}
?>
