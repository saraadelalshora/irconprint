
 <?php if(Session::has('success')): ?>
 <script>
     swal("تنبية!", "<?php echo e(Session::get('success')); ?>!", "success");
 </script>
 <?php elseif(Session::has('error')): ?>
 <script>
     swal("تنبية!", "<?php echo e(Session::get('error')); ?>!", "error");
 </script>
 <?php endif; ?>
