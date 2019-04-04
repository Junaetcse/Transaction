<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="{{ Request::is('stock*') ? 'active' : '' }}"> <a href="/stock"><i class="icon icon-signal"></i> <span>Stock</span></a> </li>
        <li class="{{request()->is('transaction*') ? 'active' : '' }}"> <a href="/transaction"><i class="icon icon-inbox"></i> <span>Transaction</span></a> </li>
        <li class="{{request()->is('investment*') ? 'active' : '' }}"> <a href="/investment"><i class="icon icon-inbox"></i> <span>Investment</span></a> </li>

    </ul>
</div>