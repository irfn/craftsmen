<div class="dbx-group" id="sidebar">
	
		<div id="cred">
			<?php if(get_option('plallow')):?>
				<a class="plimage" href="<?php echo get_option('pllink'); ?>"><?php echo get_option('pltext'); ?></a>
			<?php else:?>
				<a class="pagelines" href="http://www.pagelines.com" alt="Pagelines&mdash;Internet Strategy"><?php if(get_option('pagelines-text')):?><?php echo get_option('pagelines-text');?><?php else:?>Pagelines<?php endif;?></a>
			<?php endif;?>
		</div>
	<?php if(get_option('plallow') && get_option('pp_welcomemessage')):?>
		<div class="welcome"> 
			<?php echo get_option('pp_welcomemessage'); ?>
		</div>
	<?php endif;?>
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

      <!--sidebox start -->
      <div id="categories" class="dbx-box">
        <h3 class="dbx-handle"><?php _e('Categories'); ?></h3>
        <div class="dbx-content">
          <ul>
            <?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
          </ul>
        </div>
      </div>
      <!--sidebox end -->

	<!--sidebox start -->
	<div id="categories" class="dbx-box">
	  <h3 class="dbx-handle"><?php _e('Tag Cloud'); ?></h3>
	  <div class="dbx-content">
	    <ul>
		<?php wp_tag_cloud('smallest=8&largest=17&number=30'); ?>
	    </ul>
	  </div>
	</div>
	<!--sidebox end -->


      <!--sidebox start -->
      <div id="archives" class="dbx-box">
        <h3 class="dbx-handle"><?php _e('Archives'); ?></h3>
        <div class="dbx-content">
          <ul>
            <?php wp_get_archives('type=monthly'); ?>
          </ul>
        </div>
      </div>
      <!--sidebox end -->

      <!--sidebox start -->
      <div id="links" class="dbx-box">
        <h3 class="dbx-handle"><?php _e('Links'); ?></h3>
        <div class="dbx-content">
          <ul>
            <?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
          </ul>
        </div>
      </div>
      <!--sidebox end -->

      <!--sidebox start -->
      <div id="meta" class="dbx-box">
        <h3 class="dbx-handle">Meta</h3>
        <div class="dbx-content">
          <ul>
				<?php wp_register(); ?>
				<li class="login"><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
				<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
              <li class="rss"><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
              <li class="rss"><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>

	        <li class="famfamfam"><a href="http://www.famfamfam.com" title="Some Icons by FamFamFam">Famfamfam Icons</a></li>
              <li class="wordpress"><a href="http://www.wordpress.org" title="Powered by WordPress">WordPress</a></li>

          </ul>
        </div>
      </div>
      <!--sidebox end -->

  <?php endif; ?>
	<div style="clear:both"></div>
</div><!--/sidebar -->