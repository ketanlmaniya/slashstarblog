<?php if( is_active_sidebar('hidden-sidebar') ){?>	
	<div id="hidden-sidebar" class="sidebar">
		<div class="widgets-side">
			<a href="#" class="close-button"><i class="close-icon"></i></a>
			<?php
				if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Hidden Sidebar') );
			?>
		</div>
	</div>
<?php } ?>