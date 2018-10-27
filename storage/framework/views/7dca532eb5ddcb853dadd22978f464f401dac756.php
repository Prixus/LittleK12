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
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

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
              </div>
            </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">

                    <div class="clearfix"></div>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>

                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="datatable-responsive" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Subject Code</th>
                          <th>Subject name</th>
                          <th>School Year</th>
                          <th>Day</th>
                          <th>Time Start</th>
                          <th>Time End</th>
                          <th>Description</th>
                          <th>Add or Remove</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $Subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($Subject->Subject_ID); ?></td>
                          <td><?php echo e($Subject->Subject_Name); ?></td>
                          <td><?php echo e($Subject->Subject_Year); ?></td>
                          <td><?php echo e($Subject->Subject_Day); ?></td>
                          <td><?php echo e($Subject->Subject_StartTime); ?></td>
                          <td><?php echo e($Subject->Subject_EndTime); ?></td>
                          <td><?php echo e($Subject->Subject_Description); ?></td>
                          <td>
                            <button id="btnView" data-id="<?php echo e($Subject->id); ?>" data-code="<?php echo e($Subject->Subject_ID); ?>" data-name="<?php echo e($Subject->Subject_Name); ?>" data-year = "<?php echo e($Subject->Subject_Year); ?>" data-starttime = "<?php echo e($Subject->Subject_StartTime); ?>"  data-day="<?php echo e($Subject->Subject_Day); ?>" data-picture="<?php echo e($Subject->Subject_Picture); ?>" data-endtime = "<?php echo e($Subject->Subject_EndTime); ?>" data-description="<?php echo e($Subject->Subject_Description); ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </button>
                            <?php if($CurrentStudentInformation['id'] != $Subject->FK_StudentID): ?>
                            <button id="btnEnroll" data-id="<?php echo e($Subject->id); ?>" data-code="<?php echo e($Subject->Subject_ID); ?>" data-name="<?php echo e($Subject->Subject_Name); ?>" data-year = "<?php echo e($Subject->Subject_Year); ?>" data-starttime = "<?php echo e($Subject->Subject_StartTime); ?>"  data-day="<?php echo e($Subject->Subject_Day); ?>" data-picture="<?php echo e($Subject->Subject_Picture); ?>" data-endtime = "<?php echo e($Subject->Subject_EndTime); ?>" data-description="<?php echo e($Subject->Subject_Description); ?>" class="btn btn-success btn-xs"><i class="fa fa-mortar-board"></i> Enroll </button>
                            <?php else: ?>
                              <?php if($Subject->Enrollment_Status == "Pending for Approval"): ?>
                              <p style="color:darkblue">Pending for coordinator's approval</p>
                              <?php else: ?>
                              <p style="color:green">Currently Enrolled</p>
                              <?php endif; ?>
                            <?php endif; ?>
                            <!-- <button id="btnEdit" data-id="<?php echo e($Subject->id); ?>" data-code="<?php echo e($Subject->Subject_ID); ?>" data-name="<?php echo e($Subject->Subject_Name); ?>" data-year = "<?php echo e($Subject->Subject_Year); ?>" data-starttime = "<?php echo e($Subject->Subject_StartTime); ?>" data-day="<?php echo e($Subject->Subject_Day); ?>" data-picture="<?php echo e($Subject->Subject_Picture); ?>"  data-endtime = "<?php echo e($Subject->Subject_EndTime); ?>" data-description="<?php echo e($Subject->Subject_Description); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </button>
                            <button id="btnDelete" data-id="<?php echo e($Subject->id); ?>" data-code="<?php echo e($Subject->Subject_ID); ?>" data-name="<?php echo e($Subject->Subject_Name); ?>" data-year = "<?php echo e($Subject->Subject_Year); ?>" data-starttime = "<?php echo e($Subject->Subject_StartTime); ?>" data-day="<?php echo e($Subject->Subject_Day); ?>" data-picture="<?php echo e($Subject->Subject_Picture); ?>"  data-endtime = "<?php echo e($Subject->Subject_EndTime); ?>" data-description="<?php echo e($Subject->Subject_Description); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </button></td> -->
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <div class="modal fade bs-example-modal-lg" id="ModalSubject" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel"> Subject</h4>
          </div>
          <div class="modal-body">
            <form id="SubjectForm" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="/collaborator/subjects" files="true">
              <?php echo e(csrf_field()); ?>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Module ID <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="ID" name ="ID" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Module Code <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="SubjectID" name ="SubjectID" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Module Name <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="SubjectName" name="SubjectName" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Subject Day</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="SubjectDay" class="form-control col-md-7 col-xs-12" type="text" name="SubjectDay">
              <option value="Monday,Tuesday,Wednesday,Thursday,Friday">Monday,Tuesday,Wednesday,Thursday,Friday</option>
              <option value="Monday,Wednesday,Friday">Monday,Wednesday,Friday</option>
              <option value="Tuesday,Thursday">Tuesday,Thursday</option>
              <option value="Monday">Monday</option>
              <option value="Tuesday">Tuesday</option>
              <option value="Wednesday">Wednesday</option>
              <option value="Thursday">Thursday</option>
              <option value="Friday">Friday</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Start Time: <span class="required">*</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="time" id="StartTime" name="SubjectStartTime" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">End Time: <span class="required">*</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="time" id="EndTime" name="SubjectEndTime" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>



        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Year: <span class="required">*</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="Year" name="SubjectYear" required="required" pattern=".{4}" maxlength="4" class="form-control col-md-7 col-xs-12">
          </div>
        </div>


        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required">*</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
          <textarea id="Description" name="SubjectDescription" placeholder="Subject Description" class="resizable_textarea form-control"></textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button id ="Submit" type="submit" class="btn btn-success">Enroll</button>
          </div>
        </div>

      </form>
          </div>
          <div class="modal-footer">
            <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>

          </div>

        </div>
      </div>
    </div>


    <!-- PNotify -->
  <script src="../vendors/pnotify/dist/pnotify.js"></script>
  <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
  <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <script type="text/javascript">

    $(document).ready(function(){
    $(document).on('click','#btnView',function(){

    $('#ID').val($(this).data('id'));
    $('#SubjectID').val($(this).data('code'));
    $('#SubjectName').val($(this).data('name'));
    $('#SubjectDay').val($(this).data('day'));
    $('#StartTime').val($(this).data('starttime'));
    $('#EndTime').val($(this).data('endtime'));
    $('#Year').val($(this).data('year'));
    $('#Description').text($(this).data('description'));

    $('#ID').prop("readonly",true);
    $('#SubjectID').prop("disabled",true);
    $('#SubjectName').prop("disabled",true);
    $('#SubjectDay').prop("disabled",true);
    $('#StartTime').prop("disabled",true);
    $('#EndTime').prop("disabled",true);
    $('#Year').prop("disabled",true);
    $('#SubjectPicture').prop("disabled",true);
    $('#Description').prop("disabled",true);
    $('#Submit').hide();

    $('#myModalLabel').text('View Subject');
    $('#ModalSubject').modal('show');
  });



$(document).on('click','#btnEnroll',function(){
  id= $(this).data('id');
  $('#ID').val($(this).data('id'))
  $('#SubjectID').val($(this).data('code'));
  $('#SubjectID').val($(this).data('code'));
  $('#SubjectName').val($(this).data('name'));
  $('#SubjectDay').val($(this).data('day'));
  $('#StartTime').val($(this).data('starttime'));
  $('#EndTime').val($(this).data('endtime'));
  $('#Year').val($(this).data('year'));
  $('#Description').text($(this).data('description'));

  $('#ID').prop("readonly",true);
  $('#SubjectID').prop("readonly",true);
  $('#SubjectName').prop("readonly",true);
  $('#SubjectDay').prop("readonly",true);
  $('#StartTime').prop("readonly",true);
  $('#EndTime').prop("readonly",true);
  $('#Year').prop("readonly",true);
  $('#SubjectPicture').prop("readonly",true);
  $('#Description').prop("readonly",true);
  $('#Submit').show();

$('#myModalLabel').text('Enroll Subject');
$('#SubjectForm').attr('action','/student/subjects/enroll');
$('#SubjectForm').attr('method','POST');
$('#ModalSubject').modal('show');
});

    });

  //   $(document).on('click','#btnReject',function(){
  //   id = $(this).data('id');
  //   $('#RejectAccountID').val($(this).data('id'));
  //   $('#RejectUsername').val($(this).data('name'));
  //   $('#RejectPassword').val($(this).data('password'));
  //   $('#RejectStatus').val($(this).data('status'));
  //   $('#RejectRating').val($(this).data('rating'));
  //   $('#RejectAccessLevel').val($(this).data('accesslevel'));
  //   $('#RejectEmail').val($(this).data('email'));
  //   $('#ModalRejected').modal('show');
  // });

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
