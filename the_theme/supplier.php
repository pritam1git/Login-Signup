
<?php

//Template Name: add-supplier 
get_header();
?>



<div class="container-fluid p-0 m-0 1">
    <div class="row">
        <div class="col-6 mt-5 mb-5  mx-auto">
        <div class="message-get mt-3 alert alert-success" style="display: none;"></div>
            <!-- Pills navs -->

<!-- Pills navs -->

<!-- Pills content -->
<div class="tab-content shadow p-5">
  <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
  <ul class="nav nav-pills nav-justified  mb-3 " id="ex1" role="tablist">
    <div class="col-6 mx-auto">
  <li class="nav-item" role="presentation">
    <a class="nav-link bold text-dark fs-3 fw-3" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
      aria-controls="pills-login" aria-selected="true">Add Supplier</a>
  </li>
<div class="line bg-dark "></div>
  </div>
</ul>
  <form class="" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
    <div class="text-center mb-3">
    <div class="form-outline mb-4"style="text-align: left;">



    <input type="hidden" name="action" value="custom_supplier_submission">

<!-- <input type="hidden" name="data" value="foobarid"> -->

    </div>
    <div class="form-outline mb-4 "style="text-align: left;">
    <label class="form-label" id="supplier_name" for="loginName">Supplier Name</label>
      <input type="text" id="supplier_name" class="form-control"name="supplier_name" required/>
   
    </div>
    <div class="form-outline mb-4 "style="text-align: left;">
    <label class="form-label" for="loginName">Contact number</label>
    <input type="tel" id="supplier_contact" class="form-control d-block" name="supplier_contact" required/>
<span id="error-msg" class="hide"></span>

    </div>
    <!-- Password input -->
    <div class="form-outline mb-4"style="text-align: left;">
    <label class="form-label" for="loginPassword">Email Address</label>
      <input type="email" id="supplier_email" class="form-control" name="supplier_email"required />
  
    </div>
    <div class="form-outline mb-4"style="text-align: left;">
    <label class="form-label" for="loginPassword">Website</label>
      <input type="text" id="supplier_web" class="form-control" name="supplier_web"required/>

    </div>
    <div class="form-outline mb-4"style="text-align: left;">
    <label class="form-label" for="role">Products</label>
            <select name="products"class="form-select role mb-3" id="products" multiple>
                <option value="red">Red</option>
                <option value="blue">Blue</option>
                <option value="green">Green</option>
                <option value="yellow">Yellow</option>
            </select>
    </div>
    <label class="form-label" for="role">Country</label>
            <select name="country"class="form-select role mb-3" id="country">
                <option value="india">India</option>
                <option value="japan">Japan</option>
                <option value="nepal">Nepal</option>
                <option value="pakistan">Pakistan</option>
            </select>
            <div class="form-outline mb-4"style="text-align: left;">
            <label class="form-label" for="loginPassword">Supplier Address</label>
      <input type="text" id="supplier_add" class="form-control" name="supplier_add"required/>
 
    </div>  
    <div class="form-outline mb-4"style="text-align: left;">
    <label class="form-label" for="loginPassword">Description</label>
      <input type="text" id="supplier_desc" class="form-control" name="supplier_desc"required/>

    </div>    
    <!-- 2 column grid layout -->
    <!-- Submit button -->
    <!-- <a href="http://www.example.com/wp-admin/admin-post.php?action=add_foobar&data=foobarid">Submit</a> -->
    <button  type="submit" value="Submit" id="submit" name ="post"class="btn btn-primary btn-block mb-4">Submit</button>
  </form>




  </div>

</div>

<!-- Pills content -->
</div>
    </div>
</div>
<?php  get_footer();?>
<script>
$("#products").select2({
  maximumSelectionLength: 2
});

  </script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
<script>
const input = document.querySelector("#supplier_contact");

// Initialize the intlTelInput with the utilsScript option
const iti = window.intlTelInput(input, {
    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
});

// Add an event listener to validate the phone number
input.addEventListener("blur", function () {
    const isValidNumber = iti.isValidNumber();
    const phoneNumber = iti.getNumber();
    
    if (isValidNumber && phoneNumber.length === 10) {
        // Phone number is valid and has 10 digits
        console.log("Valid phone number: " + phoneNumber);
    } else {
        console.log("Invalid phone number");
    }
});


 
</script>
