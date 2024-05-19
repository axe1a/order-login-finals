<?php  
// Add a user to the database
function addUser($conn, $username, $password) {
	$sql = "SELECT * FROM users WHERE username=?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$username]);

	// If username does not exist, insert the new user into the database
	if($stmt->rowCount()==0) {
		$sql = "INSERT INTO users (username,password) VALUES (?,?)";
		$stmt = $conn->prepare($sql);
		return $stmt->execute([$username, $password]);
	}
}

// Handles user login
function login($conn, $username, $password) {
	// Query to retrieve user information based on the provided username
	$query = "SELECT * FROM users WHERE username=?";
	$stmt = $conn->prepare($query);
	$stmt->execute([$username]);

	// Check if there is exactly one user with the provided username
	if($stmt->rowCount() == 1) {
		// returns associative array
		$row = $stmt->fetch();

		// store user info as a session variable
		$_SESSION['userInfo'] = $row;

		// get values from the session variable
		$uid = $row['user_id'];
		$uname = $row['username'];
		$passHash = $row['password'];

		// validate password 
		if(password_verify($password, $passHash)) {
			$_SESSION['user_id'] = $uid;
			$_SESSION['username'] = $uname;
			return true; // success
		}
		else {
			return false; // invalid
		}
	}
}