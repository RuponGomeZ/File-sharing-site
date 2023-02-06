<html>
<head>
	<title>File Sharing Site</title>
</head>
<body>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="fileToUpload">
		<input type="submit" value="Upload File" name="submit">
	</form>

	<?php
		$servername = "localhost";
		$username = "username";
		$password = "password";
		$dbname = "database_name";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT name, location FROM files";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				$file_name = $row["name"];
				$file_location = $row["location"];
				echo "<a href='$file_location'>$file_name</a><br>";
			}
		} else {
			echo "0 results";
		}

		mysqli_close($conn);
	?>
</body>
</html>
