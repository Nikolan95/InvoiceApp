<nav id="page-leftbar" role="navigation">
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="acc-menu" id="sidebar">
        <li id="search">
            <a href="javascript:;"><i class="fa fa-search opacity-control"></i></a>
            <form>
                <input type="text" class="search-query" placeholder="Pretraži...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </li>
        <li class="divider"></li>
        <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> <span>Komandna tabla</span></a></li>
        <li><a href="javascript:;"><i class="fa fa-th"></i> <span>Klijenti</span> </a>
            <ul class="acc-menu">
                <li><a href="/clients/create"><span>Novi klijent</span></a></li>
                <li><a href="/clients"><span>Lista klijenata</span></a></li>
            </ul>
        </li>
        <li><a href="javascript:;"><i class="fa fa-list-ol"></i> <span>Fakture</span> </a>
            <ul class='acc-menu'>
                <li><a href="/invoices/create">Nova Faktura</a></li>
                <li><a href="/invoices/unpaid">Nenaplaćene fakture</a></li>
                <li><a href="/invoices/paid">Naplaćene fakture</a></li>
                <li><a href="/invoices">Sve fakture</a></li>
            </ul>
        </li>   
    </ul>
</nav>