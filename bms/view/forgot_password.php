<?php 
	include_once "header.php";
	$before_login=true;
	include_once "menu.php";
?>

<?php
	if($status=="before_submission" or $status=="failure")
	{
?>
	<h3>Please fill up the following form to retrieve password of your account</h3>
	<form method="post">
		<fieldset>
			<legend>Forgot Password Form</legend>
			<label for="username">Username</label>
			<input type="text" name="username" id="username" value="<?php echo $_REQUEST["username"]; ?>">
			<font color="red"><?php echo $errors["username"]; ?></font>
			<br>
			<input type="hidden" name="page" value="forgot_password">
			<input type="hidden" name="caller" value="self">
			<input type="submit" value="Retrieve Password">
		</fieldset>
	</form>
<?php
	}
	else
	{
?>
		<h3>Please check your mail for new password</h3>
<?php
	}
?>

<?php
	include_once "footer.php";
?>
