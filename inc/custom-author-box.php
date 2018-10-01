<h4 class="about-the-author">
	About The Author
</h4>

<div class="postauthor-wrap">
 <span itemscope itemprop="image" alt="Photo of <?php esc_attr_e(get_the_author_meta( 'display_name' ),'izzy'); ?>">
 <?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '100' ); } ?>
 </span>

	<h5 class="vcard author" itemprop="url" rel="author">
		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="fn" itemprop="name">
 <span itemprop="author" itemscope itemtype="https://schema.org/Person">
 <?php the_author_meta( 'display_name' ); ?>
 </span>
		</a>
	</h5>

	<?php echo "<p class='author-description'>";
				the_author_meta('description');
	      echo "</p>"; ?>
	<span class="post-author-links">
 <?php if (get_the_author_meta('facebook') != ''): ?>
	 <a class="author-link f" title="Follow on Facebook" href="<?php esc_html_e(get_the_author_meta('facebook'),'izzy'); ?>" target="_blank">
 <i class="fa fa-facebook">
 </i>
 </a>
 <?php endif; ?>
		<?php if (get_the_author_meta('twitter') != ''): ?>
			<a class="author-link t" title="Follow on Twitter" href="https://twitter.com/<?php esc_html_e(get_the_author_meta('twitter'),'izzy'); ?>" target="_blank">
 <i class="fa fa-twitter">
 </i>
 </a>
		<?php endif; ?>
 </span>
</div>