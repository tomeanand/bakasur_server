


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
				$(".sidebar").hide();
				$(".navigation-bar").hide();
				$(".bs-footer").hide();
			})
			dialog.dialog("open");
		});
	});

</script>




<div id="dialog" title="Upload Menu images"><div id='divInDialog' style='width:600px; height:400px;'></div></div>