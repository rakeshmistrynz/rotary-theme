<?php
/**
 * Home Page Content Markup
 */
?>

<?php the_post_thumbnail('sparkling-featured', array('class' => 'single-featured')); ?>

<div class="post-inner-content clearfix">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header page-header clearfix">
            <h1 class="entry-title rotary-heading homepage"><?php the_title(); ?></h1>
        </header>
        <!-- .entry-header -->

        <div class="entry-content">
            <?php the_content(); ?>
            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'sparkling'),
                'after' => '</div>',
            ));
            ?>
        <!-- .entry-content -->
        <?php edit_post_link(esc_html__('Edit', 'sparkling'), '<footer class="entry-footer"><i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span></footer>'); ?>
    </article>

    <?php
    // Checks if this is homepage to enable homepage widgets
    if (is_front_page()) :
        get_sidebar('home');
    endif;
    ?>

    <!-- #post-## -->
    <article class="clearfix hentry">
        <div class="page-header">
            <h2 class="rotary-heading">Get in touch</h2>
        </div>
            <div class="col-md-6 col-sm-6 get-intouch">
                <h3>Club Meetings</h3>
                <p>Club meets every Tuesday night at 5:45pm for a 6:15 start. There is plenty of free parking next to Rotary House. Dinner costs $20 per person. If you wish to attend a meeting please <a href="mailto:president@rotarycluboforewa.org.nz?cc=secretary@rotarycluboforewa.org.nz">email</a> us stating your name and what day you will be attending.</p>
                <h3>Donations & Funding</h3>
                <p>Please <a href="mailto:president@rotarycluboforewa.org.nz?cc=secretary@rotarycluboforewa.org.nz">email</a> us to enquire about our club projects or funding assistance.</p>
                <h3>Club Contact Details</h3>
                <ul class="list-group contact-details" >
                    <a href="mailto:president@rotarycluboforewa.org.nz?cc=secretary@rotarycluboforewa.org.nz" class="clearfix block"><li class="list-group-item"><i class="fa fa-envelope fa-2x"></i> Email Us</li></a>
                    <li class="list-group-item"><i class="fa fa-pencil-square-o fa-2x"></i>Postal Address: <span class="block address">P.O Box 97<br>Orewa 0946</span></li>
                </ul>
            </div>
            <div class="col-md-6 col-sm-6 get-intouch">
                <h3>Club Location</h3>
                <p>The Club is located at:<br>Rotary House<br>War Memorial Park<br>4 Hibiscus Coast Highway<br>Silverdale</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3202.123849541358!2d174.66482821440366!3d-36.62340537463774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d0d230b0fe74917%3A0x2fa705ce670f2c6e!2sOrewa+Rotary+House!5e0!3m2!1sen!2snz!4v1444551393600" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen class="club-map"></iframe>
            </div>
    </article>
