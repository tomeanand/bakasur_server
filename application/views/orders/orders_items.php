<div class="listview">
<?php foreach ($ordered_item as $key => $value): ?>
	<?php $img = explode(",",$value->menu_image); ?>

    <a href="#" class="list">
        <div class="list-content">
            <img src="<?php print  base_url().'assets/uploads/'.$img[0] ?>" class="icon">
            <div class="data">
                <span class="list-title"><?php print $value->menu_name ?></span>
                <div class="rating small no-margin" data-role="rating"
                        data-stars="5"></div>
                <span class="place-right fg-red smaller" style="margin-top:-7px">$<?php print $value->menu_price ?></span>
                <span class="list-remark smaller">Quantity: <?php print $value->quantity ?></span>
            </div>
        </div>
    </a>
<?php endforeach ?>
</div>