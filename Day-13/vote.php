<?php
session_start();

if(!isset($_SESSION['votes'])){
    $_SESSION['votes'] = ['PHP' => 0, 'Python' => 0, 'JavaScript' => 0];
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $choice = $_POST['lang'] ?? null;
    if($choice && isset($_SESSION['votes'][$choice])){
        $_SESSION['votes'][$choice]++;
        echo "✅ Thank you for voting!<br><br>";
    }
}

?>
<!DOCTYPE html>
<html>
<head><title>Voting</title></head>
<body>
<form method="post">
    <p>Which language do you prefer?</p>
    <input type="radio" name="lang" value="PHP"> PHP<br>
    <input type="radio" name="lang" value="Python"> Python<br>
    <input type="radio" name="lang" value="JavaScript"> JavaScript<br><br>
    <input type="submit" value="Vote">
</form>

<h3>Voting Results:</h3>
<?php
foreach ($_SESSION['votes'] as $lang => $count) {
    echo "$lang: $count votes<br>";
}
?>
</body>
</html>
