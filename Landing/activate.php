<?php 
// This page is for activating a newly registered user

$page_title = "Registered";
include('includes/head.html');

// if x and y don't exist, redirect user
if (isset($_GET['x'], $_GET['y'])
	&& filter_var($_GET['x'], FILTER_VALIDATE_EMAIL)
	&& (strlen($_GET['y']) == 32 ) ) {

	// update the database
	require_once('../mysqli_connect.php'); 
	$q = "UPDATE players SET active=NULL WHERE 
		(email='" . mysqli_real_escape_string($dbc, $_GET['x']) . "' AND 
		active='" . mysqli_real_escape_string($dbc, $_GET['y']) . "') 
		LIMIT 1";
	$r = mysqli_query($dbc, $q) or die("Query: $q\n<br>MySQL Error: " . mysqli_error($dbc));

	if ($r) {
		echo '<body class="centered-body">
				<div class="heading-container">
					<h1>You have been registered and may now log in.</h1>
				</div>';
		echo '<a href="login_page.php" class="a-button back-to-login">Log In</a>';
	} else {
		echo '<h1>There has been an error in confirming your email. Contact me at ianmcbride777@gmail.com for assistance.</h1></div>';
	}
	
	mysqli_close($dbc);
	
}  else { // redirect
	$url = 'http://localhost/StarTrekAdventure/Landing/landing.php';  
	header("Location: $url");
	exit();
}  // end of main if 

?>
    </body>
</html>
