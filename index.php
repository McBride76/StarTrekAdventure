<?php 
session_start(); 
include('Landing/includes/login_functions.php');

if (!isset($_SESSION['player_id'])) {
    redirect_user('landing.php');
} else if ($_SESSION['has-character'] == 0) {
    redirect_user('character-creation-pages/race-selection.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landing-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@600;700&amp;display=swap" rel="stylesheet">
    <title>Welcome</title>
</head>
<body>
    <div class="heading-container" style="max-width: 75%;">
        <h1>
            <?php 
            if (isset($_SESSION['first_name'])) {
                echo '<p style="text-align: center;">Welcome ' . $_SESSION['first_name'] . ', this page is currently under development. Please check back soon.</p>';
            } else {
                redirect_user('Landing/landing.php');
            }
            ?>
        </h1>
    </div>
</body>
</html>