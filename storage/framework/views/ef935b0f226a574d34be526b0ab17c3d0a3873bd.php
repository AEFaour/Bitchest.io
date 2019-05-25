<!--   Purchase - cryptos  -->


<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(Session::has('flashMessage')): ?>
        <div class="alert">
        <p><?php echo e(Session::get('flashMessage')); ?></p>
        </div>
    <?php endif; ?>

    <h1 class="page-header">Acheter une crypto monnaie</h1>
    
    <p><strong>Crypto : </strong><?php echo e($crypto->name); ?></p>

    <form action="/chart/buy/<?php echo e($crypto->id); ?>" method="POST">
    <?php echo e(csrf_field()); ?>


    <div class="form-group">
        <label for="quantite">Quantité:</label>
        <input type="text" name="quantite" required>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Confirmer">
    </div>

    </form>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bitchest\resources\views/customer/buy.blade.php ENDPATH**/ ?>