<?php
	function connectToDB() {
		$host	= "localhost"; // naam / locatie database server
		$user	= "root"; // gebruikersnaam om in te loggen op de database server
		$pass	= ""; // wachtwoord usbw voor usb webserver
		$dB		= "guestbook"; // naam van de database

		$connect = mysqli_connect($host,$user, $pass, $dB);

		return $connect;
	}
?>
