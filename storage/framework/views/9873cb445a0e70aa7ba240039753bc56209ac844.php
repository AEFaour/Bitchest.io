<?php $__env->startSection('content'); ?>


<!--  About the count of the admin -->

<h1>Mon compte</h1>

<hr>

<form action="account/update/<?php echo e($currentUser->id); ?>" method="POST">
    <?php echo e(csrf_field()); ?>

    <?php echo e(method_field('PATCH')); ?>

    <div class="form-group">
        <label for="name">Le nom:</label>
        <input type="text" class="form-control" name="name" value="<?php echo e($currentUser->name); ?>">
    </div>

    <div class="form-group">
        <label for="email">L'email:</label>
        <input type="text" class="form-control" name="email" value="<?php echo e($currentUser->email); ?>">
    </div>

    <div class="form-group">
        <label for="password">Le password:</label>
        <input type="password" class="form-control" name="password" value="<?php echo e($currentUser->password); ?>::hach">
    </div>

    <div class="form-group">
        <label for="password">Le role:</label>
       
        <select class="form-control" name="role">
          
            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($role); ?>" name="role"><?php echo e($role); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group">
    <!-- Update the informations-->
        <button class="btn btn-primary">Mettre à jour</button>
    </div>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bitchest\resources\views/admin/account.blade.php ENDPATH**/ ?>