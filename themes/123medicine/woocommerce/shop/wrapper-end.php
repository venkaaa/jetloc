            </div>
			
			<?php if(is_singular( 'product' )){ ?>
				<?php if ( is_active_sidebar(4) ){?>
				    <div class="col-md-2">
					    <div class="sidebar">
					    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Product Post Sidebar') ) ?>
					    </div>
				    </div>
				<?php } ?>
			<?php } else{?>
				<?php if ( is_active_sidebar(3) ){?>
					<div class="col-md-3">
					    <div class="sidebar">
					    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Shop Sidebar') ) ?>
					    </div>
					</div>
				<?php } ?>
			<?php } ?>
			
		</div>
	</div>
</div>