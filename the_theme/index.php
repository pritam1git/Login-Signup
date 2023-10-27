
<?php
    get_header();
?>


<?php
$args = array(
    'post_type' => 'cloth', // This selects only regular posts
    'posts_per_page' => 3, // Number of posts to display
);

$query = new WP_Query($args);

while (have_posts()):
    the_post();
    ?>
        <div class="header-blue">
            <div class="container hero">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                        <h1><?php the_title();?></h1>
                        <p><?= the_content();?><br></p>
                         <a href="<?= the_permalink();?>"class="btn btn-light btn-lg action-button" type="button">Learn More<i class="fa fa-long-arrow-right ml-2"></i></a></button>
                    </div>
                    <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder">
                        <div class="iphone-mockup">
						<img class="device" src="https://i.imgur.com/bkCeTu7.png">
                          <!--  <div class="screen">
							</div>	-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
endwhile;
wp_reset_query($query);

get_footer();


?>
