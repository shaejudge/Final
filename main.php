<?php 
session_start();
?>

<html>
    <head>
        <title>Final Project</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php include("db_connect.php"); ?>
		<script src="jquery/jquery-1.11.3.min.js"></script>
		<script src="script.js"></script>
    </head>
    
    <body>
		<div class="main">
			<?php echo "Hello " . $_SESSION["sess_user"] . "!"; ?>
			<br>
			<form method="POST" id="itemSubmit" name="itemSubmit" action="" onsubmit="return checkAddLength()">
				Enter Date:
				<br>
				
				
				<input class="userpass" type="date" placeholder="mm/dd/yyyy" id="date" name="date" size="10" 
				<?php 
				if(isset($_POST['submit'])){
					echo "value = '" . $_POST["date"] . "'"; 
				}
				?>
				required>
				
				<br><br>
				
				<input class="userpass" type="text" placeholder="Enter Item" id="item" name="item" required>
				<!-- <select class="userpass">
					<option value="0">Select Category</option>
				</select> -->
				<input class="userpass" type="text" placeholder="Category" id="category" name="category" 
				<?php 
				if(isset($_POST['submit'])){
					echo "value = '" . $_POST["category"] . "'"; 
				}
				?>
				required>
				<input class="userpass" type="number" placeholder="$0.00" id="price" name="price" style="width:80px" step="any" min="0">
				<br>
				<input class="userpass" type="text" placeholder="(optional) Public Message to Login Page" id="message" name="message" style="width:300px">
				<input class="userpass" type="url" placeholder="(optional) Image URL for Message Icon" id="icon" name="icon" style="width:250px"">
				
				<!-- <button class="userpass" type="button">&nbsp;&nbsp;+Item&nbsp;&nbsp;</button> -->
				
				<br>
				<button name="submit" class="userpass" type="submit">&nbsp;&nbsp; SUBMIT &nbsp;&nbsp;</button>
				<br>
				<a href="addItem.php">View all purchases?</a>
				<br>
				<a href="index.php" style="text-align:right">Log out?</a>
				<br><br>
			</form>
		</div>
		
		<?php
			
			//echo $_SESSION['$username'];
			//echo '<pre>' . print_r(get_defined_vars(), true) . '</pre>';
			//die();
			
			$sess_user = $_SESSION["sess_user"];
			
			if(isset($_POST['submit'])){
				
				$sql = "INSERT INTO Finance_Data(username, item, category, price, date, message, icon) VALUES (?, ?, ?, ?, ?, ?, ?)";
				$stmt = $mysqli->prepare($sql);
				$stmt->bind_param("sssisss", $_SESSION["sess_user"], $_POST["item"], $_POST["category"], $_POST["price"], $_POST["date"], $_POST["message"], $_POST["icon"]);
				
				$stmt->execute();
				
				$stmt->close();
				$mysqli->close();
				}
		
			//error_reporting(E_ALL);
			//print "<pre>";
			//var_dump($_POST);
			//var_dump($sql);
		
		/*
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}else{
			echo "Connection Worked!<br>";
		}
		*/
		
		?>
		
	</body>
</html>
