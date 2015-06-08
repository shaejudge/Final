<html>
    <head>
        <title>Final Project</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php include 'db_connect.php'; ?>
		<script src="jquery/jquery-1.11.3.min.js"></script>
		<script src="script.js"></script>
    </head>	
    <body>
        <h1>Welcome to Shae Judge's Social Budget Tracker!</h1>
        <div class="login" id="login">
            Login
            <br>
            <form action="login.php" method="POST" id="loginForm">
                <input type="text" class="userpass" placeholder="Username" name="username" id="username" required>
                <br>
                <input type="password" class="userpass" placeholder="Password" name="password" id="password" required>
                <br>
                <button id="submit">Submit</button>
                <br>
            </form>
			
				<a href="register.php">Don't have an account? Register here!</a>
				
				<!-- <a href="main.php">Main page test link</a> -->
				
			<br><br>
			Message Board:
			<table style="margin-left:auto; margin-right:auto; text-align:center; width:100%">
			<tr>
				<th>Date</th>
				<th>Username</th>
				<th>Icon</th>
				<th>Message</th>
			</tr>
			<?php
			$username = $_SESSION["sess_user"];
			$query = "SELECT date, username, message, icon FROM Finance_Data WHERE message != 'NULL' AND message != ''
					  ORDER BY date DESC";

			$result = $mysqli->query($query);

			while ($row = $result->fetch_array()) {
				echo "<tr>";
				echo "<td>" . $row["date"]. "</td>";
				echo "<td>" . $row["username"]. "</td>";
				echo "<td><img src='" . $row["icon"] . "'></td>";
				echo "<td>" . $row["message"]. "</td>";
				echo "<tr>";
			}
			
				?>
		</div>
	</body>
</html>