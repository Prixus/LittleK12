<?php if(count($errors) > 0 ): ?>
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <script>
  new PNotify({
      title: "Validation",
      text: "<?php echo e($error); ?>",
      type: "error",
      styling: "bootstrap3"
  });
  </script>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
