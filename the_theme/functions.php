<?php


/**
 * Proper way to enqueue scripts and styles
 */


 function files() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
} 
  add_action( 'wp_enqueue_scripts', 'files' );
 function enqueue_custom_styles_and_scripts() {
    //  wp_enqueue_style('custom-style', get_template_directory_uri() .'/style.css');
    //  wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), '', true);
 }
 
 add_action('wp_enqueue_scripts', 'enqueue_custom_styles_and_scripts');



register_sidebar(
  array(
    'id' => 'primary',
    'name' => 'Primary Sidebar'
  )
);

function register_my_menus()
{
  register_nav_menus(
    array(
      'primary-menu' => __('Primary Menu'),
      'secondary-menu' => __('secondary Menu'),
      'subscriber-menu'=> __('subscriber-menu'),
      'contributor-menu'=> __('contributor-menu'),
      'author-menu'=> __('author-menu'),
      'editor-menu'=> __('editor-menu'),
      'footer-menu'=> __('footer-menu'),
    )
  );
}
add_action('init', 'register_my_menus');




function wporg_custom_post_type() {
  register_post_type('supplier',
      array(
          'labels' => array(
              'name' => __('Supplier', 'textdomain'),
              'singular_name' => __('Supplier', 'textdomain'),
          ),
          'public' => true,
          'has_archive' => true,
          'supports' => array('title', 'thumbnail', 'excerpt', 'custom-fields'), // Add more support options.
          'rewrite' => array('slug' => 'supplier'), // Customize the URL slug for your custom post type.
          'menu_icon' => 'dashicons-cart', // Set a custom menu icon (use Dashicons classes).
          'taxonomies' => array('category', 'post_tag'), // Add support for categories and tags.
          'publicly_queryable' => true, // Allow public queries for this post type.
          'capability_type' => 'post', // Use 'post' capabilities for this custom post type.
      )
  );
}
add_action('init', 'wporg_custom_post_type');


    
function redirect_to_custom_login_page()
{

  wp_redirect(home_url() . '/sample-page');
  exit();
}

add_action("wp_logout", "redirect_to_custom_login_page");




add_action("init", "fn_redirect_wp_admin");

function fn_redirect_wp_admin()
{
  global $pagenow;
  if ($pagenow == "login.php" && $_GET['action'] != "logout") {
    wp_redirect(home_url() . '/login');
    exit();
  }
}



function signup_form_fn()
{
  global $wpdb;
  $username = $wpdb->escape($_POST['txtUsername']);
  $email = $wpdb->escape($_POST['txtEmail']);
  $role = $wpdb->escape($_POST['role']);
  $password = $wpdb->escape($_POST['txtPassword']);
  $ConfPassword = $wpdb->escape($_POST['txtConfirmPassword']);
  $error = array();
  if (strpos($username, ' ') !== FALSE) {
    $error['username_space'] = "Username has Space";
  }

  if (empty($username)) {
    $error['username_empty'] = "Username is needed";
  }

  if (username_exists($username)) {
    $error['username_exists'] = "Username already exists";
  }

  if (!is_email($email)) {
    $error['email_valid'] = "Email is not valid";
  }

  if (email_exists($email)) {
    $error['email_existence'] = "Email already exists";
  }

  if (strcmp($password, $ConfPassword) !== 0) {
    $error['password'] = "Password didn't match";
  }

  if (count($error) == 0) {
    $user = wp_create_user($username, $password, $email);


    if (is_wp_error($user)) {
      echo "User creation failed: " . $user->get_error_message();
    } else {
      $user = new WP_User($user);
      $user->set_role($role);
      echo "User Created Successfully";
      wp_redirect(home_url());
      exit();
    }
  } else {
    print_r($error);
  }

}
// add_action( 'admin_post_nopriv_customLoginConnect', 'signup_form_fn' );
add_action('admin_post_custom_user_creation', 'signup_form_fn');



function login_page()
{

  $username = $_POST['user'];
  $password = $_POST['pwd'];

  $verify_user = wp_authenticate($username, $password);

  // var_dump($verify_user->ID);die;
  if (is_wp_error($verify_user)) {
    
    $error_message = $verify_user->get_error_message();
    wp_die($error_message);

  } else {
    wp_set_current_user($verify_user->ID);
    wp_set_auth_cookie($verify_user->ID);
    if($verify_user->ID == '11'){
      wp_redirect(home_url('?page_id=2'));
    }else{
      wp_redirect(home_url());
    }
  }

}
add_action('admin_post_login_form', 'login_page');



// function protection_page()
// {
//   if (is_user_logged_in()) {
//     $user = wp_get_current_user();
    


