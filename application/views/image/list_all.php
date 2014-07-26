
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
		$(".sidebar").hide();
		$(".navigation-bar").hide();
		$(".bs-footer").hide();
		
	});
</script>