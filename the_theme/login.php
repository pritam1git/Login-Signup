
<?php
get_header();
//Template Name: login

?>
                  <div class="container-fluid p-0 m-0">
                  <div class="row">
                      <div class="col-6 mt-5 mb-5  mx-auto">
                          <div class="message"></div>
                          <!-- Pills navs -->
              <ul class="nav nav-pills nav-justified mt-5 mb-3" id="ex1" role="tablist">
                  <div class="col-6 mx-auto">
                <li class="nav-item" role="presentation">
                  <a class="nav-link bg-warning text-dark" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
                    aria-controls="pills-login" aria-selected="true">Login</a>
                </li>
                </div>
              </ul>
              <!-- Pills navs -->
    
              <!-- Pills content -->
              <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                  <form class="p-5 shadow" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                  <input type="hidden" name="action" value="login_form">
                    <div class="text-center mb-3">
                    <div class="form-outline mb-4"style="text-align: left;">
           
                    <div class="form-outline mb-4"style="text-align: left;">
                      <input type="text" id="loginName" class="form-control"name="user" />
                      <label class="form-label" for="loginName">Username</label>
                    </div>
                    <div class="form-outline mb-4"style="text-align: left;">
                      <input type="password" id="loginPassword" class="form-control" name="pwd" />
                      <label class="form-label" for="loginPassword">Password</label>
                    </div>
                    <!-- 2 column grid layout -->
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4"name="submit">Login</button>
                  </form>
                </div>
    
              </div>
    
              <!-- Pills content -->
              </div>
                  </div>
              </div>


              .
              <?php
              get_footer();
              ?>







