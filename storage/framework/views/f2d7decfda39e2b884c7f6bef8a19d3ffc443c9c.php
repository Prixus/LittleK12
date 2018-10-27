
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Little K12</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <!-- PNotify -->
<link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
<link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
<link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
  </head>

  <body class="login">

    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="/login" method="POST">
              <?php echo e(csrf_field()); ?>

              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="Password" required="" />
              </div>
              <div>
                <input type="submit" class="btn btn-default submit" style="margin-left:150px" value="Login">
              </div>

              <div class="clearfix"></div>
              <br>
                          <a href="/register" >Register new Account</a>
            </form>
          </section>



        </div>


      </div>
    </div>
  </body>

  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- PNotify -->
<script src="../vendors/pnotify/dist/pnotify.js"></script>
<script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
<script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>
  <script type="text/javascript">
  $("#PhoneNumber").keydown(function (e) {
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


  function check(){
    if (document.getElementById('Password').value ==
    document.getElementById('ConfirmPassword').value) {
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = 'matching';
      document.getElementById('Submit').disabled = false;
    } else {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'not matching';
      document.getElementById('Submit').disabled = true;
    }
  }

           $(document).on('click', '#Submit', function(){
             $.ajax({
                            type: "POST",
                            url: '/register',
                            data: {
                              '_token': $('input[name=_token]').val(),
                              'Username': $('#Username').val(),
                              'Email': $('#Email').val(),
                              'Password': $('#Password').val(),
                              'FirstName': $('#FirstName').val(),
                              'MiddleName': $('#MiddleName').val(),
                              'LastName': $('#LastName').val(),
                              'Birthdate': $('#Birthdate').val(),
                              'Gender': $('#Gender').val(),
                              'Address': $('#Address').val(),
                              'PhoneNumber': $('#PhoneNumber').val(),
                            },

                            success: function(data){
                              if(data.errors){
                                new PNotify({
                                    title: "Validation",
                                    text: "Validation Error",
                                    type: "error",
                                    styling: "bootstrap3"
                                });
                              }
                              else{
                                new PNotify({
                                    title: 'Regular Success',
                                    text: 'That thing that you were trying to do worked!',
                                    type: 'success',
                                    styling: 'bootstrap3'
                                })
                              }
                            }
                          });


            });
    </script>


    <?php if(session('error')): ?>
    <script>
    new PNotify({
        title: "Regular Success",
        text: "<?php echo e(session('error')); ?>",
        type: "error",
        styling: "bootstrap3"
    });
    </script>
    <?php endif; ?>
        <?php echo $__env->make('includes.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</html>
