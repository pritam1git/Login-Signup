
<?php
get_header();
//Template Name: signup

?>



<div class="container-fluid p-0 m-0">
    <div class="row">
        <div class="col-6 mt-5 mb-5  mx-auto">
            <div class="message"></div>
            <!-- Pills navs -->
<ul class="nav nav-pills nav-justified mt-5 mb-3 " id="ex1" role="tablist">
    <div class="col-6 mx-auto">
  <li class="nav-item" role="presentation">
    <a class="nav-link bg-warning text-dark" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
      aria-controls="pills-login" aria-selected="true">Sign Up</a>
  </li>
  </div>
</ul>
<!-- Pills navs -->

<!-- Pills content -->
<div class="tab-content shadow p-5">
  <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
  <form class="" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
    <div class="text-center mb-3">
    <div class="form-outline mb-4"style="text-align: left;">
    <input type="hidden" name="action" value="custom_user_creation">
<!-- <input type="hidden" name="data" value="foobarid"> -->
<label class="form-label" for="role">Type</label>
            <select name="role"class="form-select role" id="role">
                <option value="subscriber">Subscribe</option>
                <option value="contributor">Contributor</option>
                <option value="author">Author</option>
                <option value="editor">Editor</option>
            </select>
    </div>
    <div class="form-outline mb-4 "style="text-align: left;">
      <input type="text" id="loginName" class="form-control"name="txtUsername" />
      <label class="form-label" id="red_user_login" for="loginName">Username</label>
    </div>
    <div class="form-outline mb-4"style="text-align: left;">
      <input type="email" id="loginName" class="form-control"name="txtEmail"/>
      <label class="form-label" for="loginName">Email</label>
    </div>
    <!-- Password input -->
    <div class="form-outline mb-4"style="text-align: left;">
      <input type="password" id="loginPassword" class="form-control" name="txtPassword" />
      <label class="form-label" for="loginPassword">Password</label>
    </div>
    <div class="form-outline mb-4"style="text-align: left;">
      <input type="password" id="loginPassword" class="form-control" name="txtConfirmPassword"/>
      <label class="form-label" for="loginPassword">Confirm Password</label>
    </div>
    <!-- 2 column grid layout -->
    <!-- Submit button -->
    <!-- <a href="http://www.example.com/wp-admin/admin-post.php?action=add_foobar&data=foobarid">Submit</a> -->
    <button  type="submit" value="Submit" name ="signup"class="btn btn-primary btn-block mb-4">Sign Up</button>
  </form>




  </div>

</div>

<!-- Pills content -->
</div>
    </div>
</div>
              <?php
              get_footer();
              ?>

