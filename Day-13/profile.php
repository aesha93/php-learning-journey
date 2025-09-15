<?php

session_start();
if (isset($_SESSION['profile_pic'])) {
    echo "<h2>Your Profile</h2>";
    echo "<img src='{$_SESSION['profile_pic']}' width='150'>";
} else {
    echo "No profile picture set.";
}
 ?>