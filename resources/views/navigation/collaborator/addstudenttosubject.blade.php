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
      @include('includes.collaboratorsidebar')

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

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div>
                    <h2>Pending Requests <small></small></h2>
                    <h2>Total Students  <small></small></h2>
                    </div>

                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Subject Code</th>
                          <th>Subject Name</th>
                          <th>Student Name</th>
                          <th>Student Status</th>
                          <th>Approve</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($Enrollments as $Enrollment)
                        <tr>
                          <td>{{$Enrollment->Subject_ID}}</td>
                          <td>{{$Enrollment->Subject_Name}}</td>
                          <td>{{$Enrollment->User_FirstName . " " . $Enrollment->User_LastName}}</td>
                          <td>{{$Enrollment->Enrollment_Status}}</td>
                          <td>
                          <button id="btnApprove" data-id="{{$Enrollment->PK_EnrollmentID}}"  data-code="{{$Enrollment->Subject_ID}}" data-name="{{$Enrollment->Subject_Name}}" data-studentname="{{$Enrollment->User_FirstName . " " . $Enrollment->User_LastName}}" data-status="{{$Enrollment->Enrollment_Status}}" class="btn btn-success btn-xs"><i class="fa fa-folder"></i> Approve Request </button>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
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
        <!-- /page content -->
      </div>
    </div>

        <div class="modal fade bs-example-modal-lg" id="ModalSubject" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> Subject</h4>
              </div>
              <div class="modal-body">
                <form id="SubjectForm" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="/Coordinator/subjects" files="true">
                  {{ csrf_field()}}


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Module Code <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="EnrollmentID" name ="EnrollmentID" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Module Code <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="SubjectCode" name ="SubjectCode" required="required" class="form-control col-md-7 col-xs-12">
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
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Student Name: <span class="required">*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="StudentName" name="StudentName" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Enrollment Status: <span class="required">*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="Status" name="Status" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Approve Student</button>
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

    <!-- PNotify -->
  <script src="../vendors/pnotify/dist/pnotify.js"></script>
  <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
  <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>

      @include('includes.error')
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script type="text/javascript">

    $(document).ready(function(){
  $(document).on('click','#btnApprove',function(){
    id= $(this).data('id');
    $('#EnrollmentID').val($(this).data('id'))
    $('#SubjectName').val($(this).data('name'));
    $('#StudentName').val($(this).data('studentname'));
    $('#Status').val($(this).data('status'));
    $('#SubjectCode').val($(this).data('code'));


    $('#EnrollmentID').prop("readonly",true);
    $('#SubjectName').prop("readonly",true);
    $('#StudentName').prop("readonly",true);
    $('#Status').prop("readonly",true);
    $('#SubjectCode').prop("readonly",true);

  $('#myModalLabel').text('Approve Student Request');
  $('#SubjectForm').attr('action','/Coordinator/student/approve');
  $('#SubjectForm').attr('method','POST');
  $('#ModalSubject').modal('show');
})
    });
</script>

@if(session('success'))
<script>
new PNotify({
    title: "Regular Success",
    text: "{{session('success')}}",
    type: "success",
    styling: "bootstrap3"
});
</script>
@endif

  </body>
</html>
