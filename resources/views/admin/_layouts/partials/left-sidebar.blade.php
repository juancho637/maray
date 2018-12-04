<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('/plugins/adminLTE/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name.' '.Auth::user()->last_name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- <li class="header">HEADER</li> -->

            <!-- Optionally, you can add icons to the links -->
            <li {{ request()->is('engagements*') ? 'class=active' : '' }}>
                <a href="{{ route('engagements.index') }}">
                    <i class="fa fa-calendar"></i>
                    <span>Citas</span>
                </a>
            </li>
            <li class="treeview {{ request()->is('finances*') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-bar-chart"></i>
                    <span>Finanzas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {{ request()->is('finances/balances*') ? 'class=active' : '' }}>
                        <a href="{{ route('balances.index') }}">Cajas</a>
                    </li>
                    <li {{ request()->is('finances/purchaseOrders*') ? 'class=active' : '' }}>
                        <a href="{{ route('purchaseOrders.index') }}">Ordenes y cotizaciones</a>
                    </li>
                    <li {{ request()->is('finances/deposits*') ? 'class=active' : '' }}>
                        <a href="{{ route('deposits.index') }}">Depósitos</a>
                    </li>
                    {{--<li {{ request()->is('finances/quotations*') ? 'class=active' : '' }}>
                        <a href="{{ route('quotations.index') }}">Cotizaciones</a>
                    </li>--}}
                    <li {{ request()->is('finances/credits*') ? 'class=active' : '' }}>
                        <a href="{{ route('credits.index') }}">Pago de créditos</a>
                    </li>
                    <li {{ request()->is('finances/expenses*') ? 'class=active' : '' }}>
                        <a href="{{ route('expenses.index') }}">Gastos</a>
                    </li>
                </ul>
            </li>
            {{-- <li class="treeview {{ request()->is('reports*') ? 'active' : '' }}">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Informes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li {{ request()->is('admin/clients') ? 'class=active' : '' }}>
                  <a href="{{ route('clients.index') }}">Clientes</a>
                </li>
                <li {{ request()->is('admin/products') ? 'class=active' : '' }}>
                  <a href="{{ route('products.index') }}">Productos</a>
                </li>
              </ul>
            </li> --}}
            <li class="treeview {{ request()->is('admin*') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-cogs"></i>
                    <span>Administración</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {{ request()->is('admin/species*') ? 'class=active' : '' }}>
                        <a href="{{ route('species.index') }}">Especies y razas</a>
                    </li>
                    <li {{ request()->is('admin/clients*') ? 'class=active' : '' }}>
                        <a href="{{ route('clients.index') }}">Clientes y mascotas</a>
                    </li>
                    <li {{ request()->is('admin/providers*') ? 'class=active' : '' }}>
                        <a href="{{ route('providers.index') }}">Proveedores</a>
                    </li>
                    <li {{ request()->is('admin/areas*') ? 'class=active' : '' }}>
                        <a href="{{ route('areas.index') }}">Áreas y categorías</a>
                    </li>
                    <li {{ request()->is('admin/products*') ? 'class=active' : '' }}>
                        <a href="{{ route('products.index') }}">Productos y servicios</a>
                    </li>
                    <li {{ request()->is('admin/expenseTypes*') ? 'class=active' : '' }}>
                        <a href="{{ route('expenseTypes.index') }}">Tipos de gasto</a>
                    </li>
                    <li {{ request()->is('admin/users*') ? 'class=active' : '' }}>
                        <a href="{{ route('users.index') }}">Usuarios</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>