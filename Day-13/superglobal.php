<?php
// $product = ['id' => 101, 'name' => 'T-shirt', 'price' => 499];
// $productId = $_GET['product_id'] ?? null;
// if($productId == $product['id']) {
//     echo "Product Name: " . $product['name'];
// }

// echo "<pre>"; print_r($productId);die();

// $order = ['product_id' => 101, 'quantity' => 2];

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $quantity = $_POST['quantity'] ?? 1; // Default to 1 if not set
//     echo "Order Quantity: " . htmlspecialchars($quantity);
// }

//https://app.magento248.test/php-learning-journey/Day-13/superglobal.php?name=Aesha&age=32
// echo $_GET["name"]; // Aesha
// echo $_GET["age"];  // 32

// https://app.magento248.test/php-learning-journey/Day-13/superglobal.php?x=10&y=30

// $x = filter_input(INPUT_GET, "x", FILTER_VALIDATE_INT);
// $y = filter_input(INPUT_GET, "y", FILTER_VALIDATE_INT);
// echo $x . "---------". $y;

// if(isset($_GET['name'])){
//     $name = htmlspecialchars($_GET['name']);
//     echo "Hello, ". $name . "!";
// }else{
//     echo "Please Provide your name in the URL.";
// }

// if (isset($_GET['x']) && isset($_GET['y'])) {
//     $x = (int) $_GET['x'];
//     $y = (int) $_GET['y'];

//     echo "Sum = " . ($x + $y) . "<br>";
//     echo "Difference = " . ($x - $y) . "<br>";
//     echo "Product = " . ($x * $y);
// } else {
//     echo "Please provide x and y values in the URL.";
// }

// if (isset($_GET['q'])) {
//     $query = htmlspecialchars($_GET['q']); 
//     echo "You searched for: " . $query;
// } else {
//     echo '<form method="get">
//             Search: <input type="text" name="q">
//             <input type="submit" value="Go">
//           </form>';
// }

// if (isset($_GET['num'])) {
//     $num = (int) $_GET['num'];

//     if ($num % 2 == 0) {
//         echo $num . " is even";
//     } else {
//         echo $num . " is odd";
//     }
// } else {
//     echo "Please provide a number in the URL.";
// }

// $answers = [
//     "capital_of_india" => "Delhi",
//     "capital_of_gujarat" => "Gandhinagar"
// ];

// if (isset($_GET['question']) && isset($_GET['answer'])) {
//     $question = $_GET['question'];
//     $userAnswer = ucfirst(strtolower(trim($_GET['answer'])));

//     if (array_key_exists($question, $answers)) {
//         if ($answers[$question] === $userAnswer) {
//             echo "Correct! The " . str_replace("_", " ", $question) . " is " . $answers[$question] . ".";
//         } else {
//             echo "Wrong! The correct answer is " . $answers[$question] . ".";
//         }
//     } else {
//         echo "Unknown question.";
//     }
// } else {
//     echo "Please provide question and answer in the URL.";
// }

// $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

// echo "You are on page " . $page;
// if (isset($_POST['name'])) {
//     $name = htmlspecialchars($_POST['name']); 
//     echo "Welcome, " . $name;
// } else {
//     echo "Please enter your name!";
// }

// if (isset($_POST['name'])) {
//     $name = htmlspecialchars($_POST['name']); 
//     echo "Welcome, " . $name;
// } else {
//     echo "Please enter your name!";
// }


?>
<!-- <form method="post">
    Quantity: <input type="number" name="quantity">
    <button type="submit">Order</button>
</form> -->
<!-- <!DOCTYPE html>
<html>
<head><title>POST Example</title></head>
<body>
    <form method="post" action="welcome.php">
        Name: <input type="text" name="name"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html> -->

<!-- <!DOCTYPE html>
<html>
<head><title>POST Example</title></head>
<body>
    <form method="post" action="welcome.php">
        Name: <input type="text" name="name"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html> -->

<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<form method="post">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <input type="submit" value="Login">
</form>