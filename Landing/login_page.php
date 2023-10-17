<?php 

$page_title = "Welcome Back";
include('includes/head.html');

?>
    <body class="centered-body">
        <div class="heading-container">
            <h1>Welcome Back, Traveler</h1>
        </div>
        <form action="login_page.php" method="post" id="loginForm" novalidate>
            <div class="email-container">
                <p>Email Address: <input type="email" name="email" size="20" maxlength="60" 
                <?php if (isset($_POST['email'])) echo ' value="' . $_POST['email'] . '"'?>></p>
            </div>
            <div class="pass-container">
                <p>Password: <input type="password" name="pass" size="20" maxlength="20"></p>
            </div>
            <div class="btn-container">
                <input type="submit" name="submit" value="Login">
            </div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // For processing the login:
        require('includes/login_functions.php');

        // Need the database connection:
        require('../mysqli_connect.php');

        // Check the login:
        list($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);

        // If login is successful...
        if ($check) {

            // Set the session data:
            session_start();
            $_SESSION['player_id'] = $data['player_id'];
            $_SESSION['first_name'] = $data['first_name'];
            $_SESSION['last_name'] = $data['last_name'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['has-character'] = $data['hasCharacter'];

            // Store the HTTP_USER_AGENT:
            $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);

            // Redirect:
            redirect_user('../index.php');

        } else { // Login was not successful

        // Assign $data to $errors for error reporting in the login_page.inc.php file:
        $errors = $data;
        echo '<div class="error-box">';
        foreach ($data as $error) {
            echo '<br>';
            echo '<p class="error">' . $error . '</p>';
        }
        echo '</div>';

        }   

        // Close the database connection:
        mysqli_close($dbc);

    } // End of main submit conditional
    ?>
      
            <a href="register_page.php" class="register-instead">New user?</a>

        </form>
    </body>
</html>