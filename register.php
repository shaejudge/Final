<html>
    <head>
        <title>Final Project</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php include 'db_connect.php'; ?>
		<script src="jquery/jquery-1.11.2.min.js"></script>
		<script src="script.js"></script>
    </head>	
    <body>
        <h1>Register a new account!</h1>
        <div class="login" id="register">
            Sign-up
            <br>
            <form action="" method="POST" name="regForm" onsubmit="return checkRegLength()">
                <input type="text" class="userpass" placeholder="Username" name="username" id="username" required>
                <br>
                <input type="password" class="userpass" placeholder="Password" name="password" id="password" required>
                <br>
                <!--<input type="password" class="userpass" placeholder="Re-enter Password" name="repassword">
                <br>-->
                <button type="submit" class="usercheck" id="submit" name="submit" >Submit</button>
                <br>
            </form>
			
			
            <a href="index.php">Login here!</a>
        </div>

    </body>
</html>
<?php
				if(isset($_POST['submit'])){
				$username = $_POST["username"];
				$password = $_POST["password"];
				
				
				$sql = "INSERT INTO Finance_Users(username, password) VALUES (?, ?)";
				$stmt = $mysqli->prepare($sql);
				$stmt->bind_param("ss", $_POST["username"], $_POST["password"]);
				
				$stmt->execute();
				
				$stmt->close();
				$mysqli->close();
				
				
				}
		/*
			error_reporting(E_ALL);
			print "<pre>";
			var_dump($_POST);
			var_dump($sql);
		
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}else{
			echo "Connection Worked!<br>";
		}
		*/
		?>
		