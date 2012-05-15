<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="utf-8">
	<title>Zhezhe Interview Project 1</title>

	<style type="text/css"></style>
	<script language="javascript">
		function toggleSelectBox(selectbox){ 
			if(selectbox.size>1){
				selectbox.size=1;
				selectbox.style.position='static';
			}else{ //Expand SelectBox
				selectbox.size = selectbox.options.length;
				selectbox.style.position='absolute';
				selectbox.style.height='auto';
			}
		}
	</script>
</head>
<body>
<h1>Project 1</h1>
<?php 
	foreach ($entries as $entry) {
		# echo $entry->id;
		$select_body = "<p>" . $entry->menu_name . "<select onmouseout='toggleSelectBox(this)' onmouseover='toggleSelectBox(this)'>";
		
			foreach (explode("|", $entry->menu_item) as $cont) {
				$ary_keypair = explode(";", $cont);
				if(count($ary_keypair)>1) {
					list($msg, $value) = $ary_keypair;
				} else {
					$msg = $value = $ary_keypair[0];
				}
				if($value == '') {$value = $msg;}
				$select_body .= "<option value='" . $value . "'>";
				$select_body .= $msg;
				$select_body .= "</option>";
			}
		
		$select_body .= "</select></p>";
		echo $select_body;
	}
?>

<!--p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p-->
<hr>
<a href="/SimpleCodeignigterExample/managemenu">Manage Menus</a>

</body>
</html>