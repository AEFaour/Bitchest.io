<?php $__env->startSection('content'); ?>


<!-- Wallet -->
    
    <h1 class="page-header">Dashboard CLIENT</h1>

    <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <h2 class="sub-header">Le portefeuille <span class="solde">Mon solde: <strong><?php echo e($customer_wallet->euro_balance); ?>€</strong></span></h2>
    <div class="table-responsive">

        <table class="table table-striped">
            <thead>
            <tr>
                
                <th>Nom de la crypto monnaie</th>
                <th>Quantité</th>
                <th>Valeur initiale de la crypto monnaie</th>
                <th>Valeur du lot</th>

                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            
            <?php $__currentLoopData = $spend_currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spend_currencies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                
                    <td><?php echo e($spend_currencies->name); ?></td>
                    <td><?php echo e($spend_currencies->quantity); ?></td>
                    <td><?php echo e($spend_currencies->valeur); ?>€</td>
                    <td><?php echo e($spend_currencies->euro_valeur); ?></td>
                    <td>
                        <a href="/wallet/sell/<?php echo e($spend_currencies->id); ?>" type="button" class="btn btn-danger">vendre</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bitchest\resources\views/customer/wallet.blade.php ENDPATH**/ ?>