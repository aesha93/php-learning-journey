<?php
// if(isset($_POST['username']) && !empty($_POST['username'])){
//     $username = $_POST['username'];
//     echo "Username: " . htmlspecialchars($username);
// } else {
//     echo "Username is required!";
// }

// Validate Numbers

// $age = $_POST['age'] ?? '';
// if (filter_var($age, FILTER_VALIDATE_INT)) {
//     echo "Valid age: $age";
// } else {
//     echo "Invalid age!";
// }

// Validate Email

// $email = $_POST['email'] ?? '';

// if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     echo "Valid email: $email";
// } else {
//     echo "Invalid email format!";
// }

// Validate URL

// $url = $_POST['website'] ?? '';

// if (filter_var($url, FILTER_VALIDATE_URL)) {
//     echo "Valid website: $url";
// } else {
//     echo "Invalid URL!";
// }

// Validate String Length

// $name = trim($_POST['name'] ?? '');

// if (strlen($name) >= 3 && strlen($name) <= 50) {
//     echo "Valid name: $name";
// } else {
//     echo "Name must be between 3 and 50 characters!";
// }

// Regular Expressions (Regex)

// $username = $_POST['username'] ?? '';

// if (preg_match("/^[a-zA-Z]+$/", $username)) {
//     echo "Valid username: $username";
// } else {
//     echo "Username can only contain letters!";
// }

// Common PHP Sanitization Functions
// htmlspecialchars()

// $name = "<b>Aesha</b>";
// echo htmlspecialchars($name); 

// strip_tags()
// $name = "<h1>Hello</h1> World!";
// echo strip_tags($name); 
// Output: Hello World!


// filter_var() with FILTER_SANITIZE_*

// $email = "aesha@@example.com";
// $cleanEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
// echo $cleanEmail;  
// Output: aesha@@example.com  (invalid but cleaned)


// URL Sanitization

// $url = "https://exa mple.com/test?";
// $cleanUrl = filter_var($url, FILTER_SANITIZE_URL);
// echo $cleanUrl;
// Output: https://example.com/test

// String Sanitization

// $text = "<script>alert('hi')</script> Hello!";
// $cleanText = filter_var($text, FILTER_SANITIZE_STRING);
// echo $cleanText;
// Output:  alert('hi') Hello!


// Number Sanitization

// $number = "100abc200";
// $cleanNumber = filter_var($number, FILTER_SANITIZE_NUMBER_INT);
// echo $cleanNumber;
// Output: 100200

// addslashes()

// $name = "O'Reilly";
// echo addslashes($name);
// Output: O\'Reilly

// mysqli_real_escape_string()

// if (isset($_POST['email'])) {
//     $email = $_POST['email'];

//     // Step 1: Sanitize
//     $email = filter_var($email, FILTER_SANITIZE_EMAIL);

//     // Step 2: Validate
//     if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         echo "Safe & Valid Email: $email";
//     } else {
//         echo "Invalid Email!";
//     }
// }

// Generate a CSRF Token

// Start session

?>
<form method="post" action="submit.php">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    Name: <input type="text" name="name"><br>
    <input type="submit" value="Submit">
</form>