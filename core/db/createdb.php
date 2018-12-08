<?php
if ($_POST["posted"] == 1) {
	require ("core/version/db1.0.php");

	$servername = $_POST["servername"];
	$username = $_POST["username"];
	$password = $_POST["pwd"];
	$dbname = $_POST["dbname"];
	$prefix = $_POST["prefix"];

	$database = new Database($servername, $dbname, $username, $password, $prefix);

	// check se db creato con successo
	if ($database -> createDb($tables)) {

		$file = fopen("config.php", "w+") or die("Unable to open file!");
		if (flock($file, LOCK_EX)) {
        	fwrite($file,"<?php\n");
			fwrite($file, "define(\"SERVERNAME\", \"$servername\");\n");
			fwrite($file, "define(\"DBNAME\", \"$dbname\");\n");
			fwrite($file, "define(\"USERNAME\", \"$username\");\n");
			fwrite($file, "define(\"PASSWORD\", \"$password\");\n");
			fwrite($file, "define(\"PREFIX\", \"$prefix\");\n");
			// release lock
			flock($file, LOCK_UN);
		} else {
			echo "Error locking file!";
		}

		fclose($file);

	}

}
