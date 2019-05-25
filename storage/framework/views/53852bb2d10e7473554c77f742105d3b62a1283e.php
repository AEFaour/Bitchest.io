<!--  The liste of customer--> 



<?php $__env->startSection('content'); ?>

    <h2>La liste des Clients</h2>

    <hr>

    <table class="table table-striped">
  <thead class="thead-light">
    <tr>
      <th scope="col">Le nom</th>
      <th scope="col">Le role</th>
      <th scope="col">L'action</th>
      
    </tr>
  </thead>

  <tbody>
    <?php $__currentLoopData = $allusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <th scope="col"><?php echo e($customer->name); ?></th>
        <th scope="col"><?php echo e($customer->role); ?></th>
        <th scope="col">
            <a href="customers/<?php echo e($customer->id); ?>/detail" class="btn btn-danger">Voir</a>
            <a href="customers/<?php echo e($customer->id); ?>/modify" class="btn btn-danger2">Modifier</a>
            <a href="customers/<?php echo e($customer->id); ?>/delete" class="btn btn-danger3">Supprimer</a>
        </th>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
  <tfooter>
    <tr>
      <th scope="col"><a href="customers/create" class="btn btn-success">Ajouter un client</a></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </tfooter>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bitchest\resources\views/admin/list-customers.blade.php ENDPATH**/ ?>