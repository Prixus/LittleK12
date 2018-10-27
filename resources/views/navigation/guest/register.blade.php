<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}"/>

    <title>Little K12</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <script>
    window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
    ]) !!};
    </script>

    <!-- PNotify -->
<link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
<link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
<link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
  </head>

  <body class="login">

    <div>

      <div class="login_wrapper">
        <div >
          <section class="login_content">

            <form>
                {{ csrf_field()}}
              <h1>Create Account</h1>

              <h3>Account Information</h3>
              <div>
                <label for="Birthdate"><b>Username</b></label>
                <input type="text" class="form-control" placeholder="Username" required="" id="Username" name="Username" />
              </div>
              <div>
                <label for="Birthdate"><b>Email</b></label>
                <input type="text" class="form-control" placeholder="Email" required="" id="Email" name="Email" />
              </div>
              <div>
                <label><b>Password</b></label>
                <input type="password" class="form-control" placeholder="Password" name="Password"  required="" id="Password" onkeyup='check();' />
              </div>
              <div>
                <label for="Birthdate"><b>Repeat Password</b></label>
                <input type="password" class="form-control" placeholder="Repeat Password" required="" id="ConfirmPassword" onkeyup='check();' />
              </div>
              <p id="message"></p>

              <h3>Personal Information</h3>
              <div>
                <label for="Birthdate"><b>First Name</b></label>
                <input type="text" class="form-control" placeholder="First Name" name="FirstName" required="" id="FirstName"/>
              </div>
              <div>
                <label for="Birthdate"><b>Middle Name</b></label>
                <input type="text" class="form-control" placeholder="Middle Name" name="MiddleName" required="" id="MiddleName"/>
              </div>
              <div>
                <label for="Birthdate"><b>Last Name</b></label>
                <input type="text" class="form-control" placeholder="Last Name" name="LastName" required="" id="LastName"/>
              </div>
              <div>
                <label for="Birthdate"><b>Birthdate</b></label>
                <input type="date" class="form-control" name="Birthdate" name="" placeholder="Birthdate" required="" id="Birthdate"/>
              </div>
              <div>
                <label for="gender"><b>Gender</b></label>
                <select class="form-control" name="Gender" required="" id="Gender"/>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                </select>
              </div>

              <h1>Contact Information</h1>
              <div>
                <label for="Address"><b>Address</b></label>
                <input type="text" class="form-control" name="Address" placeholder="Address"  id="Address" required="" />
              </div>
              <div>
                <label for="Phone Number"><b>Phone Number</b></label>
                <input type="text" pattern=".{11}" maxlength="11" class="form-control" name="PhoneNumber" placeholder="Phone Number" id="PhoneNumber" required>
              </div>



              <div class="clearfix"></div>


            </form>

            <div>
              <button id="SubmitADD">Submit</button>
            </div>

          </section>
          <div class="separator" style="text-align:center">
            <p class="change_link">Already a member ?
              <a href="/" > Log in </a>
            </p>

            <div class="clearfix"></div>
            <br />

            <div>
              <h1><i class="fa fa-paw"></i> Little K12</h1>
            </div>
          </div>
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
      document.getElementById('SubmitADD').disabled = false;
    } else {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'not matching';
      document.getElementById('SubmitADD').disabled = true;
    }
  }

           $(document).on('click', '#SubmitADD', function(){
             $.ajax({
              type: 'POST',
              url: '/register/send',
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
                'PhoneNumber': $('#PhoneNumber').val()
              },

                            success: function(data){
                              if(data.errors){
                                new PNotify({
                                    title: 'Error',
                                    text: 'Validation Error',
                                    type: 'error',
                                    styling: 'bootstrap3'
                                })
                              }
                              else{
                                new PNotify({
                                    title: 'Regular Success',
                                    text: 'That thing that you were trying to do worked!',
                                    type: 'success',
                                    styling: 'bootstrap3'
                                });
                                window.location.reload()
                              }
                            }
                          });


            });
    </script>
        @include('includes.error')
</html>
