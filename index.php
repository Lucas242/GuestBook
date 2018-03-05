<?php
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<?php

include("inc/functions.php");
$connect = connectToDB();

$query = mysqli_query($connect, "SELECT * FROM `guestbook` ORDER BY `id` DESC");
$numrows = mysqli_num_rows($query);
$captcha = "";

?>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Guestbook">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Guestbook</title>
</head>
<body>
	<form action="index.php" method="post">
	<header id="main-header">
			<input type="reset" name="Reset" value="Reset">
			<p>My Name is Lucas Langeslag and this is a Guestbook for people that want to leave their informans &copy;ROC TER AA</p>
	</header>

	<div id="logo">
		<img src="img/guestbook.png" id="logo" width="500" height="150" >
	</div>
<div>
	<ul id="messageContainer"></ul>
		<li>
			<label>First Name</label>
			<input id="input-first_name" type="text" name="first-name" required>
		</li>
		<li>
			<label>Insertion</label>
			<input id="input-insertion" type="text" name="insertion">
		</li>
		<li>
			<label>Last Name</label>
			<input id="input-last_name" type="text" name="last-name">
		</li>
		<li>
			<label>E-mail Address</label>
			<input id="input-email" type="email" name="email" required>
		</li>
		<li>
		<label>Message</label>
			<textarea id="input-message" name="comment" value="Insert Your Message" required></textarea>
		</li>
		<li>
			<img src="img/input-black.gif" alt="" height="75" width="250">
		</li>
		<li>
			<input id="input-captcha" type="text" name="captcha" value="" required>
		</li>
		<input type="submit" name="post" href="Guestbook" >
		<input type="reset" name="post" value="reset">

</div>

<footer>
	<div id="footer-text">
		<p>&copy;Guestbook Lucas Langeslag ROC TER AA</p>
	</div>
</footer>

<?php
if (isset($_POST['captcha'])) {
	$captcha = $_POST['captcha'];
}

if ($captcha == "W68HP") {
	if ($_POST['post']) {
		echo "Thank you for your post!";
		$firstName = $_POST['first-name'];
		$insertion = $_POST['insertion'];
		$lastName = $_POST['last-name'];
		$email = $_POST['email'];
		$message = $_POST['comment'];
		$address = $_SERVER['REMOTE_ADDR'];

		mysqli_query($connect, "INSERT INTO `guestbook` (`first_name`, `insertion`, `last_name`, `email`, `address`, `comment`) VALUES ('$firstName', '$insertion', '$lastName', '$email', '$address', '$message');");
	}
}
else {
	echo "Fill in your Captcha (Correct)!";
}

	if ($numrows > 0) {
		while ($row = mysqli_fetch_assoc($query)) {
			$id = $row['id'];
			$firstname = $row['first_name'];
			$insertion = $row['insertion'];
			$lastname = $row['last_name'];
			$email = $row['email'];
			$message = $row['comment'];
			$time = $row['date'];
			$address = $row['address'];

			echo "<div>
			<hr />
				By <b>$firstname</b> - at <b>$time</b>
				<br/>
				$message
			<hr />
			</div>";
		}
	} else {
		echo "No post were found";
	}

?>
	</form>
</body>
</html>
