<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
      <img src="/asset/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/asset/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <div class="d-block">Portio.Id</div>
        </div>  
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{--  <li class="nav-item menu-open">
            <a href="/admin/dashboard" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>  
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/dashboard" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
            </ul>
          </li>  --}}
          <li class="nav-header">Home</li>
          <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Product</li>
          <li class="nav-item">
            <a href="/admin/product" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
                My Product
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/addproduct" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i>
              <p>
                Add New Product
              </p>
            </a>
          </li>
          <li class="nav-header">User Setting</li>
          <li class="nav-item">
            <a href="/admin/customer" class="nav-link">
              {{-- <i class="nav-icon far fa-image"></i> --}}
              <i class="nav-icon fab fa-shopify"></i>
              <p>
                Customer
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/supplier" class="nav-link">
              <i class="nav-icon fas fa-truck-loading"></i>
              <p>
                Supplier
              </p>
            </a>
          </li>
          <li class="nav-header">Transaction</li>
          <li class="nav-item">
            <a href="/admin/transaction" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Transaksi
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/historyTransaction" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Riwayat Transaksi
                
              </p>
            </a>
          </li>
          <li class="nav-header">My Profile</li>
          <li class="nav-item">
            <a href="/admin/profile" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Info Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/editProfile" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Profile Setting
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>