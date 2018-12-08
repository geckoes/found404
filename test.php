<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="generator" content="AlterVista - Editor HTML"/>
  <title></title>
</head>
<body>
<?php
$myArray = array('first' => 1, 'second' => 2, 'fname' => 'Filippo', 'initial'=>'F',
'lname'=> 'Taiuti', 'phone'=>'555-12345');
var_dump($myArray);
echo "<br />";
array_splice($myArray, 5);
unset($myArray['initial']);
var_dump($myArray);
?>
  <p>&nbsp;</p>

</body>
</html>
