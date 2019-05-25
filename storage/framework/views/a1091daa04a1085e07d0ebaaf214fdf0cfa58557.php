


<!--   MEnu de la page Client -->



<h2>CLIENT</h2>
<ul class="nav nav-sidebar">
    <li class="<?php echo e(Request::is('/') ? 'active' : ''); ?>"><a href="/">Vue générale <span class="sr-only">(current)</span></a></li>
    <li class="<?php echo e(Request::is('listMonnaie') ? 'active' : ''); ?>"><a href="/listMonnaie">Liste des crypto monnaies</a></li>
    <li class="<?php echo e(Request::is('chart/*') ? 'active' : ''); ?>"><a href="/chart/1">Graphique des cours</a></li>
    <li class="<?php echo e(Request::is('wallet') ? 'active' : ''); ?>"><a href="/wallet">Mon portefeuille</a></li>
    <li class="<?php echo e(Request::is('historique') ? 'active' : ''); ?>"><a href="/historique">Historique</a></li>
    </ul>

</div>
<?php /**PATH C:\xampp\htdocs\bitchest\resources\views/client/menu.blade.php ENDPATH**/ ?>