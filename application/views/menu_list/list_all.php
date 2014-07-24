


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
function openMe()	{
	console.log("hi there");
}
	$(document).ready(function(){
	console.log($(".mini"));
		$(".mini").click(function()	{	console.log($(".imageBtn"));});
	});
</script>