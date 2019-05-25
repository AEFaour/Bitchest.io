<?php $__env->startSection('content'); ?>




    <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <h1 class="page-header">Dashboard ADMIN</h1>

    <h2 class="sub-header">Cryptos-monnaies </h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Le nom de la crypto-monnaie</th>
                <th>La valeur actuelle de la monnaie</th>
                <th>Le taux actuel de la monnaie</th>

            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $cryptos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crypto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                    <td>#</td>
                    <td><?php echo e($crypto->name); ?></td>
                    <td><?php echo e($spend_currencies[$crypto->id -1]->euro_valeur); ?>€</td>
                    <td><?php echo e($crypto->charge); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bitchest\resources\views/admin/listMonnaie.blade.php ENDPATH**/ ?>