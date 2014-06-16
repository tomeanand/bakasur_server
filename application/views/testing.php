 <html>
 <head></head>
 <style type="text/css">
pre{margin: 3px; padding: 3px;}
pre input,select,textarea,button{margin: 3px; padding: 3px;}
 </style>
 <title></title>

<script src='http://code.jquery.com/jquery-1.10.2.min.js'></script>
<script src="<?php echo base_url();?>assets/js/devtools.js"></script>

 <body>
<h3>Dev tools</h3>
<hr>
 <div>
 	Add Menu Items
 	<?php echo form_open_multipart('home/addmenu'); ?>


<pre>
	<label>menu_name :</label>		<input type="text" id="menu_name" name="menu_name"/>
	<label>menuservefor :</label>		<input type="text" id="menu_servefor" name="menu_servefor"/>
	<label>menuprice :</label>		<input type="text" id="menu_price" name="menu_price"/>
	<label>menucategory :</label>		<select id="menu_category" name="menu_category">
	 									<option value="" selected>Select Category</option>
	 									<?php foreach ($category->result() as $cat){ ?>
	 									<option value="<?php echo $cat->category_id; ?>"><?php echo $cat->category_name; ?></option>
	 									<?php } ?>
										</select> <!-- Get all the category from db and populate it here in the combo -->
	<label>menucuisine :</label>		<select id="menu_cuisine" name="menu_cuisine">
	 									<option value="" selected>Select Cuisine</option>
	 									<?php foreach ($cuisine->result() as $cui){ ?>
	 									<option value="<?php echo $cui->cuisine_id; ?>"><?php echo $cui->cuisine_name; ?></option>
	 									<?php } ?>
										</select> <!-- Get all the category from db and populate it here in the combo -->									
	<label>menuSubcategory :</label>       <select id="menu_subcategory" name="menu_subcategory">
	 									<option value="" selected>Select Subcategory</option>
	 									<?php foreach ($subcategory->result() as $subcat){ ?>
	 									<option value="<?php echo $subcat->subcategory_id; ?>"><?php echo $subcat->subcategory_name; ?></option>
	 									<?php } ?>
										</select> <!-- Get all the Subcategory from db and populate it here in the combo -->
	<label>menu_image :</label>            <input type="file" id="menu_image" name="menu_image" value="" />
	<label>menu_description :</label>	<textarea id="menu_description" name="menu_description"></textarea>
	<label></label>			    <input type="submit" value="Add Menu Item" id="submitBtn"/> 
</pre>
	
 	<?php echo form_close(); ?>
 </div>

<hr>

<div>
	Test methods

<pre>
	<label>Call</label>			<select id="fname" name="function" style="width:168px">
						<option value="expampleCall" selected>Select Function</option>
						<?php foreach($func as $row){?>
						<option value="<?php echo $row; ?>"><?php echo $row; ?></option>
						<?php } ?>
</select>
	<label>Parameter 1</label>		<input type="text" size="20" id="param1" /> 	
	<label>Parameter 2</label>		<input type="text" size="20" id="param2" /> 	
	<label>Parameter 3</label>		<input type="text" size="20" id="param3" /> 	
	<label>Parameter 4</label>		<input type="text" size="20" id="param4" /> 	
	<label>Parameter 5</label>		<input type="text" size="20" id="param5" /> 	
	<label>Parameter 6</label>		<input type="text" size="20" id="param6" /> 	
	<label></label>			<button id="callButton">Invoke</button> 	
	<label></label>			<textarea id="serverResponseBox" ></textarea>	

</pre>
</div>



</body>
</html>