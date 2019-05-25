<?php $__env->startSection('content'); ?>

<!--    Historical  -->

    <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <h1 class="page-header">L'historique du Client</h1>


    <h2 class="sub-header">La liste des transactions<span class="solde">Mon solde: <strong><?php echo e($customer_wallet->euro_balance); ?>€</strong></span></h2>
    <div class="table-responsive">
    
            <table class="table table-striped">
                <thead>
                <tr>
                    
                    <th>Le nom de la crypto-monnaie</th>
                    <th>La quantité</th>
                    <th>La valeur initiale de la crypto monnaie</th>
                    <th>La valeur du lot</th>
                    <th>La date de la transaction</th>
                    <th>Le statut transaction</th>
      
    
                </tr>
                </thead>
                <tbody>
                
                <?php $__currentLoopData = $spend_currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spend_currencies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
                    <tr>
                    
                        <td><?php echo e($spend_currencies->name); ?></td>
                        <td><?php echo e($spend_currencies->quantity); ?></td>
                        <td><?php echo e($spend_currencies->valeur); ?>€</td>
                        <td><?php echo e($spend_currencies->euro_valeur); ?></td>
                        <td><?php echo e($spend_currencies->purchase_date); ?></td>
                        <td><?php if($spend_currencies->active): ?>
                                <?php echo e($status[1]); ?>

                            <?php else: ?>
                                <?php echo e($status[0]); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>

        <h2 class="sub-header">La liste des achats</h2>
            <div class="table-responsive">
    
            <table class="table table-striped">
                <thead>
                <tr>
                    
                    <th>Le nom de la crypto monnaie</th>
                    <th>La quantité</th>
                    <th>Le valeur initiale de la monnaie</th>
                    <th>Le valeur du lot</th>
                    <th>La date de la transaction</th>
                    <th>Le statut transaction</th>
    
                    
    
                </tr>
                </thead>
                <tbody>

                <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
                    <tr>
                    
                        <td><?php echo e($purchase->name); ?></td>
                        <td><?php echo e($purchase->quantity); ?></td>
                        <td><?php echo e($purchase->valeur); ?>€</td>
                        <td><?php echo e($purchase->euro_valeur); ?></td>
                        <td><?php echo e($purchase->purchase_date); ?></td>
                        <td><?php if($purchase->active): ?>
                                <?php echo e($status[1]); ?>

                            <?php else: ?>
                                <?php echo e($status[0]); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                </tbody>
            </table>
        </div>

        <h2 class="sub-header">La liste des ventes</h2>
            <div class="table-responsive">
    
            <table class="table table-striped">
                <thead>
                <tr>
                    
                    <th>Le nom de la crypto monnaie</th>
                    <th>La quantité</th>
                    <th>La valeur initiale de la monnaie</th>
                    <th>La valeur du lot</th>
                    <th>La date de la transaction</th>
                    <th>Le statut transaction</th>
    
                    
    
                </tr>
                </thead>
                <tbody>

                <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
                    <tr>
    
                        <td><?php echo e($purchase->name); ?></td>
                        <td><?php echo e($purchase->quantity); ?></td>
                        <td><?php echo e($purchase->valeur); ?>€</td>
                        <td><?php echo e($purchase->euro_valeur); ?></td>
                        <td><?php echo e($purchase->purchase_date); ?></td>
                        <td><?php if($purchase->active): ?>
                                <?php echo e($status[1]); ?>

                            <?php else: ?>
                                <?php echo e($status[0]); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                </tbody>
            </table>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bitchest\resources\views/customer/historique.blade.php ENDPATH**/ ?>