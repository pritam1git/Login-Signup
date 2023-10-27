<?php
get_header();

?>

<div class="container ">
    <div class="row ">
        <div class="col-6 mx-auto mt-5 mb-5">
        <div class="card mb-3 ">
  <img class="card-img-top img-fluid object-fit-cover" src="https://img.freepik.com/free-photo/fashion-boy-with-yellow-jacket-blue-pants_71767-96.jpg?w=740&t=st=1698305370~exp=1698305970~hmac=6d3007227f7bb414cc8cae56faa3b0907a7440c9106ed2a538f8779ecd171efc" alt="Card image cap"style=" height: 350px;">
  <div class="card-body">
    <h5 class="card-title">Supplier Name: <?php echo get_the_title();?></h5>
    <p class="card-text"> <b>Email :</b> <?php echo get_post_meta(get_the_ID(), 'email', true); ?></p>
    <p class="card-text"><b>Address :</b><?php echo get_post_meta(get_the_ID(), 'address', true); ?></p>
    <p class="card-text"><b>Description :</b><?php echo get_post_meta(get_the_ID(), 'desc', true); ?></p>
    <p class="card-text"><small class="text-muted">Last updated 1 sec ago</small></p>
  </div>
</div>
        </div>
    </div>
</div>


<?php
get_footer();
?>