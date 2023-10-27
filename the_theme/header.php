<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" href=" <?php echo get_stylesheet_uri();?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php 
    if (is_singular() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply'); 
    ?>
         
    <?php wp_head(); ?>
</head>
<body>

<?php
      $user = wp_get_current_user();
      $user_roles = $user->roles;
      $user_role = array_shift($user_roles); // Get the primary role

      // Define the menu location based on the user's role
      $menu_location = '';

      if ($user_role === 'administrator') {
          $menu_location = 'primary-menu';
      } elseif ($user_role === 'editor') {
          $menu_location = 'editor-menu';
      } elseif ($user_role === 'author') {
          $menu_location = 'author-menu';
      } elseif ($user_role === 'contributor') {
          $menu_location = 'contributor-menu';
      } elseif ($user_role === 'creator') {
          $menu_location = 'secondary-menu';
      } elseif ($user_role === 'subscriber') {
          $menu_location = 'subscriber-menu';
      } else {
          $menu_location = 'secondary-menu';
      }

    //print_r($menu_location);die;
      // Display the selected menu in your header
      wp_nav_menu(array('theme_location' => $menu_location));
?>

