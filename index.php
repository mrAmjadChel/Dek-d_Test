<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ตั้งกระทู้ใหม่</title>
</head>
<body>
    <div class="container1">
    <h1>ตั้งกระทู้ใหม่</h1>
        <form action="create_post.php" method="post">
            <input type="text" id="title" name="title" minlength="4" maxlength="140" placeholder="หัวข้อกระทู้" required><br>
                <button id="boldBtn">Bold</button>
                <button id="italicBtn">Italic</button>
            <textarea id="content" name="content" rows="6" cols="50" minlength="6" maxlength="2000" placeholder="เนื้อหากระทู้" required></textarea><br>
            
            <input type="submit" value="ตั้งกระทู้">
        </form>
    </div>

    <div class="container2">
        <h2>กระทู้ใหม่</h2>
        <?php
        $posts = glob('posts/*.txt');
        foreach ($posts as $post) {
            $postContent = file_get_contents($post);
            $lines = explode("\n", $postContent);
            $title = isset($lines[0]) ? htmlspecialchars($lines[0], ENT_QUOTES, 'UTF-8') : '';
            $content = implode("\n", array_slice($lines, 1));


            echo "<div>";
            echo "<h3>" . $title . "</h3>";
            echo "<p>" . nl2br(htmlspecialchars($content, ENT_QUOTES, 'UTF-8')) . "</p>";
            echo '<form action="delete_post.php" method="post">';
            echo '<input type="hidden" name="post_file" value="' . $post . '">';
            echo '<button type="delete">Delete</button>';
            echo '</form>';
            echo "</div>";
        }
        ?>
    </div>

</body>
<script src="script.js"></script>
</html>
