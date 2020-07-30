<nav class="nav">
	<ul>

		<?php 
			$array_menu = wp_get_nav_menu_items('menu');
			$menu = array();
			foreach ($array_menu as $item) {
				if (empty($m->menu_item_parent)) { ?>

					<li>
						<a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>"> 
							<?php echo $item->title; ?>
						</a>
					</li>

				<?php }
			}
		?>

		<li class="search"></li>

		<li class="idioma" style="display: none;">
			<a href="" title="EN">EN</a>
			<a href="" title="ES">ES</a>
		</li>
	</ul>
</nav>

	<div class="menu-mobile" id="nav-icon2">
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
	</div>