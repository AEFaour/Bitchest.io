<!-- Display the count of the admin -->

<?php $__env->startSection('content'); ?>
    <h2>Détail sur le compte du client</h2>
    <hr>
    
    <div class="account">
        <h3>Informations générales sur le client</h3>
        
        <ul>
            <li>
                <strong>Le nom:</strong><?php echo e($user[0]->name); ?>

            </li>

            <li>
                <strong>L'email:</strong><?php echo e($user[0]->email); ?>

            </li>
            
            <li>
                <strong>Le role:</strong><?php echo e($user[0]->role); ?>

            </li>
        </ul>

        <hr>

        <?php if( $user[0]->role == 'Customer' ): ?>
        <h3>Détail  du portefeuille de client</h3>
        
        <?php endif; ?>
       
    </div>

    <form action="/customers/create" method="POST">
    <?php echo e(csrf_field()); ?>

    <div class="form-group">
        <label for="name">Le nom:</label>
        <input type="text" class="form-control" name="name" value="">
    </div>

    <div class="form-group">
        <label for="email">L'Email:</label>
        <input type="text" class="form-control" name="email" value="">
    </div>

    <div class="form-group">
        <label for="password">Le password:</label>
        <input type="password" class="form-control" name="password" value="">
    </div>

    <div class="form-group">
        <label for="password">Le Role:</label>
       
        <select class="form-control" name="role">
          
            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($role); ?>" name="role"><?php echo e($role); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Enregister">
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bitchest\resources\views/admin/customer/show.blade.php ENDPATH**/ ?>