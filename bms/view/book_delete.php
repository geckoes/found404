<?php 
	include_once "header.php";
	if($logged_in)
	{
		$after_login=true;
		include_once "menu.php";
?>

<?php
		if($status=="before_submission" or $status=="failure")
		{
?>
	<h3>Please fill up the following form to delete book</h3>
	<form method="post">
		<fieldset>
			<legend>Book Delete Form</legend>
			<label for="title">Do you really want to delete book <?php echo $book[0]["title"]; ?>?</label>
			<br>
			<select name="choice">
				<option value="yes">Yes</option>
				<option value="no" selected>No</option>
			</select>
			<br>
			<input type="hidden" name="page" value="book_delete">
			<input type="hidden" name="caller" value="self">
			<input type="hidden" name="id" value="<?php echo $book[0]["id"]; ?>">
			<input type="submit" value="Delete">
		</fieldset>
	</form>
<?php
		}
		else
		{
?>
		<h3>Book Deleted</h3>
<?php
		}
	}
	else
	{
		$before_login=true;
		include_once "menu.php";
?>
<h3>Invalid Login!!! Try Again.</h3>
<?php
	}
	include_once "footer.php";
?>
