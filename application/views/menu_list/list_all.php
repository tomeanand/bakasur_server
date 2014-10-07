


<?php 
foreach($gcrud->css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($gcrud->js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>


    <div>
		<?php echo $gcrud->output; ?>
    </div>



<script>

	$(document).ready(function(){
		var dialog = $('#dialog');
		dialog.dialog({ height:400,width:600,autoOpen: false});
		$('.mini').live('click',function(){
			var url_to_load = ($(this).attr('alt'));
			$('#divInDialog').load(url_to_load, function() {
				//console.log($(this).children().find(".sidebar"));
				$(this).children().find(".sidebar").hide();
				$(this).children().find(".navigation-bar-content").hide();
				$(this).children().find("footer").hide();
			})
			dialog.dialog("open");
		});
	});

</script>




<div id="dialog" title="Upload Menu images"><div id='divInDialog' style='width:600px; height:400px;'></div></div>