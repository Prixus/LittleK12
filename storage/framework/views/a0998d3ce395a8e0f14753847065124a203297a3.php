<?php $__env->startSection('studentsidebar'); ?>

<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
          <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Little K12</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic">
            <img src="/<?php echo e($CurrentUserInformation['User_ProfileImage']); ?>" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info">
            <span>Welcome,</span>
            <h2><?php echo e($CurrentUserInformation['User_FirstName']); ?></h2>
          </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
              <?php if(request()->segment(2) == 'profile'): ?>
              <li class="active"><a href="/student/profile"><i class="fa fa-home"></i> Profile <span class="fa fa-chevron-down"></span></a></li>
              <?php else: ?>
              <li><a href="/student/profile"><i class="fa fa-home"></i> Profile <span class="fa fa-chevron-down"></span></a></li>
              <?php endif; ?>

              <?php if(request()->segment(2) == 'subjects'): ?>
              <li class="active"><a href="/student/subjects"><i class="fa fa-home"></i> Subjects <span class="fa fa-chevron-down"></span></a></li>
              <?php else: ?>
              <li ><a href="/student/subjects"><i class="fa fa-home"></i> Subjects <span class="fa fa-chevron-down"></span></a></li>
              <?php endif; ?>
            </ul>
          </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <!-- <div class="sidebar-footer hidden-small">
          <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Logout" href="/logout/student">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
          </a>
        </div> -->
        <!-- /menu footer buttons -->
      </div>
    </div>

    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <li class="">
              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <img src="/<?php echo e($CurrentUserInformation['User_ProfileImage']); ?>" alt=""><?php echo e($CurrentUserInformation['User_FirstName']); ?>

                <span class=" fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li><a href="javascript:;"> Profile</a></li>

                <li><a href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
              </ul>
            </li>

          </ul>
        </nav>
      </div>
    </div>
    <!-- /top navigation -->
    <?php echo $__env->yieldSection(); ?>
