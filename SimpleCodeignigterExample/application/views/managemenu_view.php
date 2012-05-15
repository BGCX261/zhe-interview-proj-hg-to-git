<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="utf-8">
	<title>Zhezhe Interview Project 1 - Manage Menu</title>
	<script language="Javascript" src="/js/prototype.js"></script>
	<script language="Javascript">
		function changeMenu(divName){
			$(divName+'_chgBtn').disabled='disabled';
			$(divName+'_delBtn').disabled='disabled';
			$(divName+'_namediv').style.display
				= $(divName+'_itemsdiv').style.display = 'none';
			$(divName+'_nameinput').type = 'input';
			$(divName+'_itemsinput').style.display = 'inline';
			$(divName+'_submitChange').style.display = 'block';
		}
		
		function deleteMenu(divName){
			$(divName+'_chgBtn').disabled='disabled';
			$(divName+'_delBtn').disabled='disabled';
			$(divName+'_confirmDelete').style.display = 'block';
		}
		
		function onSubmit(divName){
			new Ajax.Request('/SimpleCodeignigterExample/managemenu/update',{
				method: 'post',
				parameters: {
					'id': $(divName+'_id').value,
					'menu_name': $(divName+'_nameinput').value,
					'menu_item':$(divName+'_itemsinput').value.replace(/\n/g,"|")
				}, 
				onSuccess: function(transport) {
					if(transport.responseText == '1') {
						$(divName+'_namediv').innerText = $(divName+'_nameinput').value;
						$(divName+'_itemsdiv').innerHTML = $(divName+'_itemsinput').value.replace(/\n/g,"<br/>");
						
						$(divName+'_chgBtn').disabled='';
						$(divName+'_delBtn').disabled='';
						$(divName+'_namediv').style.display
							= $(divName+'_itemsdiv').style.display = 'inline-block';
						$(divName+'_nameinput').type = 'hidden';
						$(divName+'_itemsinput').style.display = 'none';
						$(divName+'_submitChange').style.display = 'none';
					} else {
						alert('Submit Fail!!');
					}
				}, 
				onFailure: function() {
					alert('Submit Fail!!');
				}
			});
		}
		
		function onCancel(divName){
			$(divName+'_nameinput').value = $(divName+'_namediv').innerText;
			$(divName+'_itemsinput').value = $(divName+'_itemsdiv').innerText;
		
			$(divName+'_chgBtn').disabled='';
			$(divName+'_delBtn').disabled='';
			$(divName+'_namediv').style.display
				= $(divName+'_itemsdiv').style.display = 'inline-block';
			$(divName+'_nameinput').type = 'hidden';
			$(divName+'_itemsinput').style.display = 'none';
			$(divName+'_submitChange').style.display = 'none';
		}
		
		function onConfirmDelete(divName){
			new Ajax.Request('/SimpleCodeignigterExample/managemenu/delete',{
				method: 'post',
				parameters: {
					'id': $(divName+'_id').value
				}, 
				onSuccess: function(transport) {
					if(transport.responseText == '1') {
						$(divName).parentNode.removeChild($(divName));
					} else {
						alert('Failed to delete entry!!');
					}
				}, 
				onFailure: function() {
					alert('Failed to delete entry!!');
				}
			});
		}
		
		function onCancelDelete(divName){
			$(divName+'_chgBtn').disabled='';
			$(divName+'_delBtn').disabled='';
			$(divName+'_confirmDelete').style.display = 'none';
		}
		
		function addMenu(divName){
			$(divName).style.display = 'block';
			$('addBtn').disabled='disabled';
		}
		
		function onAddSubmit(divName){
			
			new Ajax.Request('/SimpleCodeignigterExample/managemenu/insert',{
				method: 'post',
				parameters: {
					'menu_name': $(divName+'_nameinput').value,
					'menu_item': $(divName+'_itemsinput').value.replace(/\n/g,"|")
				}, 
				onSuccess: function(transport) {
					if(transport.responseText == '1') {
						$(divName).style.display = 'none';
						$('addBtn').disabled='';
						window.location.href=window.location.href;
					} else {
						alert('Failed to add menu!!');
					}
				}, 
				onFailure: function() {
					alert('Failed to add menu!!');
				}
			});
		}
		
		function onAddCancel(divName){
			$(divName).style.display = 'none';
			$('addBtn').disabled='';
		}
	</script>
	<style type="text/css"></style>
</head>
<body>
<h1>Project 1</h1>
<hr>
<div><strong>Menu name: <i>Menu Name</i></strong></div>
<div><i>item</i>[;<i>value</i>[;<i>Comment</i>]]</div>

<hr>

<?php 
	foreach ($entries as $entry) {
		$div_name = "div_" . $entry->id;
		$ary_entries = explode("|", $entry->menu_item);
?>
<div id='<?=$div_name;?>'><input id='<?=$div_name;?>_id' type='hidden' value='<?=$entry->id;?>'/><strong>Menu name: <div style="display:inline" id='<?=$div_name;?>_namediv'><?=$entry->menu_name;?></div><input id='<?=$div_name;?>_nameinput' type='hidden' value='<?=$entry->menu_name;?>'/>
</strong><br/>

<div id='<?=$div_name;?>_itemsdiv' style="display:inline-block;" ><?=implode("<br/>", $ary_entries);?>
</div><textarea style='display:none;' id='<?=$div_name;?>_itemsinput' rows=<?=count($ary_entries);?>>
<?=implode("\n", $ary_entries);?>
</textarea>
<div id='<?=$div_name;?>_submitChange' style="display:none;" >
<input type=button value='Submit Change' onClick='onSubmit("<?=$div_name;?>")' />
<input type=button value='Cancel' onClick='onCancel("<?=$div_name;?>")' /></div>
<div id='<?=$div_name;?>_confirmDelete' style="display:none;" >
Are you sure to delete? 
<input type=button value='Yes' onClick='onConfirmDelete("<?=$div_name;?>")'/>
<input type=button value='No' onClick='onCancelDelete("<?=$div_name;?>")'/></div>
<br>
<input id='<?=$div_name;?>_chgBtn' type=button value='Change' onClick='changeMenu("<?=$div_name;?>");'>
<input id='<?=$div_name;?>_delBtn' type=button value='Delete' onClick='deleteMenu("<?=$div_name;?>")'>
</div>

<?php
	}
?>
<br>
</div>

<div id='div_addMenu' style='display:none;'><strong>Menu name: 
</strong><input id='div_addMenu_nameinput' type='input' value=''/><br/>
<textarea id='div_addMenu_itemsinput' rows='10'></textarea><br/>
<input type=button value='Submit' onClick='onAddSubmit("div_addMenu")' />
<input type=button value='Cancel' onClick='onAddCancel("div_addMenu")' /></div>
</div>



<input id='addBtn'type=button value='Add Menu' onClick='addMenu("div_addMenu")'>

<!--p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p-->
<hr>
<a href="/SimpleCodeignigterExample">Back to Dropdown Menu</a>

</body>
</html>