<?php 

session_start();

$page_title = "Welcome";
include('includes/head.html');

$email_pattern = '/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/';

include('includes/login_functions.php');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = []; // Initialize an error array.

	require('../mysqli_connect.php'); // Connect to the db

	// Check for a first name:
	if (empty($_POST['fname'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['fname']));
	}

	// Check for a last name:
	if (empty($_POST['lname'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['lname']));
	}

	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else if (!preg_match($email_pattern, trim($_POST['email']))) {
		$errors[] = 'Email is not correctly formatted';
	} else {

		// check if email is already in use
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
		$q = "SELECT player_id FROM players WHERE email='$e'";
		$r = @mysqli_query($dbc, $q);
		if (mysqli_num_rows($r) != 0) {
			$errors[] = 'That email already exists.';
		}
	}

	// Check for a password and match against the confirmed password:
	if (!empty($_POST['pass'])) {
		if ($_POST['pass'] != $_POST['pass2']) {
			$errors[] = 'Your password did not match the confirmed password.';
		} else {
			$p = mysqli_real_escape_string($dbc, trim($_POST['pass'])) ;
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}

	if (empty($errors)) { // If everything's OK.

		// Register the user in the database...
		$a = md5(uniqid(rand(), true));

		// Make the query:
		$q = "INSERT INTO players (first_name, last_name, email, pass, active, registration_date) 
			  VALUES ('$fn', '$ln', '$e', SHA2('$p', 512), '$a', NOW() )";
		$r = @mysqli_query($dbc, $q); // Run the query.

		if ($r) { // If it ran OK.

			// Set up base of URL:
			$url = 'http://localhost/StarTrekAdventure/Landing/';

			// Send email to activate registration:
			$body = "Thank you for registering at Star Trek Adventure! To activate your account, please click on this link:\n\n";
			$body .= $url . 'activate.php?x=' . urlencode($e) . '&y=' . $a;
			mail('' . $e . '', 'Registration Confirmation', $body, 'From: ianmcbride@startrekrpg.com');

		} else { // If it did not run OK.

			redirect_user('../errordisplay.php');

			// Debugging message:
			echo '<p color="red">' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';

		} // End of if ($r) IF.

		mysqli_close($dbc); // Close the database connection.

		redirect_user('check-email.php');

	}

} // End of the main Submit conditional.

?>
    <body class="centered-body">
        <div class="heading-container">
            <h1>Your Journey Awaits...</h1>
        </div>
        <form action="register_page.php" method="post" id="registerForm" novalidate>
            <div class="first-name-container">
                <p>First Name: <input type="text" name="fname" size="20" maxlength="20"
				<?php if (isset($_POST['fname'])) echo ' value="' . $_POST['fname'] . '"'?>></p>
            </div>
            <div class="last-name-container">
                <p>Last Name: <input type="text" name="lname" size="20" maxlength="20"
				<?php if (isset($_POST['lname'])) echo ' value="' . $_POST['lname'] . '"'?>></p>
            </div>
            <div class="email-container-register">
                <p>Email Address: <input type="email" name="email" size="20" maxlength="60" 
                <?php if (isset($_POST['email'])) echo ' value="' . $_POST['email'] . '"'?>></p>
            </div>
            <div class="pass-container">
                <p>Password: <input type="password" name="pass" size="20" maxlength="20"></p>
            </div>
            <div class="pass2-container">
                <p>Confirm Password: <input type="password" name="pass2" size="20" maxlength="20"></p>
            </div>
            <div class="btn-container">
                <input type="submit" name="submit" value="Register">
            </div>
            <div>
                <?php 
				// If there are errors...
                if (!empty($errors)) {
					// Display each error
                    foreach($errors as $error) {
                        echo '<p class="error">' . $error . '</p>';
                    }
                }
                ?>
            </div>
			<a href="login_page.php" class="login-instead">Already a user?</a>
        </form>
    </body>
</html>

