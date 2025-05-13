<?php
session_start();

// Store all submitted POST values into the session
foreach ($_POST as $key => $value) {
    $_SESSION[$key] = $value;
}

// Get next page from hidden input (fallback if not set)
$nextPage = isset($_POST['nextPage']) ? $_POST['nextPage'] : 'information.html';

header("Location: $nextPage");
exit();
?>
