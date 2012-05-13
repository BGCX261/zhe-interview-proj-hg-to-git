<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="utf-8">
	<title>Zhezhe Interview Project 1 - Manage Menu</title>

	<style type="text/css"></style>
</head>
<body>
<h1>Project 1</h1>
<?php 
	$select_body = "<table border=1>";
	foreach ($entries as $entrie) {
		# echo $entrie->id;
		$select_body .= "<tr><td>" . $entrie->items . "</td><td>";
			foreach (explode("|", $entrie->content) as $cont) {
				$select_body .= $cont . "<br/>";
				#list($msg, $value) = explode(";", $cont);
				#$select_body .= "<option value='" . $value . "'>";
				#$select_body .= $msg;
				#$select_body .= "</option>";
			}
		$select_body .= "</td><td>";
		$select_body .= "<input type=button value='Change'>";
		$select_body .= "<input type=button value='Delete'>";
		$select_body .= "</td></tr>";
	}
	$select_body .= "<tr><td colspan=3>";
	$select_body .= "<input type=button value='Add'>";
	$select_body .= "</td></tr>";
	$select_body .= "</table>";
	echo $select_body;
?>

<!--p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p-->

<a href="/SimpleCodeignigterExample">Back to Dropdown Menu</a>

</body>
</html>