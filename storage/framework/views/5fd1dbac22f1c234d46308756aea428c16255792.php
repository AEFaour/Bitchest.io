<?php $__env->startSection('content'); ?>


<!-- Graphic -Spends -->

    <h1 class="page-header">Dashboard CLIENT</h1>


    <h2 class="sub-header">Graphique <span class="solde">Mon solde: <strong><?php echo e($customer_wallet->euro_balance); ?>€</strong></span></h2>

                    <div class="panel-heading" style="font-weight: bold; color: rgb(42, 136, 189);">Résumé des dépenses
                       <span class="listDeroulanteCrypto"> <select class="selectpicker ">

                            <?php $__currentLoopData = $cryptos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crypto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($crypto->id); ?>" <?php if($crypto->id == $valeurId): ?>
                            {
                                    selected = "selected"
                            }
                            <?php endif; ?>

                            ><?php echo e($crypto->name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                           </span>
                    </div>
                    <div class="panel-body">
                        <?php echo $chart->html(); ?>

                    </div>

    <?php echo Charts::scripts(); ?>

    <?php echo $chart->script(); ?>


    <script>
        $( document ).ready(function() {
            // var address = 'chart/';
            $( ".selectpicker" ).change(function() {

               var address = $(this).val();
                console.log(address);
                window.location = (address);
            });
        });
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bitchest\resources\views/customer/chart.blade.php ENDPATH**/ ?>