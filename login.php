<?php
// Initialize the session
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'games');

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	header("location: ./homepage.php");
	exit;
}

// Include config file
require_once("data/DBConfig.php");

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Check if username is empty
	if (empty(trim($_POST["username"]))) {
		$username_err = "Please enter username.";
	} else {
		$username = trim($_POST["username"]);
	}

	// Check if password is empty
	if (empty(trim($_POST["password"]))) {
		$password_err = "Please enter your password.";
	} else {
		$password = trim($_POST["password"]);
	}

	// Validate credentials
	if (empty($username_err) && empty($password_err)) {
		// Prepare a select statement
		$sql = "SELECT userId, username, userPassword FROM siteuser WHERE username = ?";

		if ($stmt = $mysqli->prepare($sql)) {
			// Bind variables to the prepared statement as parameters
			$stmt->bind_param("s", $param_username);

			// Set parameters
			$param_username = $username;

			// Attempt to execute the prepared statement
			if ($stmt->execute()) {
				// Store result
				$stmt->store_result();

				// Check if username exists, if yes then verify password
				if ($stmt->num_rows == 1) {
					// Bind result variables
					$stmt->bind_result($id, $username, $database_password);
					if ($stmt->fetch()) {
						if ($password == $database_password) {
							// Password is correct, so start a new session
							session_start();

							// Store data in session variables
							$_SESSION["userId"] = $id;
							$_SESSION["username"] = $username;
							$_SESSION["loggedin"] = true;

							// Redirect user to welcome page
							header("location: ./homepage.php");
						} else {
							// Display an error message if password is not valid
							$password_err = "The password you entered was not valid.";
						}
					}
				} else {
					// Display an error message if username doesn't exist
					$username_err = "No account found with that username.";
				}
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}
		}

		// Close statement
		$stmt->close();
	}

	// Close connection
	$mysqli->close();
}

require_once("presentation/navigation.php");
include("presentation/loginpage.php");

$nav = new Nav();
