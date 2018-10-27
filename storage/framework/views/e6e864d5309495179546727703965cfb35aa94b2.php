<?php $__env->startSection('content'); ?>
<script src="/js/error/jquery.min.js"></script>

<!-- This link calls the css file from the public folder -->
<link href="/css/sign.css" rel="stylesheet">

<link href="/css/bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/sign/reset.min.css">
    <link rel="stylesheet" href="css/sign/style4.css">

<script  src="/js/error/bootsrap.min.js"></script>

<meta name="_token" content="VWJQrOucDS4Rq4gggoXj17FJqZHqZu8qurXI0jqf"/>
    <link rel="stylesheet" href="/css/toastr.min.css">
  <script type="text/javascript" src="/js/toastr.min.js"></script>


  <!-- multistep form -->
<form id="msform" action ="/brand/register" method="POST">
  <!-- progressbar -->
  <?php echo e(csrf_field()); ?>

  <ul id="progressbar">
    <li class="active">Account Information</li>
    <li>Brand Profile</li>
    <li>Personal Details</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Personal Information</h2>
    <h3 class="fs-subtitle">Please fill in this form to create an account</h3>

    <div class = "form-group">
    <label  class="form-control" for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" class="form-control"  required>
    </div>

    <div class = "form-group">
      <label for="psw" class="form-control"><b>Password</b></label>
      <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
    </div>

    <div class = "form-group">
      <label for="psw-repeat" class="form-control"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" class="form-control" required>
    </div>


    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Personal Information</h2>
    <br>

    <div class = "form-group">
    <label for="firstName" class="form-control"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" class="form-control" name="firstName" required>
    </div>

    <div class = "form-group">
      <label class="form-control" for="middleName"><b>Middle Name</b></label>
      <input class="form-control" type="text" placeholder="Enter Middle Name" name="middleName" required>
    </div>

    <div class = "form-group">
      <label class="form-control" for="lastName"><b>Last Name</b></label>
      <input class="form-control" type="text" placeholder="Enter Last Name" name="lastName" required>
    </div>

    <div class = "form-group">
      <label class="form-control" for="birthdate"><b>Birth Date</b></label>
      <input class="form-control" type="text" placeholder="Enter Birth Date" name="birthdate" required>
    </div>

    <div class = "form-group">
      <label class="form-control" for="gender"><b>Gender</b></label>
      <input class="form-control" type="text" placeholder="Enter Gender" name="gender" required>
    </div>

    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>

  <fieldset>
    <h2 class="fs-title">Contact Information</h2>
    <br>

    <div class = "form-group">
      <label class="form-control" for="address"><b>Address</b></label>
      <input class="form-control" type="text" placeholder="Enter Address" name="address" required>
    </div>

    <div class = "form-group">
      <label class="form-control" for="phoneNumber"><b>Phone Number</b></label>
      <input class="form-control" type="text" placeholder="Enter Phone Number" name="phoneNumber">

    </div>

  <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>


    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="signup" class="submit action-button" value="Submit" />
  </fieldset>
</form>

<script>
$(document).ready(function() {
    $("#TinNumber").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [ 8, 9]) !== -1) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $("#mobileNumber").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [ 8, 9]) !== -1) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
}

);

function check(){
if (document.getElementById('password').value ==
  document.getElementById('confirm_password').value) {
  document.getElementById('message').style.color = 'green';
  document.getElementById('message').innerHTML = 'matching';
  document.getElementById('submit').disabled = false;
} else {
  document.getElementById('message').style.color = 'red';
  document.getElementById('message').innerHTML = 'not matching';
  document.getElementById('submit').disabled = true;
}
}

</script>
<script src='js/sign/jquery.min.js'></script>
<script src='js/sign/jquery.easing.min.js'></script>
<script src="js/sign/index.js"></script>

<script src="/js/bootstrap.min.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>