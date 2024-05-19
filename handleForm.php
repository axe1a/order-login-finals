<?php 
session_start();
require_once('dbconfig.php');
require_once('functions.php');

// registration form handling
if (isset($_POST['regBtn'])) {
    // retrieve
	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // check if empty
	if(empty($username) || empty($password)) {
        // alert
		echo '<script> 
		alert("The input field is empty!");
		window.location.href = "register.php";
		</script>';
	}
	
	else {
        
        // add user to database
		if(addUser($conn, $username, $password)) {
            // login once registered successfully
			header('Location: login.php');
		}

		else {
            // redirect back if failed
			header('Location: register.php');
		}

	}
}

// login form handling
if (isset($_POST['loginBtn'])) {
    // retrieve
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)) {
        // alert 
        echo "<script>
        alert('Input fields are empty!');
        window.location.href='login.php'
        </script>";
    } else {
        // login user
        if(login($conn, $username, $password)) {
            // redirect to orderMenu
            header('Location: orderMenu.php');
        } else {
            // alert
            echo "<script>
            alert('Incorrect username or password!');
            window.location.href='login.php'
            </script>";
        }
    }    
}
