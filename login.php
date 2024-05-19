<?php
session_start();

// Check if the welcome message session variable is set and if the username session variable is not set
if(isset($_SESSION['welcomeMessage']) && !isset($_SESSION['username'])) {
    // Display the welcome message if conditions are met
	echo $_SESSION['welcomeMessage'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>
<form method="post" action="handleForm.php">
    <div class="fields">
        <!-- Input field for username -->
        <p><input type="text" placeholder="Username" class="fields" name="username"></p>
        <!-- Input field for password -->
		<p><input type="password" placeholder="Password" class="fields" name="password"></p>
        <!-- Login submit form -->
		<p><input type="submit" value="Login" id="loginBtn" name="loginBtn"></p>
    </div>
</form>
<!-- Redirect to registration page -->
<p>Don't have an account? <a href="register.php">Register here</a></p>


</body>
</html>
