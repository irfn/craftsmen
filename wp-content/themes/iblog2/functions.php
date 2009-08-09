<?php
if ( function_exists('register_sidebar') ){
    register_sidebar( array(
        'before_widget' => '<!--sidebox start --><div id="%1$s" class="dbx-box %2$s">',
        'after_widget' => '&nbsp;</div></div><!--sidebox end -->',
        'before_title' => '<h3 class="dbx-handle">',
        'after_title' => '&nbsp;</h3><div class="dbx-content">',
    ));
}
?><?php function widget_iblog_search() {
?><?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_iblog_search');
?><?php function widget_iblog_meta() { ?>
	<!--sidebox start -->
	<div id="meta" class="dbx-box">
	  <h3 class="dbx-handle">Meta</h3>
	  <div class="dbx-content">
	    <ul>
			<?php wp_register(); ?>
			<li class="login"><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
	        <li class="rss"><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
	        <li class="rss"><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>
	        <li class="famfamfam"><a href="http://www.famfamfam.com" title="Some Icons by FamFamFam">Icons by Famfamfam</a></li>
			<li class="wordpress"><a href="http://www.wordpress.org" title="Powered by WordPress">WordPress</a></li>

	    </ul>
	  </div>
	</div>
	<!--sidebox end -->
<?php } if ( function_exists('register_sidebar_widget') ) register_sidebar_widget(__('Meta'), 'widget_iblog_meta'); 
?><?php function widget_iblog_links() { ?>
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
<?php } if ( function_exists('register_sidebar_widget') ) register_sidebar_widget(__('Links'), 'widget_iblog_links');

	$linkno = rand(1,3);
	if($linkno == 1){add_option('pllink', 'http://www.pagelines.com');	add_option('pltext', 'internet strategy');
	}elseif($linkno == 2){	add_option('pllink', 'http://www.pagelines.com');add_option('pltext', 'web strategy consulting');
	}else{	add_option('pllink', 'http://www.pagelines.com');	add_option('pltext', 'internet marketing strategy'); }

add_action('admin_menu', 'add_option_interface');
function add_option_interface() { add_theme_page('themeoptions', 'iBlog Options', '8', 'optionpage', 'editoptions'); }

?><?php function editoptions() { ?>	
<form method="post" action="options.php">
  <div class='wrap'>
		<div id="" class="ui-tabs-panel" style="display: block;">
			<h2>iBlog Options</h2>
			<table class="form-table">
				<tbody>
				 <?php wp_nonce_field('update-options'); ?>
				<p>Welcome to iBlog Options. We hope your enjoying this "PagePress" theme from <a href="http://www.pagelines.com">Pagelines</a>.</p>
				<p>This section allows you to customize your header and favicon image. If you would like to use <strong>custom</strong> images you will need to have their direct URL addresses available.</p>
				
				<table class="form-table">
					<tbody>
				
						<tr valign="middle">
							<th scopt="row"><strong>Header Text Image</strong><br/><small>Input Full URL to your custom header or logo image.</small></th>
							<td><input class="regular-text" type="text" name="custom-header" value="<?php echo get_option('custom-header'); ?>" />
								<span class="setting-description">Optional way to replace 'heading' and 'description' text for your website with an image.</span>
								<?php if(get_option('custom-header')):?>
									<p><img src="<?php echo get_option('custom-header');?>" style="width:200px; "/></p>
								<?php endif;?>
							</td>
						</tr>
						<tr valign="middle">
							<th scopt="row"><strong>Favicon Image</strong><br/><small>Input Full URL to Favicon</small></th>
							<td><input class="regular-text" type="text" name="favicon" value="<?php echo get_option('favicon'); ?>" />
								<span class="setting-description">Enter the full URL location of your custom 'favicon' which is visible in browser favorites and tabs. </span>
							</td>
						</tr>
						<tr valign="middle">
							<th scopt="row">
								<strong>Page Comments</strong><br/><small>Allow comments on pages?</small>
							</th>
							<td valign="middle">
								
								<input class="admin_checkbox" type="checkbox" name="pagecomments" <?php if(get_option('pagecomments')):
								echo 'checked'; else: echo 'unchecked'; endif;?> />
								
							</td>
						</tr>
						<tr valign="middle">
							<th scopt="row">
								<strong>Easy Analytics</strong><br/><small>Adds analytics script to your footer</small>
							</th>
							<td valign="middle">
								
								<p>
									<label for="">This is the easiest way to add an analytics script for a service like <a href="http://www.google.com/analytics">Google Analytics</a> to your footer. Simply add your script here.</label><br/>
									<textarea name="pp_analytics" cols="50" rows="5"><?php echo get_option('pp_analytics'); ?></textarea>
										<span class="setting-description"></span>
								</p>
							</td>
						</tr>
						<tr valign="middle">
							<th scopt="row">
								<strong>Additional Options</strong><br/><small>Get additional options by allowing Pagelines image link? (optional)</small>
							</th>
							<td valign="middle">
								<p>
									 <img src="<?php bloginfo('stylesheet_directory'); ?>/images/pagelines-sig.png" style="margin-bottom: .5em"/> <br/>
									<label><input class="admin_checkbox" type="checkbox" name="plallow" <?php if(get_option('plallow')):
								echo 'checked'; else: echo 'unchecked'; endif;?> />
									Get additional options and allow Pagelines Image link in your footer (instead of text link).</label>
								</p>
								<div class="additional" style="<?php if(!get_option('plallow')):?>display:none;<?php endif;?>border-top: 1px solid #ccc; border-bottom: 1px solid #bbb; background: #eee;padding: 10px 2em; ">
									<h3 style="font-size: 1.6em; color: #aaa;line-height: 15px">Additional Options</h3>
									<p>
										<label for=""><strong>Welcome Message</strong> <small>(Placed above sidebar. Format with HTML)</small></label><br/>
										<textarea name="pp_welcomemessage" cols="50" rows="5"><?php echo get_option('pp_welcomemessage'); ?></textarea>
											<span class="setting-description"></span>
									</p>
									<p>
										<label><input class="admin_checkbox" type="checkbox" name="pp_showauthor" <?php if(get_option('pp_showauthor')): echo 'checked'; else: echo 'unchecked'; endif;?> /><strong> Show author on posts?</strong></label>
									</p>
									<p>
										<label><input class="admin_checkbox" type="checkbox" name="pp_showfootnav" <?php if(get_option('pp_showfootnav')): echo 'checked'; else: echo 'unchecked'; endif;?> /><strong> Show footer navigation?</strong></label>
									</p>
									<p>
										<label><input class="admin_checkbox" type="checkbox" name="pp_pagetitle" <?php if(get_option('pp_pagetitle')): echo 'checked'; else: echo 'unchecked'; endif;?> /><strong> Show page title on pages?</strong></label>
									</p>
									<p>
										<label><strong>Color of links (Hex Code): </strong></label><input id="bgcolor" size="7"  type="text" name="pp_linkcolor" value="<?php echo get_option('pp_linkcolor'); ?>" /><span class="setting-description"> <small><em>Example</em>: #000000 for black, default is #0088CC</small></span>
									</p>
									
								</div>
								<?php if(!get_option('plallow')):?><p><small>(Enable this and Refresh page to set additional options)</small></p><?php endif;?>
							</td>
						</tr>
						<tr valign="middle">
							<th scopt="row"><strong>Questions?</strong></th>
							<td>								
								<p>If you have any questions or would like to learn more about what we are working on, visit us at <a href="http://www.pagelines.com" alt="pagelines">Pagelines.com</a>.</p>
							</td>
							
						</tr>
						
					</tbody>
				</table>
		
			
			
			 <input type="hidden" name="action" value="update" />
			 <input type="hidden" name="page_options" value="favicon, custom-header,pagecomments, plallow, pp_welcomemessage, pp_linkcolor, pp_showauthor, pp_showfootnav, pp_pagetitle, pp_analytics" />
			 <p><input class="button-primary" type="submit" name="Submit" value="Update Options" /></p>
		</div>	
  </div>
</form>
<?php } ?>