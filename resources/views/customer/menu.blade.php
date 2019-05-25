


<!--   Menu -->



<h2>CLIENT</h2>
<ul class="nav nav-sidebar">
    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Panorama<span class="sr-only">(current)</span></a></li>
    <li class="{{ Request::is('historique') ? 'active' : '' }}"><a href="/historique">Background</a></li>
    <li class="{{ Request::is('wallet') ? 'active' : '' }}"><a href="/wallet">Le portefeuille</a></li>
    <li class="{{ Request::is('chart/*') ? 'active' : '' }}"><a href="/chart/1">La graphique des cours</a></li>
    <li class="{{ Request::is('listMonnaie') ? 'active' : '' }}"><a href="/listMonnaie">La liste des crypto monnaies</a></li>
    </ul>

</div>
