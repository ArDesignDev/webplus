<div class="page-header-filter-search">
			<form role="search" method="get" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
				<div>
					<label class="screen-reader-text" for="legislation'"><?php _x('Search', 'label'); ?></label>
					<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="legislation'" placeholder="Search zdravstevni zapleti." />
					<input type="hidden" name="post_type" value="legislation'" /> <!-- Replace 'your_custom_post_type' with the slug of your custom post type -->
					<input type="submit" value="Search" />
					<img class="search-img" src="<?php echo get_theme_file_uri();?>/img/icons/search-icon.svg" alt="arrow">
				</div>
			</form>
		</div>

		<!-- field for post order -->
		<div class="page-header-order custom-dropdown">
			<form id="sort-form" method="get" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
				<select name="sort-order" id="sort-order" onchange="if(this.value !== 'sort') document.getElementById('sort-form').submit()">
					<option value="sort">Razvrščanje</option>
					<option value="name-asc" <?php selected(isset($_GET['sort-order']) && $_GET['sort-order'] === 'name-asc'); ?>>Name (A-Z)</option>
					<option value="name-desc" <?php selected(isset($_GET['sort-order']) && $_GET['sort-order'] === 'name-desc'); ?>>Name (Z-A)</option>
					<option value="date-asc" <?php selected(isset($_GET['sort-order']) && $_GET['sort-order'] === 'date-asc'); ?>>Date (Old to New)</option>
					<option value="date-desc" <?php selected(isset($_GET['sort-order']) && $_GET['sort-order'] === 'date-desc'); ?>>Date (New to Old)</option>
				</select>
				<?php if (isset($post_type)) : ?>
					<input type="hidden" name="post_type" value="<?php echo $post_type; ?>" />
				<?php endif; ?>
				<input type="submit" value="Sort" style="display: none;" />
			</form>
		</div>