//     if (in_array('contributor', $user->roles)) {
//       $restricted_pages = array(42, 40);
//     } elseif (in_array('author', $user->roles)) {
//       $restricted_pages = array(42);
//     } elseif (in_array('editor', $user->roles)) {
//       $restricted_pages = array(40);
//     } elseif (in_array('subscriber', $user->roles)) {
//       $restricted_pages = array(40);
//     } else {
//       $restricted_pages = array();
//     }

//     // Get the current post/page ID
//     $post_id = get_queried_object_id();

//     if (in_array($post_id, $restricted_pages)) {
//       wp_redirect(Home_url('/restricted-access/'));
//       exit;
//     }
//   }
// }

// $edit = get_permalink('2');



function restrict_access_to_protected_file() {
  if (is_user_logged_in()) {
      $current_user = wp_get_current_user();

      if (!in_array('editor', $current_user->roles)) {
          $restricted_page_id = array(2, 87);
          if (is_page($restricted_page_id)) {
              // wp_send_json_error('Access denied.');
              wp_die("You do not have access to this page.");
              exit();
          }
      }
  } else {
      wp_redirect(home_url());
      exit();
  }
}

add_action('template_redirect', 'restrict_access_to_protected_file');


function custom_add_role() {
// Define your custom role's capabilities
$capabilities = array(
    'read' => true, // Allow reading
    'edit_posts' => true, // Allow editing posts
    'upload_files' => true, // Allow uploading files
    // Add more capabilities as needed
);

// Create the custom role
add_role('custom_role', 'creator', $capabilities);
}
// Hook the custom role creation function to the 'init' action
add_action('init', 'custom_add_role');







function custom_postData_fn() {

    $supplier_name = sanitize_text_field($_POST['supplier_name']);
    $supplier_email = sanitize_email($_POST['supplier_email']);
    $supplier_phone = sanitize_text_field($_POST['supplier_contact']);
    $supplier_website = sanitize_text_field($_POST['supplier_web']);
    $products = sanitize_text_field($_POST['products']);
    $supplier_country = sanitize_text_field($_POST['country']);
    $supplier_desc = sanitize_text_field($_POST['supplier_desc']);
    $supplier_add =sanitize_text_field($_POST['supplier_add']);

    $post_data = array(
         'post_title'=> $supplier_name,
         'email'=>$supplier_email,
        'contect' => $supplier_phone,
        'website'=>$supplier_website,
        'post_excerpt'=> $products,
        'country' => $supplier_country,
        'desc'   => $supplier_desc,
        'address'   => $supplier_add,
        'post_type'    => 'Supplier', 
        'post_status'  => 'publish'
    );

    $post_id = wp_insert_post($post_data);
    // echo "<pre>";
    // print_r($post_id);
    // echo "</pre>";
    // die(); 
    if (!is_wp_error($post_id)) {
        // Update custom fields (if any)
        update_post_meta($post_id, 'title', $supplier_email);
        update_post_meta($post_id, 'email', $supplier_email);
        update_post_meta($post_id, 'contect', $supplier_phone);
        update_post_meta($post_id, 'website', $supplier_website);
        update_post_meta($post_id, 'desc', $supplier_desc);
        update_post_meta($post_id, 'address', $supplier_add);
        update_post_meta($post_id, 'country', $supplier_country);



        echo 'Successfully Add Supplier';
        
        echo '<script>';            
        echo  'setTimeout(function(){';
        echo      'window.location.replace("http://wordpress.test/?page_id=2");'; // The new url you want to redirect to
        echo  '}, 2000);'; // time before redirect in millisecondes
        echo '</script>';

        // wp_redirect( "http://wordpress.test/suppliers/", 301 );
        // exit();
       

    } else {
     
        echo $post_id->get_error_message();
    }
}


add_action('admin_post_nopriv_custom_supplier_submission', 'custom_postData_fn');
add_action('admin_post_custom_supplier_submission', 'custom_postData_fn');
?>

<script>

// $(document).ready(function () {

// $('#submit').submit(function (e) {
//     e.preventDefault();
//     var title = $("#supplier_name")
    
//     $.ajax({
//         url: "supplier.php",
//         type: "PUT",
//         contentType: 'application/json; charset=UTF-8',
//         data: JSON.stringify({
//           title : title,
//         }),
//         success: function (data) {
//             $('.message-up')
//                 .html('Update successful: ' + JSON.stringify(data))
//                 .removeClass('alert-danger')
//                 .addClass('alert-success')
//                 .show();
//         },
//         error: function (error) {
//             $('.message-up')
//                 .html('Error: ' + JSON.stringify(error))
//                 .removeClass('alert-success')
//                 .addClass('alert-danger')
//                 .show();
//         },
//     });
// });
// });
</script>