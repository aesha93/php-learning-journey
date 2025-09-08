<?php
// Step 1: Fake blog posts (normally from DB)

$posts = [
    1 => "PHP is awesome!",
    2 => "Learning GET and POST",
    3 => "Building real apps"
];

//step 2 : check which post ID  is requested via GET
$post_id = $_GET['post_id'] ?? 1;

// Step 3: Display the blog post
echo "<h2>Post #$post_id</h2>";
echo "<p>". $posts[$post_id] . "</p>";

// Step 4: Comment form
?>
<form method="POST" action="">
    <input type="text" name="name" placeholder="Your Name" required><br>
    <textarea name="comment" placeholder="Your Comment" required></textarea><br>
    <button type="submit">Submit Comment</button>
</form>
<?php
// Step 5: Handle POST (comment)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $comment = htmlspecialchars($_POST['comment']);
    echo "<h3>New Comment:</h3>";
    echo "<p><b>$name</b>: $comment</p>";
}

?>