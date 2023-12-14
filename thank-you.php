<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thank You!</title>
    <link rel="icon" href="background-image.ico">
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		.container {
			width: 80%;
			margin: 0 auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
			text-align: center;
		}
		h1 {
			font-size: 36px;
			color: #333;
			margin-top: 0;
		}
		p {
			font-size: 24px;
			margin-top: 20px;
		}
		.success {
			color: #4CAF50;
		}
		.error {
			color: #f44336;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Thank You!</h1>
		<?php
			// Start session
session_start();

// Check if the form was submitted successfully
if (isset($_SESSION["success"]) && $_SESSION["success"] === true) {
  // Display success message
  echo "<p class='success'>Thank you for applying!</p>";
} else {
  // Clear session variables
  
  session_unset();
  session_destroy();

  // Redirect user to the form page with an error message
  header("Location: index.html?error=1");
  exit();
}

		?>
        <a href="index.html">Go to home page</a>
	</div>
</body>
</html>