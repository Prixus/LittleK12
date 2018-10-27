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
    <!-- PNotify -->
<link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
<link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
<link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
  <?php echo $__env->make('includes.studentsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><button class="btn btn-default" id="EditStudentProfile">Edit</button> <small></small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate>

                      <span class="section">Information</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" required="required" value="<?php echo e($CurrentUserInformation['User_FirstName']); ?> <?php echo e($CurrentUserInformation['User_MiddleName']); ?> <?php echo e($CurrentUserInformation['User_LastName']); ?>" type="text" disabled>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required" value="<?php echo e($CurrentUserInformation['User_Email']); ?>" disabled class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"> Birth Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="date" id="birthdate" name="birthdate" data-validate-linked="birthdate" value="<?php echo e($CurrentStudentInformation['Student_DateOfBirth']); ?>" required="required" disabled class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">Gender <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select disabled id="gender" name="gender" required  class="form-control col-md-7 col-xs-12" value="<?php echo e($CurrentStudentInformation['Student_Gender']); ?>">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address"> Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" id="address" name="address" required disabled value="<?php echo e($CurrentUserInformation['User_Address']); ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact">Contact Information <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="contact" type="text" disabled name="contact" data-validate-length-range="5,20" value="<?php echo e($CurrentUserInformation['User_ContactNumber']); ?>" class="optional form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-5 col-sm-6 col-xs-12" style="width:1000px">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Time table <small></small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Subject Code</th>
                          <th>Sybject Name</th>
                          <th>School Year</th>
                          <th>Day</th>
                          <th>Subject Description</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $__currentLoopData = $Enrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <th scope="row"><?php echo e($Enrollment->PK_EnrollmentID); ?></th>
                          <td><?php echo e($Enrollment->Subject_ID); ?></td>
                          <td><?php echo e($Enrollment->Subject_Name); ?></td>
                          <td><?php echo e($Enrollment->Subject_Year); ?></td>
                          <td><?php echo e($Enrollment->Subject_Day); ?></td>
                          <td><?php echo e($Enrollment->Subject_Description); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

   <div class="modal fade bs-example-modal-lg" id="ModalEditProfile" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> Student Information</h4>
              </div>
              <div class="modal-body">
                <form id="SubjectForm" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="/student/editprofile" files="true" method="POST">
                  <?php echo e(csrf_field()); ?>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User ID <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="UserID" name ="UserID" required="required" readonly class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="FirstName" name ="FirstName" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Middle Name <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="MiddleName" name ="MiddleName" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Last Name <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="LastName" name ="LastName" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Birthdate<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="date" id="Birthdate" name ="Birthdate" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Gender<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select  id="Gender" name="Gender" required  class="form-control col-md-7 col-xs-12" value="<?php echo e($CurrentStudentInformation['Student_Gender']); ?>">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Address <span class="required">*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="Address" name="Address" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Number: <span class="required">*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="ContactNumber" name="ContactNumber" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Profile Image: <span class="required">*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="ProfilePicture" name="ProfilePicture"  class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <div style="margin-left: 220px" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Edit Profile</button>
              </div>
            </div>

          </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

              </div>

            </div>
          </div>
        </div>
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Little K12
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>




    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="../vendors/validator/validator.js"></script>

    <!-- PNotify -->
  <script src="../vendors/pnotify/dist/pnotify.js"></script>
  <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
  <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script type="text/javascript">
    $(document).on('click','#EditStudentProfile',function(){
      $('#UserID').val('<?php echo e(Session::get('CurrentUser')['id']); ?>');
      $('#FirstName').val('<?php echo e(Session::get('CurrentUser')['User_FirstName']); ?>');
      $('#LastName').val('<?php echo e(Session::get('CurrentUser')['User_LastName']); ?>');
      $('#MiddleName').val('<?php echo e(Session::get('CurrentUser')['User_MiddleName']); ?>');
      $('#Birthdate').val('<?php echo e(Session::get('CurrentStudent')['Student_DateOfBirth']); ?>');
      $('#Gender').val('<?php echo e(Session::get('CurrentStudent')['Student_Gender']); ?>');
      $('#Address').val('<?php echo e(Session::get('CurrentUser')['User_Address']); ?>');
      $('#ContactNumber').val('<?php echo e(Session::get('CurrentUser')['User_ContactNumber']); ?>');
      $('#ModalEditProfile').modal('show');
    });      
    </script>

    <?php if(session('success')): ?>
    <script>
    new PNotify({
        title: "Regular Success",
        text: "<?php echo e(session('success')); ?>",
        type: "success",
        styling: "bootstrap3"
    });
    </script>
    <?php endif; ?>
<?php echo $__env->make('includes.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </body>
</html>
