<?php get_header(); ?>
  <div id="content">
  
  <div class="post-nav"> <span class="previous"><?php previous_post_link('%link') ?></span> <span class="next"><?php next_post_link('%link') ?></span></div>
  
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="post fix" id="post-<?php the_ID(); ?>">
		  <div class="date"><span><?php the_time('M') ?></span> <?php the_time('d') ?></div>
		  <div class="title">
          <h2  class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
          <div class="postdata">
				<?php if(get_option('plallow') && get_option('pp_showauthor')):?><span class="author">By <?php the_author() ?></span><?php endif;?>
				<span class="category"><?php the_category(', ') ?></span>
				<span class="right mini-add-comment"><a href="#respond">Add comments</a></span></div>
		  </div>
          <div class="entry fix">
            <?php the_content('Continue reading &raquo;'); ?>
			<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
			<?php edit_post_link('Edit', '', ''); ?>
          </div><!--/entry -->
		
		<?php comments_template(); ?>
		</div><!--/post -->
		
			<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>
</div>
<?php get_footer(); ?>