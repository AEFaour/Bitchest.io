<?php if(Session::has('errorMessage')): ?>
    <div class="alert alert-danger">
    <p><?php echo e(Session::get('errorMessage')); ?></p>
    </div>
<?php endif; ?>

<?php if(Session::has('successMessage')): ?>
    <div class="alert alert-success">
    <p><?php echo e(Session::get('successMessage')); ?></p>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\bitchest\resources\views/layouts/errors.blade.php ENDPATH**/ ?>