<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Theme dashbord style  -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
  </head>

  <body>

  <div id="app">
  <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
          <div class="navbar-header">

              <!-- Collapsed Hamburger -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                  <span class="sr-only">Toggle Navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name', 'Laravel')); ?>

                    </a>
                </div>

          <div class="collapse navbar-collapse" id="app-navbar-collapse">
              <!-- Left Side Of Navbar -->
              <ul class="nav navbar-nav">
                  &nbsp;
              </ul>


              <!-- Right Side Of Navbar -->
              <ul class="nav navbar-nav navbar-right">
                  <!-- Authentication Links -->
                  <?php if(auth()->guard()->guest()): ?>
                      <li><a href="<?php echo e(route('login')); ?>">Se connecter</a></li>
                  <?php else: ?>
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                              <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                          </a>


                          <ul class="dropdown-menu">
                              <li>
                                  <a href="<?php echo e(route('logout')); ?>"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                      Se déconnecter
                                  </a>

                                  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                      <?php echo e(csrf_field()); ?>

                                  </form>
                              </li>
                          </ul>
                      </li>
                  <?php endif; ?>
              </ul>
          </div>
      </div>
  </nav>

 
</div>
<?php if(isset($currentUser)): ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
        <!-- ZONE ACTION MENU -->
        <?php if($currentUser->role == 'admin'): ?>
            <?php echo $__env->make('admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('customer.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        
        
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
       

        <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>
<?php else: ?>

<?php echo $__env->yieldContent('content'); ?>

<?php endif; ?>

    <!-- Bootstrap core JavaScript CDN
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
  </body>
</html><?php /**PATH C:\xampp\htdocs\bitchest\resources\views/layouts/app.blade.php ENDPATH**/ ?>