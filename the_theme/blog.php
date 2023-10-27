


<?php
get_header();


//Template Name: blog


$args = array(
    'post_type' => 'post', // This selects only regular posts
    'posts_per_page' => 3, // Number of posts to display
);

$query = new WP_Query($args);

while (have_posts()):
    the_post();
    ?>

<table id="myTable" class="display">
    <thead>
        <tr>
            <th><?php the_title();?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php the_content();?></td>
        </tr>
    </tbody>
</table>

    <?php
endwhile;

get_footer();


?>