<?php 
session_start();

//echo '<pre>' . print_r(get_defined_vars(), true) . '</pre>';
?>

<html>
    <head>
        <title>Final Project</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php include 'db_connect.php'; ?>
		<script src="jquery/jquery-1.11.3.min.js"></script>
		<script src="script.js"></script>
    </head>	
    <body>
        <div class="login" id="login">
            All of your purchases!
            <br>
            <a href="main.php">Add another item?</a>
			<br>
			
			<table style="margin-left:auto; margin-right:auto; text-align:center; width:70%">
			<tr>
				<th>Date</th>
				<th>Category</th>
				<th>Item</th>
				<th>Price</th>
			</tr>
			<?php
			$username = $_SESSION["sess_user"];
			$query = "SELECT date, category, item, price FROM Finance_Data WHERE username = '$username'
					  ORDER BY date DESC";

			$result = $mysqli->query($query);

			while ($row = $result->fetch_array()) {
				echo "<tr>";
				echo "<td>" . $row["date"]. "</td>";
				echo "<td>" . $row["category"]. "</td>";
				echo "<td>" . $row["item"]. "</td>";
				echo "<td>$" . $row["price"]. "</td>";
				echo "<tr>";
			}
			
			
			?>
			</table>
		</div>
	</body>
</html>