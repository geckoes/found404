<?php
require_once("core/version/tables.php");
require_once("core/db/database.php");

if ($_POST["posted"] == 1) {
  $servername = $_POST["servername"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $dbname = $_POST["database"];
  $prefix = $_POST["prefix"];


	$database = new Database($servername, $dbname, $username, $password, $prefix);
    $check_configdb_pass = false;

	// check se db creato con successo
	if ($database -> createDb($tables, &$error)) {

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
            
            $check_configdb_pass = true;

		} else {
			echo "Error locking file!";
		}

		fclose($file);
		echo "warning " . $found404->getWarning() . "\n";
	}
    if ($check_configdb_pass) {
    	
    }

}
?>
<script>

  /*
  * create a prefix of 3 letters followed by a _
  * it's used to create a
  */
  // no more used - last version 0.0
  function prefix() {
    var text = "";
    var possible = "abcdefghijklmnopqrstuvwxyz";
    for (var i = 0; i < 4; i++) {
      text += possible.charAt(Math.floor(Math.random() * possible.length));
    }
    text += "_";

    document.getElementById("prefix").value = test;
  }

  function testDb() {
    var servername = document.getElementById('servername');
    var valid_servername = servername.value.length > 0;
    var dbname = document.getElementById('database');
    var valid_dbname = dbname.value.length > 0;
    var username = document.getElementById('username');
    var valid_username = username.value.length > 0;
    var password = document.getElementById('password');
    var valid_password = password.value.length > 0;
    var prefix = document.getElementById('prefix');

    if (!valid_servername) {
      setErrorMessage(servername, 'Please enter a valid server name');
    } else if (!valid_dbname) {
      setErrorMessage(dbname, 'Please enter a valid database name');
    } else if (!valid_username) {
      setErrorMessage(username, 'Please enter a valid user name');
    } else if (!valid_password) {
      setErrorMessage(password, 'Please enter a valid password');			
    } else {
      params = "servername=" + servername.value + 
        "&dbname=" + dbname.value + 
        "&username=" + username.value + 
        "&pwd=" + password.value + 
        "&prefix=" + prefix.value;

      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
      	if (this.readyState == 4 && this.status == 200) {
        		document.getElementById('test_connection').innerHTML = this.responseText;
        		document.getElementById('create_db').removeAttribute("disabled");
        }
      };
      xhr.open("POST", "core/db/test_connection.php", true);
	  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send(params);
    }
  }

  function validateRequired(el) {
    if (isRequired(el)) {
      var valid = !isEmpty(el);

      if (!valid) {
        setErrorMessage(el, 'Field is required');
      }
      return valid;
    }
    return true;
  }
  function isRequired(el) {
    return ((typeof el.required === 'boolean') && el.required) ||
      (typeof el.required === 'string');
  }
  function isEmpty(el) {
    return !el.value || el.value === el.placehoder;
  }
  function setErrorMessage(el, message) {
    $(el).data('errorMessage', message);
  }
  function showErrorMessage(el) {
    var $el = $(el);
    var $errorContainer = $el.sibling('.error');

    if (!$errorContainer.legnth) {
      $errorContainer = $('<span class="error"></span>').insertAfter($el);
    }
    $errorContainer.text($(el).data('errorMessage'));
  }
</script>
<div>
  <div>
    <p id="test_connection"></p>
  </div>
  <div id="warning">
    <p id="warning" class="warning"><?php echo $found404->getWarning(); ?></p>
  </div>
  <form method="post">
    <label>Server</label>
    <input type="text" id="servername" name="servername" required="required">
    <label>User </label>
    <input type="text" id="username" name="username" required="required">
    <label>Password </label>
    <input type="password" id="password" name="password" required="required">
    <label>Database </label>
    <input type="text" id="database" name="database" required="required">
    <label>Prefix </label>
    <input type="text" id="prefix" name="prefix" value="fnd404_">
    <input type="hidden" name="posted" value="1">
    <input type="button" onclick="testDb()" value="Test connection">
    <input type="submit" id="create_db" value="create db" disabled="disabled">

  </form>
</div>
