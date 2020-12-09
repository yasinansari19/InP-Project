<?php

        $connect = mysqli_connect('localhost', 'root', '');
        $select = mysqli_select_db($connect,'miniproject');
	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		chckusername($username, $password);
	}
	function chckusername($username, $password){
		$connect = mysqli_connect('localhost', 'root', '');
                $select = mysqli_select_db($connect,'miniproject');
		$check = "SELECT * FROM login WHERE username='$username'";
		$check_q = mysqli_query($connect,$check) or die("<div class='loginmsg'>Error on checking Username<div>");
		if (mysqli_num_rows($check_q) >0) {
			chcklogin($username, $password);
		}
		else{
			echo "<div id='loginmsg'>Wrong username</div>";
		}
	}
	function chcklogin($username, $password){
		$connect = mysqli_connect('localhost', 'root', '');
                $select = mysqli_select_db($connect,'miniproject');
		$login = "SELECT * FROM login WHERE username='$username'  and password='$password'";
		$login_q = mysqli_query($connect,$login) or die('Error on checking Username and Password');
		if (mysqli_num_rows($login_q)>0){
			echo "<div id='loginmsg'> Logged in as $username </div>"; 
			header("location: order.php");
		}
		else {
			echo "<div id='loginmsg'>Wrong Password </div>"; 
		}
	}
?>
