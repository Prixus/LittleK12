<html>
<head>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Little k12 Enrollment System </title>

<script>
window.Laravel = <?php echo json_encode([
  'csrfToken' => csrf_token(),
]); ?>;
</script>

</head>
<body>

  <div>
    <!--errors -->
      <?php echo $__env->make('includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php echo $__env->yieldContent('content'); ?>
  </div>


  </body>
</html>
