<?php get_header(); ?>

      <div id="content">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

        <div class="post fix" id="post-<?php the_ID(); ?>">
		  <div class="date"><span><?php the_time('M') ?></span> <?php the_time('d') ?></div>
		  <div class="title">
          <h2  class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="postdata">					
					<?php if(get_option('plallow') && get_option('pp_showauthor')):?><span class="author">By <?php the_author() ?></span><?php endif;?>
					<span class="category"><?php the_category(', ') ?></span>
					<span class="comments"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></span>
				</div>
		  </div>
          <div class="entry">
            <?php the_content('Continue reading &raquo;'); ?>
          </div><!--entry -->
  			<span class="tags"><?php the_tags('Tagged with: ',' &bull; ','<br />'); ?></span>
        </div><!--post -->

		<?php endwhile; ?>
		
        <div class="page-nav fix"> <span class="previous-entries"><?php next_posts_link('Previous Entries') ?></span> <span class="next-entries"><?php previous_posts_link('Next Entries') ?></span></div><!-- page nav -->

	<?php else : ?>

		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>
		
	<?php endif; ?>
	</div>
<?php get_footer(); ?>