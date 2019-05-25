<?php $__env->startSection('content'); ?>
<!-- About the Dashboard 
of the costumer count  -->

  <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <h1 class="page-header">Dashbord d'Admin</h1>
  <h2>La liste des Clients</h2>

  <hr>

  <table class="table table-striped table-info">
    <thead class="thead-light">
    <tr>
      <th scope="col">Le nom</th>
      <th scope="col">Le role</th>

    </tr>
    </thead>

    <tbody>
    <?php $__currentLoopData = $allusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <th scope="col"><?php echo e($customer->name); ?></th>
        <th scope="col"><?php echo e($customer->role); ?></th>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>

  <h2 class="sub-header">Les Cryptos monnaies</h2>
  <div class="table-responsive table-info">
    <table class="table table-striped table-info">
      <thead>
      <tr>
        <th>#</th>
        <th>Le nom de la crypto monnaie</th>
        <th>La valeur actuelle de la crypto monnaie</th>
        <th>Le taux actuel de la crypto monnaie</th>

      </tr>
      </thead>
      <tbody>
      <?php $__currentLoopData = $cryptos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crypto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>
          <td>#</td>
          <td><?php echo e($crypto->name); ?></td>
          <td><?php echo e($spend_currencies); ?>€</td>
          <td><?php echo e($crypto->getCoursActuel()); ?></td>

        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bitchest\resources\views/admin/home.blade.php ENDPATH**/ ?>