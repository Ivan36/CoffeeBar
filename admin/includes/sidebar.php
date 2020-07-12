<?php  ?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">COFFEE BAR</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $user; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="./index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
            
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Food Menu 
               <i class="fas fa-angle-left right"></i>
               <span class="badge badge-info right"><?php echo $menu_count; ?></span>
             </p>
           </a>
           <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./food_add.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add food</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./manage_menu.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage food menu</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./food_menu.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View menu categories</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Food Orders 
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./pending_orders.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pending orders</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./confirmed_orders.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Confirmed orders</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./served_orders.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Server orders</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./manage_orders.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All orders</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
              Reservations
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./reservations.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Table setup</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./manage_reservations.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage reservations</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Customers
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./add_customers.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add customers</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./customer_list.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage customers</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="./invoices.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Customer Invoices</p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="./manage_customers.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Online customers</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">Reports</li>
         <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Invioces
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="invoice.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Online Order invoices</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="invoices.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Customer invoices</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="./sales_reports.php" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
              Sales reports
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="./customer_reports.php" class="nav-link">
            <i class="nav-icon far fa-image"></i>
            <p>
              Customer reports
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="./logout.php" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text text-danger">Logout</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>