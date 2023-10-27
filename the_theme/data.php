
<?php

//Template Name:suppliers
get_header();
?>
<?php
$serchData ="";
if(isset($_GET['products'])!=""){
  $serchData = $_GET['products'];
}

$page = get_permalink('87');

?>

<div class="container-fluid p-0 m-0 2">
    <div class="row">
        <div class="col-10  mx-auto" style="margin: 130px 0px; padding: 15px 12px;">
            <div class="message"></div>

            <a href="<?php echo $page;?>" type="button" class="btn btn-warning">Add New Supplier</a>
            <!-- Pills navs -->
            <form method="get"class="form-inline mb-4" style="display:flex;justify-content: end !important;">
      <input class="form-control-sm mr-sm" type="search" placeholder="Search" aria-label="Search" name="products">
      <button class="btn btn-outline-success my-2 my-lg-0" type="submit">Search</button>
    </form>
            <table id="myTable" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
  <thead>
    <tr>
    
      <th class="th-sm">Name

      </th>
      <th class="th-sm">Contect

      </th>
      <th class="th-sm">Email

      </th>
      <th class="th-sm">Website

      </th>
      <th class="th-sm">Products

      </th>
      <th class="th-sm">Country

      </th>
      <th class="th-sm">Address

      </th>
      <th class="th-sm">Description

      </th>
      <th class="th-sm"> View

      </th>
    </tr>
  </thead>
  <tbody>
  <?php
   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'supplier', // This selects only regular posts
    'posts_per_page' => 5, // Number of posts to display
    'paged'          => $paged,
    's'=> $serchData,
);

$query = new WP_Query($args);

while ($query->have_posts()):
    $query->the_post();


?>
    <tr>
    <td><?php echo get_the_title();?></td>
    <td><?php echo get_post_meta(get_the_ID(), 'contect', true); ?></td>
    <td><?php echo get_post_meta(get_the_ID(), 'email', true); ?></td>
    <td><?php echo get_post_meta(get_the_ID(), 'website', true); ?></td>
    <td><?php echo get_the_excerpt();?></td>
    <td><?php echo get_post_meta(get_the_ID(), 'country', true); ?></td>
    <td><?php echo get_post_meta(get_the_ID(), 'address', true); ?></td>
    <td><?php echo get_post_meta(get_the_ID(), 'desc', true); ?></td>
      <td><a href="<?= get_the_permalink();?>"type="button" class="btn btn-warning">View</a></td>
    </tr>
    <?php
endwhile;
 ?>

  </tbody>
  </table>
  <nav aria-label="Page navigation example " style="display:flex;justify-content: end !important;">
                <ul class="pagination">
                <li class="page-item <?php echo ($paged == $total_pages) ? 'disabled' : ''; ?>">
                        <a class="page-link text-dark" href="<?php echo esc_url(get_pagenum_link($paged + 1)); ?>">Previous</a>
                    </li>
                    <?php
                    // Get the total number of pages
                    $total_pages = $query->max_num_pages;

                    // Loop through each page and generate a pagination link
                    for ($i = 1; $i <= $total_pages; $i++) :
                    ?>
                        <li class="page-item  <?php echo ($paged == $i) ? 'active' : ''; ?>">
                            <a class="page-link bg-light text-dark" href="<?php echo esc_url(get_pagenum_link($i)); ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>

                    <li class="page-item <?php echo ($paged == $total_pages) ? 'disabled' : ''; ?>">
                        <a class="page-link text-dark" href="<?php echo esc_url(get_pagenum_link($paged + 1)); ?>">Next</a>
                    </li>
                </ul>
            </nav>


  </div>

</div>

<!-- Pills content -->
</div>
     <div class="div mt-3">
     <?php
              get_footer();
           ?>
     </div>
   
<script type="text/javascript" language="javascript">
$(document).ready(function () {
  $('#myTable').DataTable({
        "paging":   false,
        "searching": false
    } );
});
</script>
