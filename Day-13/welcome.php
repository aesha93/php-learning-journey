<?php

if (isset($_POST['name'])) {
    $name = htmlspecialchars($_POST['name']); 
    echo "Welcome, " . $name;
} else {
    echo "Please enter your name!";
}
